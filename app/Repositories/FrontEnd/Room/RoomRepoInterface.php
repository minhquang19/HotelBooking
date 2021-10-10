<?php
namespace App\Repositories\FrontEnd\Room;
use App\Repositories\FrontEnd\RepoFrontInterface;

interface RoomRepoInterface extends RepoFrontInterface
{
    public function getVisibilityRoom();
    public function getPriceByRoom();
    public function getPriceByRoomId($id);
    public function fillterRoom($listRoom);
    public function findRoomById($id);
    public function getImageOfRoom($id);
    public function getTagOfRoom($id);
    public function getTagNameFromTagId($listTag);
    public function get3RandomRoom();
    public function getListCheckInOut($id);

}
