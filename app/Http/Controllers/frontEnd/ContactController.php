<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class contactController extends Controller
{
    public function index()
    {
        $listBlog = Blog::all();
        return view('frontEnd.contact',compact('listBlog'));
    }
}
