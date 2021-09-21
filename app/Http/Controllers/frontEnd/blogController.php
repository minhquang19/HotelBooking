<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class blogController extends Controller
{
    public function index()
    {
        $bloglist = Blog::paginate(6);
        $blog = Blog::all();
        return view('frontEnd.blog',compact('bloglist','blog'));
    }
    public function show($id)
    {
        $detail = Blog::all();
        $random = $detail;
        $detail = $detail->find($id);
        $blog = Blog::all();
        return view('frontEnd.blog-details',compact('detail','random','blog'));
    }
}
