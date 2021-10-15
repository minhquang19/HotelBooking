<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $listBlog = Blog::all();
        return view('frontEnd.contact',compact('listBlog'));
    }
}
