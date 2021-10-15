<?php
namespace App\Repositories\Admins\Room;
use App\Repositories\Admins\RepoAdminInterface;

interface RoomRepoInterface extends RepoAdminInterface
{
    public function getImageByRoom($id);
    public function getPriceByRoom($id);
    public function getTagByRoom($id);
    public function getAllTag();
    public function getAllCategory();
}
