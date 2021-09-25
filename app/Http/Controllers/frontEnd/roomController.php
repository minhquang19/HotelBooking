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
use Illuminate\Http\Request;
use DB;

class roomController extends Controller
{
    public function index(){
        $room_data= Room::where('visibility',1);
        $tag = Tag::all();
        $category_data = Category::all();
        $blog = Blog::all();
        $roomPrice_data = roomPrice::with('room')->get();
        if(request()->has('checkin') && request()->has('checkout'))
        {
            $checkin = date("Y-m-d", strtotime(request()->checkin));
            $checkout = date("Y-m-d", strtotime(request()->checkout));
            $room_data = $room_data->whereNotIn('id', function($query) use ($checkin, $checkout) {
                $query->from('booking_details')
                    ->select('room_id')
                    ->where('checkin', '<=', $checkin)
                    ->where('checkout', '>=', $checkout);
            });
        }
        if(request()->has('min') && request()->has('max'))
        {
            $price_weekly = DB::table('room_prices')->where('Weekly','>=',request()->min)->where('Weekly','<=',request()->max)->get()->pluck('room_id');
            $room_data = $room_data->whereIn('id', $price_weekly);
        }
        if(request()->has('filtertag'))
        {
            $checked = $_GET['filtertag'];
            $filtertag = DB::table('tag_rooms')->whereIn('tag_id',$checked)->get()->pluck('room_id');
            $room_data = $room_data->whereIn('id', $filtertag);
        }
        if(request()->has('category'))
        {
            $room_data = $room_data->where('category_id',request()->category);
        }
        $room_data = $room_data->paginate(4);
        return view('frontEnd.room',compact('room_data','tag','category_data','blog','roomPrice_data'));
    }
    public function show($id){

        $room_detail    = Room::find($id);
        $roomimages     = RoomImage::where('room_id',$id)->get();
        $roomPrice      = roomPrice::with('room')->where('room_id',$id)->get();
        $tag_data       = TagRoom::where('room_id',$id)->get();
        $room_3         = Room::all()->random(3);
        $temp           = DB::table('booking_details')->where('room_id',$id)->get();
        $blog           = Blog::all();
        return view('frontEnd.room-details',compact('room_detail','roomimages','roomPrice','tag_data','room_3','temp','blog'));
    }
}
