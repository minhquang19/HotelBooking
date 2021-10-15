<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;

use App\Repositories\Front\Room\RoomRepo;
use Illuminate\Support\Facades\Config;


class RoomController extends Controller
{
    protected $roomRepo;
    public function __construct(RoomRepo $roomRepo)
    {
        $this->roomRepo = $roomRepo;
    }

    public function index(){
        $listRoom       = $this->roomRepo->getVisibilityRoom();
        $listTag        = $this->roomRepo->getAllTag();
        $listCategory   = $this->roomRepo->getAllCategory();
        $listBlog       = $this->roomRepo->getAllBlog();
        $listPrice      = $this->roomRepo->getPriceByRoom();
        $listRoom       = $this->roomRepo->fillterRoom($listRoom);
        $listRoom       = $listRoom->paginate(Config::get('constants.paginationRecords'));
        $viewData       = [
            'listTag'       => $listTag,
            'listCategory'  => $listCategory,
            'listBlog'      => $listBlog,
            'listPrice'     => $listPrice,
            'listRoom'      => $listRoom,
        ];
        return view('frontEnd.room',$viewData);
    }
    public function show($id)
    {
        $roomDetail     = $this->roomRepo->findRoomById($id);
        $roomImages     = $this->roomRepo->getImageOfRoom($id);
        $roomPrice      = $this->roomRepo->getPriceByRoomId($id);
        $tagOfRoom      = $this->roomRepo->getTagOfRoom($id);
        $tagName        = $this->roomRepo->getTagNameFromTagId($tagOfRoom);
        $RoomRand       = $this->roomRepo->get3RandomRoom();
        $listBlog       = $this->roomRepo->getAllBlog();
        $listCheckInOut = $this->roomRepo->getListCheckInOut($id);
        $viewData       = [
            'roomDetail'     =>$roomDetail,
            'roomImages'     =>$roomImages,
            'roomPrice'      =>$roomPrice,
            'tagOfRoom'      =>$tagOfRoom,
            'tagName'        =>$tagName,
            'RoomRand'       =>$RoomRand,
            'listBlog'       =>$listBlog,
            'listCheckInOut' =>$listCheckInOut,
        ];
        return view('frontEnd.room-details',$viewData);
    }
}
