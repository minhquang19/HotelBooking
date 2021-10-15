<?php
namespace App\Repositories\Admins\Admin;
use App\HelperClass\Date;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Room;
use App\Models\User;
use App\Models\Blog;
use App\Repositories\Admins\BaseAdminRepo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminRepo extends BaseAdminRepo implements AdminRepoInterface
{

    public function countRoom()
    {
        return  Room::all()->count();
    }

    public function countUser()
    {
        return  User::all()->count();
    }

    public function countBooking()
    {
        return Booking::all()->count();
    }

    public function countBlog()
    {
        return Blog::all()->count();
    }

    public function getModel()
    {
        return Admin::class;
    }

    public function getListBookingDESC()
    {
        return BookingDetail::orderBy('created_at','DESC')->get();
    }

    public function getStatisticalByDay($listDay)
    {
        $revenues = Booking::whereMonth('created_at',date('m'))
                                 ->select(\DB::raw('sum(totalPrice_vi) as totalMoney'),\DB::raw('DATE(created_at) as day'))
                                 ->groupBy('day')
                                 ->get()->toArray();
        $arrRevenue = [];
        foreach($listDay as $day)
        {
            $total = 0;
            foreach($revenues as $key => $revenue)
            {
                if($revenue['day'] == $day)
                {
                    $total = $revenue['totalMoney'];
                    break;
                }
            }
            $arrRevenue[] = (int)$total;
        }
        return $arrRevenue;
    }

    public function getRevenueInDay()
    {
        $revenue        = 0;
        $bookingToday   = Booking::whereDate('created_at',Carbon::today());
        if($bookingToday) {
            $revenue    = $bookingToday->sum('totalPrice_vi');
        }
        return $revenue;
    }

    public function createAccountAdminDefault()
    {
//        $password = Hash::make('12345678');
//        Admin::create([
//            'email' => 'admin@gmail.com',
//            'name' => 'Admin',
//            'password' => $password,
//        ]);
        $rs = Booking::create([
            'totalPrice'=>30,
            'totalPrice_vi'=>1000000,
            'payment' =>'paypal',
            'user_id'=>1,
        ]);
        dd($rs);
        return $rs;
    }
}
