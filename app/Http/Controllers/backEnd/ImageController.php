<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\Images\StorePostRequest;
use App\Repositories\Admins\RoomImage\RoomImageRepo;

class imageController extends Controller
{
    protected $imageRepo;
    public function __construct(RoomImageRepo $imageRepo)
    {
        $this->imageRepo = $imageRepo;
    }

    public function store(StorePostRequest $request)
    {
        try
        {
            $validated = $request->validated();
            $files =$request->file('name');
            $folder = 'ImageRoom';
            if ($files)
            {
                foreach ($files as $file)
                {
                    $filename         = $this->imageRepo->getFileName($request->room_id);
                    $uploadImage      = $this->imageRepo->uploadImageOnCloudinary($file,$filename,$folder);
                    $validated['name']= $uploadImage->getSecurePath();
                    $this->imageRepo->create($validated);
                }
                return  back()->with('success','Thêm ảnh chi tiết phòng thành công');
            }
        }
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
            $rs     =$this->imageRepo->delete($id);
            return  $this->imageRepo->redirect($rs,'Xoá ảnh chi tiết phòng thành công!');
        }
        catch (\Exception $e){
            abort(500);
        }
    }
}
