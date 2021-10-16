<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class ContactController extends Controller
{
    public function index()
    {
        $listBlog = Blog::all();
        return view('FrontEnd.Contact',compact('listBlog'));
    }
}
