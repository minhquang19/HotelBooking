<?php
namespace App\Repositories\FrontEnd\Room;
use App\Models\BookingDetail;
use App\Models\Room;
use App\Models\RoomImage;
use App\Models\RoomPrice;
use App\Models\Tag;
use App\Models\TagRoom;
use DB;
use App\Repositories\FrontEnd\BaseFrontRepo;

class RoomRepo extends BaseFrontRepo implements RoomRepoInterface
{

    public function getVisibilityRoom()
    {
        return Room::where('visibility',1);
    }

    public function getPriceByRoom()
    {
        return RoomPrice::with('room')->get();
    }

    public function fillterRoom($listRoom)
    {
        if(request()->has('checkin') && request()->has('checkout'))
        {
            $checkin = date("Y-m-d", strtotime(request()->checkin));
            $checkout = date("Y-m-d", strtotime(request()->checkout));
            $listRoom = $listRoom->whereNotIn('id', function($query) use ($checkin, $checkout) {
                $query->from('booking_details')
                    ->select('room_id')
                    ->where('checkin', '<=', $checkin)
                    ->where('checkout', '>=', $checkout);
            });
        }
        if(request()->has('min') && request()->has('max'))
        {
            $price_weekly = DB::table('room_prices')->where('Weekly','>=',request()->min)->where('Weekly','<=',request()->max)->get()->pluck('room_id');
            $listRoom = $listRoom->whereIn('id', $price_weekly);
        }
        if(request()->has('filtertag'))
        {
            $checked = $_GET['filtertag'];
            $filtertag = DB::table('tag_rooms')->whereIn('tag_id',$checked)->get()->pluck('room_id');
            $listRoom = $listRoom->whereIn('id', $filtertag);
        }
        if(request()->has('category'))
        {
            $listRoom = $listRoom->where('category_id',request()->category);
        }
        return $listRoom;
    }

    public function findRoomById($id)
    {
        return Room::find($id);
    }

    public function getImageOfRoom($id)
    {
        return RoomImage::where('room_id',$id)->get();
    }

    public function getPriceByRoomId($id)
    {
        return  RoomPrice::with('room')->where('room_id',$id)->get();
    }

    public function getTagOfRoom($id)
    {
        return TagRoom::where('room_id',$id)->pluck('tag_id');
    }

    public function getTagNameFromTagId($listTag)
    {
        return Tag::whereIn('id',$listTag)->get();
    }

    public function get3RandomRoom()
    {
        return Room::all()->random(3);
    }


    public function getListCheckInOut($id)
    {
        return BookingDetail::where('room_id',$id)->get();
    }

}
