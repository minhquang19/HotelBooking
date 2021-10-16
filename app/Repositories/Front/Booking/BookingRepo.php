<?php
namespace App\Repositories\Front\Booking;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Room;
use App\Models\RoomPrice;
use App\Models\User;
use Carbon\CarbonPeriod;
use Session;
use App\Repositories\Front\BaseFrontRepo;
use Illuminate\Support\Facades\Auth;

class BookingRepo extends BaseFrontRepo implements BookingRepoInterface
{

    public function getBookedRoom()
    {

        return Booking::where('user_id',Auth::user()->id)->get();
    }

    public function getBookingDetailByBooking($id)
    {
        return BookingDetail::whereIn('booking_id',$id)->get();
    }

    public function getSessionCart()
    {
        return Session::get('cart');
    }

    public function getTotalPrice($carts)
    {
        $totalPrice = 0;
        $totalPriceVi = 0;
        if($carts) {
            foreach ($carts as $key => $cart) {
                $totalPrice = $totalPrice+ $cart['price'];
                $totalPriceVi = $totalPriceVi+ $cart['price_vi'];
            }
        }
        $result[]= array(
            "totalPrice"=>$totalPrice,
            "totalPriceVi"=>$totalPriceVi,
        );
        return $result;

    }

    public function getArrayDay($cart)
    {
        $checkins = [];
        $checkouts =[];
        $finals =[];
        if($cart)
        {
            for ($i=0;$i<count($cart);$i++)
            {
                array_push($checkins,date('d-m-Y', strtotime($cart[$i]['checkin'])));
                array_push($checkouts,date('d-m-Y', strtotime($cart[$i]['checkout'])));
                $weekEnds = $this->getArrayWeekend($checkins[$i],$checkouts[$i]);
                $normalDays=$this->getArrayNormalday($checkins[$i],$checkouts[$i]);
                $normalDays['price']    = $cart[$i]['unit_price'];
                $normalDays['price_vi'] = $cart[$i]['unit_price_vi'];
                $weekEnds['week']       = $cart[$i]['weekend'];
                $weekEnds['weekVi']     = $cart[$i]['weekend_vi'];
                $finals[] =  array(
                    "id"         => $cart[$i]['room_id'],
                    "normaldays" => $normalDays,
                    "weekEnds"   =>$weekEnds,
            );
            }
        }
        return $finals;
    }

    public function storeCart($data)
    {
        $session_id     = substr(md5(microtime()), rand(0, 26), 5);
        $cart           = Session::get('cart');
        //Price Calculator
        $price          = RoomPrice::with('room')->where('room_id', $data['id'])->get();
        $priceWeekly    = (float)$price[0]->Weekly;
        $priceWeeklyVi  = (float)$price[0]->Weekly_vi;
        $priceWeekend   = (float)$price[0]->Weekends;
        $priceWeekendVi = (float)$price[0]->Weekends_vi;
        $date           = abs(strtotime($data['checkin']) - strtotime($data['checkout']));
        $checkin        = date('d-m-Y', strtotime($data['checkin']));
        $checkout       = date('d-m-Y', strtotime($data['checkout']));
        $dateAmount     = (float)floor($date / (60 * 60 * 24));
        $weekendDay     = count($this->getArrayWeekend($checkin, $checkout));
        $normalDay      = $dateAmount - $weekendDay;
        $price          = (($normalDay * $priceWeekly) + ($weekendDay * $priceWeekend));
        $priceVi        = (($normalDay * $priceWeeklyVi) + ($weekendDay * $priceWeekendVi));
        $room           = Room::find($data['id']);
        if ($cart == true) {
            $is_avaiable = 0;
            if ($is_avaiable == 0) {
                $cart[] = array(
                    'session_id'    => $session_id,
                    'room_name'     => $data['name'],
                    'room_id'       => $data['id'],
                    'image'         => $room->coverImages,
                    'area'          => $room->area,
                    'checkin'       => $data['checkin'],
                    'checkout'      => $data['checkout'],
                    'date'          => $dateAmount,
                    'unit_price'    => $priceWeekly,
                    'unit_price_vi' => $priceWeeklyVi,
                    'price'         => $price,
                    'price_vi'      => $priceVi,
                    'weekend'       => $priceWeekend,
                    'weekend_vi'    => $priceWeekendVi,
                    'amount'    => $data['amount_people'],
                );
                Session::put('cart', $cart);
                return redirect('booking/#sectionbooking')->with('success', 'Add Room Success');
            }
        } else {
            $cart[] = array(
                'session_id'    => $session_id,
                'room_name'     => $data['name'],
                'room_id'       => $data['id'],
                'image'         => $room->coverImages,
                'area'          => $room->area,
                'checkin'       => $data['checkin'],
                'checkout'      => $data['checkout'],
                'date'          => $dateAmount,
                'unit_price'    => $priceWeekly,
                'unit_price_vi' => $priceWeeklyVi,
                'price'         => $price,
                'price_vi'      => $priceVi,
                'weekend'       => $priceWeekend,
                'weekend_vi'    => $priceWeekendVi,
                'amount'        => $data['amount_people'],
            );
            Session::put('cart', $cart);
            return redirect('booking/#sectionbooking')->with('success', 'Add Room Success');;
        }
        Session::save();
    }

    public function updateAvatar($request)
    {
        $file_name    = $request->email;
        $resizedImage = cloudinary()->upload($request->file('avatar')->getRealPath(), [
            'folder'            => 'avatarUser',
            'use_filename'      =>'true',
            'filename_override' =>$file_name,
            'transformation'    => [
                'width' => 300,
                'height' => 300,
                'gravity' => 'faces',
                'crop' => 'fill'
            ]
        ])->getSecurePath();
        $rs = User::where('id',$request->id)->update(array('avatar'=> $resizedImage));
        return $this->redirect($rs,'Thay đổi Avatar thành công !');
    }

    public function updateInfo($request)
    {
        $validated = $request->validate([
            'name'       => 'required',
            'email'      => 'required',
            'address'    => 'required',
            'phonenumber'=> 'required',
            'sex'        => 'required',
        ]);
        $rs     = User::where('id',$request->id)->update($validated);
        return $this->redirect($rs,'Thông tin đã được cập nhật!');
    }

    public function payment($request)
    {
        $totalPrice_vi  = $request->totalPrice_vi;
        $email          = $request->email;
        return view('vnpay.index',compact('totalPrice_vi','email'));
    }

    public function createPayment()
    {
        $vnp_Url        = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl  = route('booking.payment.return');
        $vnp_TmnCode    = "DH1XIPAE";//Mã website tại VNPAY
        $vnp_HashSecret = "LAXPYCUMJDISRINTXKEMZWVHLOAKXSRF"; //Chuỗi bí mật

        $vnp_TxnRef     = date('YmdHis'); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo  = $_POST['order_desc'];
        $vnp_OrderType  = $_POST['order_type'];
        $vnp_Amount     = $_POST['amount'] * 100;
        $vnp_Locale     = $_POST['language'];
        $vnp_BankCode   = $_POST['bank_code'];
        $vnp_IpAddr     = $_SERVER['REMOTE_ADDR'];
        $inputData      = array(
            "vnp_Version"    => "2.1.0",
            "vnp_TmnCode"    => $vnp_TmnCode,
            "vnp_Amount"     => $vnp_Amount,
            "vnp_Command"    => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode"   => "VND",
            "vnp_IpAddr"     => $vnp_IpAddr,
            "vnp_Locale"     => $vnp_Locale,
            "vnp_OrderInfo"  => $vnp_OrderInfo,
            "vnp_OrderType"  => $vnp_OrderType,
            "vnp_ReturnUrl"  => $vnp_Returnurl,
            "vnp_TxnRef"     => $vnp_TxnRef,

        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash  =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url       .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url)->with('user_id',Auth::user()->id);
    }

    public function insertBooking($request)
    {
        $payMent          = $request->session()->get('paymentMethod');
        $user_id          = $request->session()->get('user_Id');
        $totalPrice       = 0;
        $totalPrice_vi    = 0;
        $items            = Session::get('cart');
        $booking          = new Booking();
        $booking->payment = $payMent;
        $booking->user_id = $user_id;
        $booking->save();
        if($items)
        {
            foreach ($items as $key =>$cart)
            {
                $booking_details = new BookingDetail();
                $booking_details->room_id =$cart['room_id'];
                $booking_details->room_name =$cart['room_name'];
                $booking_details->booking_id = $booking->id;
                $time_checkin   = strtotime($cart['checkin']);
                $time_checkout  = strtotime($cart['checkout']);
                $checkin        = date('Y-m-d',$time_checkin);
                $checkout       = date('Y-m-d',$time_checkout);
                $booking_details->checkin = $checkin;
                $booking_details->checkout = $checkout;
                $booking_details->amount_date = $cart['date'];
                $booking_details->amount = $cart['amount'];
                $booking_details->unit_price = $cart['unit_price'];
                $booking_details->unit_price_vi = $cart['unit_price_vi'];
                $booking_details->price = $cart['price'];
                $booking_details->price_vi = $cart['price_vi'];
                $totalPrice      = $totalPrice + $cart['price'];
                $totalPrice_vi  = $totalPrice_vi + $cart['price_vi'];
                $booking_details->save();
            }

        }
        $total = Booking::where('id', $booking->id)->update(
            ['totalprice'   => $totalPrice,
            'totalprice_vi' => $totalPrice_vi],
         );
        Session::forget('cart');
        return redirect('booking/#sectionbooked')->with('success','Đặt Phòng Thành Công');;
    }

    public function getArrayWeekend($start,$end)
    {
        $period     = CarbonPeriod::create($start,$end);
        $dates      =[];
        $weekDays   =[];
        foreach ($period as $date)
        {
            array_push($dates,$date->format('Y-m-d'));
        }
        foreach ($dates as $date)
        {
            $weekDay = date('w', strtotime($date));
            if( ($weekDay == 0 || $weekDay == 6))
            {
                array_push($weekDays,$date);
            }
        }
        return $weekDays;
    }

    public function getArrayNormalday($start,$end)
    {
        $period     = CarbonPeriod::create($start,$end);
        $dates      =[];
        $normalDays =[];
        foreach ($period as $date) {
            array_push($dates,$date->format('Y-m-d'));
        }
        foreach ($dates as $date)
        {
            $normalDay = date('w', strtotime($date));
            if( ($normalDay != 0 && $normalDay != 6))
            {
                array_push($normalDays,$date);
            }
        }
        return $normalDays;
    }

    public function deleteSesion($id)
    {
        $cart = Session::get('cart');
        if($cart==true)
        {
            foreach($cart as $key => $val)
            {
                if($val['session_id']==$id)
                {
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('success','Xóa sản phẩm thành công');
        }else{
            return redirect()->back()->with('error','Xóa sản phẩm thất bại');
        }
    }

    function redirect($rs,$mess)
    {
        if($rs){
            return redirect()->back()->with('success',$mess);
        }else{
            return redirect()->back()->with('error','Opp! Có lỗi xảy ra !!!');
        }
    }
}
