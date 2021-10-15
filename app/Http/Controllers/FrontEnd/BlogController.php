<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Repositories\Front\Blog\BlogRepo;
use Illuminate\Support\Facades\Config;

class BlogController extends Controller
{
    protected $blogRepo;
    public function __construct(BlogRepo $blogRepo)
    {
        $this->blogRepo = $blogRepo;
    }

    public function index()
    {
        $listBlogPage   = $this->blogRepo->getAllBlog();
        $listBlog       = $this->blogRepo->getLimitBlog();
        return view('frontEnd.blog',compact('listBlog','listBlogPage'));
    }
    public function show($id)
    {
        $detailBlog    = $this->blogRepo->getBlogById($id);
        $randomBlog    = $this->blogRepo->getRandomBlog();
        $listBlog      = $this->blogRepo->getLimitBlog();
        $viewData      = [
           'detailBlog'     => $detailBlog,
           'listBlog'       => $listBlog,
           'randomBlog'     => $randomBlog,
        ];
        return view('frontEnd.blog-details',$viewData);
    }
}
