<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admins\Room\RoomRepo;
use App\Http\Requests\Room\StorePostRequest;
use App\Http\Requests\Room\UpdatePostRequest;

class RoomController extends Controller
{
    public $roomRepo;
    public function __construct(RoomRepo $roomRepo)
    {
        $this->roomRepo = $roomRepo;
    }
    public function index()
    {
        try {
            $room       = $this->roomRepo->getAll();
            $category   = $this->roomRepo->getAllCategory();
            return  view('Admin.Room.index', compact('room','category'));
        } catch (\Exception $e) {
            abort(500);
        }
    }
    public function store(StorePostRequest $request)
    {
        try {
            $validated      = $request->validated();
            $validated['visibility']=($request->visibility == null)?0:1;
            $file_name      = $request->name.'_cover_'.time();
            $folder         = 'CoverRoom';
            $uploadImage    = $this->roomRepo->uploadImageOnCloudinary($request->file('coverImages'),$file_name,$folder);
            $validated['coverImages'] = $uploadImage->getSecurePath();
            $rs             = $this->roomRepo->create($validated);
            return          $this->roomRepo->redirect($rs,'Phòng đã được tạo thành công !!!');
        }catch (\Exception $e)
        {
            abort(500);
        }
    }

    public function show($id)
    {
        try {
            $room       = $this->roomRepo->find($id);
            $roomImages = $this->roomRepo->getImageByRoom($id);
            $roomPrice  = $this->roomRepo->getPriceByRoom($id);
            $tagRoom    = $this->roomRepo->getTagByRoom($id);
            $tag        = $this->roomRepo->getAllTag();
            $viewData   = [
                'room'  => $room,
                'roomImages'  => $roomImages,
                'roomPrice'  => $roomPrice,
                'tag'  => $tag,
                'tagRoom'  => $tagRoom,
            ];
            return view('Admin.Room.detail',$viewData);
        }
        catch (\Exception $e){
            abort(500);
        }
    }

    public function update(UpdatePostRequest $request, $id)
    {
        try {
            $validated  = $request->validated();
            $validated['visibility']=($request->visibility == null)?0:1;
            dd($request);
            if ($request->coverImages == null)
            {
                $validated['coverImages'] = $this->roomRepo->find($id)->coverImages;
            }else
            {
                $file_name   = $request->name.'_cover_'.time();
                $folder      = 'CoverRoom';
                $uploadImage = $this->roomRepo->uploadImageOnCloudinary($request->file('coverImages'),$file_name,$folder);
                $validated['coverImages'] = $uploadImage->getSecurePath();
            }
            $rs         = $this->roomRepo->update($id,$validated);
            return      $this->roomRepo->redirect($rs,'Phòng đã được cập nhật !!!');
        }catch (\Exception $e)
        {
            abort(500);
        }
    }

    public function destroy($id)
    {
        try {
            $rs     = $this->roomRepo->delete($id);
            return  $this->roomRepo->redirect($rs,'Phòng đã được xóa !!!');
        } catch (\Exception $e){
            abort(500);
        }
    }

}
