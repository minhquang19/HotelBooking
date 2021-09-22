<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models;
use PHPUnit\Exception;

class homeController extends Controller
{
    public function index()
    {
        try {
            $room_data = Models\Room::all();
            $category_data = Models\Category::all();
            $blog = Models\Blog::all();
//            $service =  Models\Service::all()->random(2);
            return view('frontEnd.index',compact('room_data','category_data','blog'));

        }catch (Exception $e)
        {

        }
    }
}
