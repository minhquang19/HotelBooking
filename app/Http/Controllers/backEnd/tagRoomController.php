<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\TagRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class tagRoomController extends Controller
{



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(TagRoom::where('room_id',$request->room_id))
        {
            TagRoom::where('room_id',$request->room_id)->delete();
        }
        $arr = $request->input('tag_id');
        for($i=0;$i< count($arr);$i++)
        {
           $tag = new TagRoom;
           $tag->room_id = $request->room_id;
           $tag->tag_id =$arr[$i];
           $tag->save();
        }
        return back()->with('success','Cập nhật thành công');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
