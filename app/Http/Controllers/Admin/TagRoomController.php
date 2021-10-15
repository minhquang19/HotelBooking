<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admins\TagRoom\TagRoomRepo;
use Illuminate\Http\Request;

class TagRoomController extends Controller
{
    protected $tagRoomRepo;
    public function __construct(TagRoomRepo $tagRoomRepo)
    {
        $this->tagRoomRepo = $tagRoomRepo;
    }

    public function store(Request $request)
    {
        $this->tagRoomRepo->deleteTagByRoomId($request->room_id);
        $arr = $request->input('tag_id');
        for($i=0;$i< count($arr);$i++)
        {
            $this->tagRoomRepo->createMultiTag($request->room_id,$arr[$i]);
        }
        return back()->with('success','Cập nhật thành công');

    }

}
