<?php
namespace App\Repositories\FrontEnd\Booking;
use App\Repositories\FrontEnd\RepoFrontInterface;

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
