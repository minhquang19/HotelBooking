<?php
namespace App\Repositories\Admins\Booking;

use App\Repositories\Admins\RepoAdminInterface;

interface BookingRepoInterface extends RepoAdminInterface
{
    public function getListBookingCreated();
    public function getBookingDetail($id);
    public function showFullCalendar();
}
