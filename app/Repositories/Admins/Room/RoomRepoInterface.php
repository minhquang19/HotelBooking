<?php
namespace App\Repositories\Admins\Room;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface;

interface RoomRepoInterface extends RepositoryInterface
{
    public function getImageByRoom($id);
    public function getPriceByRoom($id);
    public function getTagByRoom($id);
    public function getAllTag();
    public function getAllCategory();
}
