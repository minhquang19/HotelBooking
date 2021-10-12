<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Repositories\FrontEnd\Blog\BlogRepo;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogRepo;
    public function __construct(BlogRepo $blogRepo)
    {
        $this->blogRepo = $blogRepo;
    }

    public function index()
    {
        $listBlogPage   = Blog::paginate(6);
        $listBlog       = Blog::all();
        return view('frontEnd.blog',compact('listBlog','listBlogPage'));
    }
    public function show($id)
    {
        $detailBlog    = $this->blogRepo->getBlogById($id);
        $randomBlog    = $this->blogRepo->getRandomBlog();
        $listBlog      = $this->blogRepo->getAllBlog();
        return view('frontEnd.blog-details',compact('detailBlog','listBlog','randomBlog'));
    }
}
