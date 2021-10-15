<?php
namespace App\Repositories\Admins\RoomImage;
use App\Repositories\Admins\RepoAdminInterface;

interface RoomImageRepoInterface extends RepoAdminInterface
{
    public function getAll();
    public function getFileName($id);
}
