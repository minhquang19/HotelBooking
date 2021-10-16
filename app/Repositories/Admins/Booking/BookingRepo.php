<?php


namespace App\Repositories\Admins\Booking;


use App\Repositories\Admins\BaseAdminRepo;

class BookingRepo extends BaseAdminRepo implements BookingRepoInterface
{

    public function getModel()
    {
        return Booking::class;
    }
}
