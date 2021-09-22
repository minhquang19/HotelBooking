<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;

class roomController extends Controller
{
    public function index(){
        $room_data= Models\Room::where('visibility',1);
        return view('frontEnd.');
    }
    public function show($id){
        return $id;
    }
}
