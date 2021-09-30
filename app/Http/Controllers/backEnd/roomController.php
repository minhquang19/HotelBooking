<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Image;
use DB;
use App\Http\Requests\Room\StorePostRequest;
use App\Http\Requests\Room\UpdatePostRequest;
use App\Models\Category;
use App\Models\Room;
use App\Models\Tag;
use App\Models\RoomPrice;
use App\Models\RoomImage;
use App\Models\TagRoom;

class roomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Room::all();
            $category = Category::all();
            return view('backEnd.Room.index', compact('data','category'));
        }catch (\Exception $e){
            abort(500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        try {
            $validated = $request->validated();
            $validated['visibility']=($request->visibility == null)?0:1;
            $file_name = $request->name.'_cover_'.time();
            if ($request->hasFile('coverImages')) {
                $result = $request->file('coverImages')->storeOnCloudinaryAs('CoverRoom',$file_name);
            }
            $validated['coverImages'] = $result->getSecurePath();
            $rs= Room::create($validated);
            return $this->Redirect($rs,'Phòng đã được tạo thành công !!!');
        }catch (\Exception $e){

            abort(500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $obj = Room::find($id);
            $roomimages = RoomImage::where('room_id',$id)->get();
            $roomPrice = RoomPrice::where('room_id',$id)->get();
            $tag_room = TagRoom::where('room_id',$id)->get();
            $tag = Tag::all();
            $temp           = DB::table('booking_details')->where('room_id',$id)->get();
            return view('backEnd.Room.detail', compact('obj','roomimages','roomPrice','tag','tag_room','temp'));
        }catch (\Exception $e){
            abort(500);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        try {
            $validated = $request->validated();
            $validated['visibility']=($request->visibility == null)?0:1;
            if ($request->coverImages == null){
                $validated['coverImages'] = Room::find($id)->coverImages;
            }else{
                $file_name = $request->name.'_cover_'.time();
                if ($request->hasFile('coverImages')) {
                    $result = $request->file('coverImages')->storeOnCloudinaryAs('CoverRoom',$file_name);
                }
                $validated['coverImages'] = $result->getSecurePath();
            }
            $rs = Room::find($id)->update($validated);
            return $this->Redirect($rs,'Phòng đã được cập nhật !!!');
        }catch (\Exception $e){
            abort(500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $rs = Room::find($id)->delete(0);
            return $this->Redirect($rs,'Phòng đã được xóa !!!');
        }catch (\Exception $e){
            abort(500);
        }
    }
    public function filterRoom(Request $request){
        $state = $request->cur;
        $data = Room::where('category_id','=',$state);
        $category = Category::all();
        return  view('backEnd.Room.index', compact('data','category'));
    }
    public function Redirect($rs,$mess){
        if($rs){
            return back()->with('success',$mess);
        }
        else{
            return back()->with('error','Opp!!! Có lỗi xảy ra');
        }
    }
}
