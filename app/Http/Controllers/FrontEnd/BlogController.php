<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Repositories\Front\Blog\BlogRepo;

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
        return view('FrontEnd.Blog',compact('listBlog','listBlogPage'));
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
        return view('FrontEnd.BlogDetail',$viewData);
    }
}
