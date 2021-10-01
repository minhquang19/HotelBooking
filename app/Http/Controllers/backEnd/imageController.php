<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomImage;
use Illuminate\Http\Request;
use App\Http\Requests\Images\StorePostRequest;
use App\Http\Requests\Images\UpdatePostRequest;
use DB;
use Image;

class imageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        try
        {
            $validated = $request->validated();
            $room = Room::find($request->room_id);
            $room_name = str_replace(' ','',$room->name);
            $files =$request->file('name');

            if ($files){
                foreach ($files as $file)
                {
                    $result = $file->storeOnCloudinaryAs('ImageRoom/'.$room_name,$room_name.rand(100,999).time());
                    $validated['name'] = $result->getSecurePath();
                    RoomImage::create($validated);
                }
                return  back()->with('success','Thêm ảnh chi tiết phòng thành công');
        }}
        catch (\Exception $e)
        {
            abort(505);
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
            RoomImage::find($id)->delete();
            return  back()->with('success','Xoá ảnh chi tiết phòng thành công');
        }catch (\Exception $e){
            abort(500);
        }
    }
}
