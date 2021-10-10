<?php
namespace App\Repositories\Admins\RoomImage;
use App\Models\Room;
use App\Models\RoomImage;
use App\Repositories\BaseRepository;
use App\Repositories\Admins\RoomPrice\RoomPriceRepoInterface;

class RoomImageRepo extends BaseRepository implements RoomPriceRepoInterface
{

    public function getModel()
    {
        return RoomImage::class;
    }
    public function getFileName($id)
    {
        $room       = Room::find($id);
        $room_name  = str_replace(' ','',$room->name);
        $filename   = $room_name.rand(100,999).time();
        return      $filename;
    }
}
