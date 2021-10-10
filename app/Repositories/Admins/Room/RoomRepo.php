<?php
namespace App\Repositories\Admins\Room;
use App\Models\Category;
use App\Models\Room;
use App\Models\RoomImage;
use App\Models\RoomPrice;
use App\Models\Tag;
use App\Models\TagRoom;
use App\Repositories\BaseRepository;
class RoomRepo extends BaseRepository implements RoomRepoInterface
{

    public function getModel()
    {
        return Room::class;
    }
    public function getImageByRoom($id)
    {
        return RoomImage::where('room_id',$id)->get();
    }
    public function getPriceByRoom($id)
    {
        return RoomPrice::where('room_id',$id)->get();
    }
    public function getTagByRoom($id)
    {
        return TagRoom::where('room_id',$id)->get();
    }
    public function getAllTag()
    {
        return Tag::all();
    }
    public function getAllCategory()
    {
        return Category::all();
    }

}
