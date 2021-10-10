<?php
namespace App\Repositories\Admins\RoomImage;
use App\Repositories\RepositoryInterface;

interface RoomImageRepoInterface extends RepositoryInterface
{
    public function getAll();
    public function getFileName($id);
}
