<?php
namespace App\Repositories\Front\Booking;

use App\Repositories\Front\RepoFrontInterface;

interface BookingRepoInterface extends RepoFrontInterface
{
    public function getBookedRoom();
    public function getTotalPrice($carts);
    public function getArrayDay($cart);
    public function storeCart($data);
    public function updateAvatar($request);
    public function updateInfo($request);
    public function deleteSesion($id);
    public function insertBooking($request);
    public function getBookingDetailByBooking($id);
}
