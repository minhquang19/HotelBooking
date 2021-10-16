<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Repositories\Front\Booking\BookingRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    protected $bookingRepo;
    public function __construct(BookingRepo $bookingRepo)
    {
        $this->bookingRepo = $bookingRepo;
    }

    public function index()
    {
        $cart           = $this->bookingRepo->getSessionCart();
        $totalPrice     = $this->bookingRepo->getTotalPrice($cart)[0]['totalPrice'];
        $totalPriceVi   = $this->bookingRepo->getTotalPrice($cart)[0]['totalPriceVi'];
        $bookedRoom     = $this->bookingRepo->getBookedRoom();
        $listBlog       = $this->bookingRepo->getAllBlog();
        $bookingDetail  = $this->bookingRepo->getBookingDetailByBooking($bookedRoom->pluck('id'));
        $viewData       = [
            'cart'          => $cart,
            'totalPrice'    => $totalPrice,
            'totalPriceVi'  => $totalPriceVi,
            'bookedRoom'    => $bookedRoom,
            'listBlog'      => $listBlog,
            'bookingDetail' => $bookingDetail,

        ];
        return view('frontEnd.booking',$viewData);

    }

    public function store(Request $request)
    {
        $data   = $request->all();
        return $this->bookingRepo->storeCart($data);

    }

    public function add(Request $request)
    {
        return $this->bookingRepo->insertBooking($request);

    }

    public function destroy($id)
    {
        return $this->bookingRepo->deleteSesion($id);
    }

    public function updateAvatar(Request $request)
    {
        return  $this->bookingRepo->updateAvatar($request);

    }

    public function updateInfo(Request $request)
    {
        return $this->bookingRepo->updateInfo($request);

    }

    public function payMent(Request $request)
    {
        return $this->bookingRepo->payment($request);
    }

    public function createPayment(Request $request)
    {
        return $this->bookingRepo->createPayment();

    }

    public function payMentReturn(Request $request)
    {
        $user_id        = Auth::user()->id;
        if($request->vnp_CardType)
        {
            $payMent = "VNPAY";
        }else{
            $payMent ="PAYPAL";
        }
        return redirect()->route('booking.add')->with('paymentMethod',$payMent)
                                                     ->with('user_Id',$user_id)  ;
    }

    public function bookingDetail()
    {
        $html= '';
        $id     = $_GET['id'];
        $cart   = $this->bookingRepo->getSessionCart();
        $finals = $this->bookingRepo->getArrayDay($cart);
        foreach($finals as $final)
        {
            if($final['id'] === $id)
            {
                $price = $final['normaldays']['price'];
                $priceVi = $final['normaldays']['price_vi'];
                $weekVi = $final['weekEnds']['weekVi'];
                $week = $final['weekEnds']['week'];
                for($i=0;$i<count($final['normaldays'])-2;$i++)
                {
                    $html =$html.'<tr><td>' . $final['normaldays'][$i] . '</td>' . '<td>' . $price. ' $</td>' . '<td>' . $priceVi . ' VNĐ</td>' .'<td>' .'Normal'. ' </td>' . '</tr>';
                }
                for($j=0;$j<count($final['weekEnds'])-2;$j++)
                {
                    $html =$html.'<tr><td>' . $final['weekEnds'][$j] . '</td>' . '<td>' . $week. ' $</td>' . '<td>' . $weekVi . ' VNĐ</td>' . '<td>' .'Weekends'. ' </td>'. '</tr>';
                }
            }
        }
        return $html;
    }






}
