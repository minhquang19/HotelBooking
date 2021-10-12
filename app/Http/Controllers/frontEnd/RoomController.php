<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\RoomImage;
use App\Models\Service;
use App\Models\Tag;
use App\Models\Room;
use App\Models\Category;
use App\Models\RoomPrice;
use App\Models\TagRoom;
use App\Repositories\FrontEnd\Room\RoomRepo;
use Illuminate\Http\Request;
use DB;

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
        $listRoom       = $listRoom->paginate(5);
        return view('frontEnd.room',compact('listRoom','listTag','listCategory','listBlog','listPrice'));
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
        return view('frontEnd.room-details',compact('roomDetail','roomImages','roomPrice','tagName','RoomRand','listBlog','listCheckInOut'));
    }
}
