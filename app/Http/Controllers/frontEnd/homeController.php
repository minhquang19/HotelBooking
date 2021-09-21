<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Service;
use App\Models;
class homeController extends Controller
{
    public function index()
    {
        try {
            $room_data = Room::all();
            $category_data = Category::all();
            $blog = Blog::all();
            $service = Service::all();
//            $service =  Models\Service::all()->random(2);
            return view('frontEnd.index',compact('room_data','category_data','blog','service'));

        }catch (Exception $e)
        {

        }
    }
}
