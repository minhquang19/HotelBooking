<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\room;
use App\Models\roomPrice;
use App\Models\User;
use Card;
use DB;
use Illuminate\Database\Eloquent\Model;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class bookingController extends Controller
{
    public function index()
    {
        $items = Session::get('cart');
        $totalPrice = 0;
        if($items) {
            foreach ($items as $key => $cart) {
                $totalPrice = $totalPrice+ $cart['price'];
            }
        }
        $booked = Booking::where('user_id',Auth::user()->id)->get();
        $book = DB::table('booking_details')->get();
        $blog = Blog::all();
        return view('frontEnd.booking',compact('items','totalPrice','book','blog','booked'));

    }
    public function store(Request $request)
    {
        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart = Session::get('cart');
        $price = RoomPrice::with('room')->where('room_id', $data['id'])->get();
        $priceweekly = (float)$price[0]->Weekends;
        $date = abs(strtotime($data['checkin']) - strtotime($data['checkout']));
        $dateiff = (float)floor($date / (60 * 60 * 24));
        $price = $priceweekly*$dateiff;
        $room = Room::find($data['id']);
        if ($cart == true) {
            $is_avaiable = 0;
            foreach ($cart as $key => $val) {
                if ($val['room_id'] == $data['id']) {
                    $is_avaiable++;
                    return back()->with('error','You have booked this room');
                }
            }
            if ($is_avaiable == 0) {
                $cart[] = array(
                    'session_id' => $session_id,
                    'room_name' => $data['name'],
                    'room_id' => $data['id'],
                    'image' => $room->coverImages,
                    'area' => $room->area,
                    'checkin' => $data['checkin'],
                    'checkout' => $data['checkout'],
                    'date' => $dateiff,
                    'unit_price' => $priceweekly,
                    'price'=>$price,
                    'amount' => $data['amount_people'],
                );
                Session::put('cart', $cart);
                return redirect()->route('booking.index')->with('success','Add Room Success');
            }
        } else {
            $cart[] = array(
                'session_id' => $session_id,
                'room_name' => $data['name'],
                'room_id' => $data['id'],
                'image' => $room->coverImages,
                'area' => $room->area,
                'checkin' => $data['checkin'],
                'checkout' => $data['checkout'],
                'date' => $dateiff,
                'unit_price' => $priceweekly,
                'price'=>$price,
                'amount' => $data['amount_people'],
            );
            Session::put('cart', $cart);
            return redirect()->route('booking.index')->with('success','Add Room Success');;
        }
        Session::save();
    }
    public function add()
    {
        $totalPrice = 0;
        $items = Session::get('cart');
        $booking = new Booking();
        $booking->user_id = Auth::user()->id;
        $booking->save();
        if($items)
        {
            foreach ($items as $key =>$cart)
            {
                $booking_details = new BookingDetail();
                $booking_details->room_id =$cart['room_id'];
                $booking_details->room_name =$cart['room_name'];
                $booking_details->booking_id = $booking->id;
                $time_checkin = strtotime($cart['checkin']);
                $time_checkout = strtotime($cart['checkout']);
                $checkin = date('Y-m-d',$time_checkin);
                $checkout = date('Y-m-d',$time_checkout);
                $booking_details->checkin = $checkin;
                $booking_details->checkout = $checkout;
                $booking_details->amount_date = $cart['date'];
                $booking_details->amount = $cart['amount'];
                $booking_details->unit_price = $cart['unit_price'];
                $booking_details->price = $cart['price'];
                $totalPrice = $totalPrice + $cart['price'];
                $booking_details->save();
            }

        }
        $total = DB::table('bookings')
            ->where('id',$booking->id)
            ->update(['totalPrice' => $totalPrice]);

        Session::forget('cart');
        return back()->with('success','Đặt phòng thành công');

    }
    public function destroy($id)
    {
        $cart = Session::get('cart');
        if($cart==true){
            foreach($cart as $key => $val){
                if($val['session_id']==$id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('success','Xóa sản phẩm thành công');

        }else{
            return redirect()->back()->with('error','Xóa sản phẩm thất bại');
        }

    }
    public function updateAvatar(Request $request){
        $file_name = $request->email;
        $resizedImage = cloudinary()->upload($request->file('avatar')->getRealPath(), [
            'folder' => 'avatarUser',
            'use_filename' =>'true',
            'filename_override'=>$file_name,
            'transformation' => [
                'width' => 300,
                'height' => 300,
                'gravity' => 'faces',
                'crop' => 'fill'
            ]
        ])->getSecurePath();
        $rs = User::where('id',$request->id)->update(array('avatar'=> $resizedImage));
        if($rs){
            return redirect()->back()->with('success','Update Avatar Success');
        }else{
            return redirect()->back()->with('error','Update Avatar Unsuccess');
        }

    }
    public function updateInfo(Request $request)
    {
        $validated = $request->validate([
           'name'=> 'required',
           'email'=> 'required',
           'address'=> 'required',
           'phonenumber'=> 'required',
           'sex'=> 'required',
        ]);
        $rs =User::where('id',$request->id)->update($validated);
        if($rs){
            return redirect()->back()->with('success','Update Avatar Success');
        }else{
            return redirect()->back()->with('error','Update Avatar Unsuccess');
        }

    }

    public function payMent(Request $request){
        $totalPrice = $request->totalPrice;
        return view('vnpay.index',compact('totalPrice'));
    }
    public function createPayment(Request $request){
//        dd($request->toArray());
        $vnp_TxnRef = $request->order_id;
        $vnp_OrderInfo = $request->order_desc;
        $vnp_OrderType = $request->order_type;
        $vnp_Amount = str_replace(',', '', ($request->amount) * 100);
        $vnp_Locale = $request->language;
        $vnp_BankCode = $request->bank_code;
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => env('vnp_TmnCode'),
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => route('booking.vnpay.return'),
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = env('vnp_Url') . "?" . $query;
        if (env('GFZHDSZBZJQESXZNMCUETHGSNUJCEXVN')) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', env('GFZHDSZBZJQESXZNMCUETHGSNUJCEXVN') . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);

    }
    public function vnpayReturn(Request $request){
        dd($request->toArray());
    }
}
