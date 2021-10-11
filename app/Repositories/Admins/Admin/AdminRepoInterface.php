<?php
namespace App\Repositories\Admins\Admin;
use App\Repositories\RepositoryInterface;

interface AdminRepoInterface extends RepositoryInterface
{
    public function countRoom();
    public function countUser();
    public function countBooking();
    public function countBlog();
    public function getListBookingDESC();
    public function createAccountAdminDefault();
}
