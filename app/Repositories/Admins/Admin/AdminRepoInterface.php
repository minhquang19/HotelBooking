<?php
namespace App\Repositories\Admins\Admin;
use App\Repositories\Admins\RepoAdminInterface;

interface AdminRepoInterface extends RepoAdminInterface
{
    public function countRoom();
    public function countUser();
    public function countBooking();
    public function countBlog();
    public function getListBookingDESC();
    public function createAccountAdminDefault();
    public function getStatisticalByDay($listDay);
}
