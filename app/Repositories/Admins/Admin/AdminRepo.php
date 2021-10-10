<?php
namespace App\Repositories\Admins\Admin;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Room;
use App\Models\User;
use App\Models\Blog;
use App\Repositories\BaseRepository;

class AdminRepo extends BaseRepository implements AdminRepoInterface
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
}
