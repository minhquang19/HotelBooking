<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Service;

class serviceController extends Controller
{
    public function index(){
        $blog = Blog::all();
        $service =  Service::all();
        return view('frontEnd.services',compact('blog','service'));
    }
    public function show($id){
        $blog = Blog::all();
        $detail = Service::find($id);
        return view('frontEnd.serviceDetail',compact('blog','detail'));
    }
}
