<?php
namespace App\Repositories\Admins\TagRoom;
use App\Models\TagRoom;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class TagRoomRepo extends BaseRepository implements TagRoomRepoInterface
{

    public function getModel()
    {
        return TagRoom::class;
    }
    public function createMultiTag($id,$arr)
    {
        $tag = new TagRoom;
        $tag->room_id = $id;
        $tag->tag_id =$arr;
        $tag->save();
    }
    public function deleteTagByRoomId($id)
    {
        if(TagRoom::where('room_id',$id))
        {
            return TagRoom::where('room_id',$id)->delete();
        }
        return true;

    }
}
