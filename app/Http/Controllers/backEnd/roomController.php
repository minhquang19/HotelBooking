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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $file = $request->coverImages;
            $original_name = strtolower(trim($file->getClientOriginalName()));
            $file_name = time().rand(100,999).$original_name;
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(370,250);
            $image_resize->save('upload/cover/'.$file_name);
            $validated['coverImages'] = $file_name;
            $rs= Room::create($validated);
            if ($rs){
                return back()->with('success','Thêm mới phòng thành công');
            }else{
                return back()->with('error','Thêm không phòng thành công');
            }
        }catch (\Exception $e){
            dd($e);
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
            dd($e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
                $file = $request->coverImages;
                $original_name = strtolower(trim($file->getClientOriginalName()));
                $file_name = time().rand(100,999).$original_name;
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(370,250);
                $image_resize->save('upload/cover/'.$file_name);
                $validated['coverImages'] = $file_name;
            }
            $rs = Room::find($id)->update($validated);
            return back()->with('success','Chỉnh sửa phòng thành công');
        }catch (\Exception $e){
            dd($e);
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
            Room::find($id)->delete(0);
            return back()->with('success','Xóa phòng thành công');
        }catch (\Exception $e){
            dd($e);
            abort(500);
        }
    }
    public function filterRoom(Request $request){
        $state = $request->cur;
        $data = Room::where('category_id','=',$state);
        $category = Category::all();
        return  view('backEnd.Room.index', compact('data','category'));
    }
}
