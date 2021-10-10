<?php
namespace App\Repositories\FrontEnd\Blog;
use App\Models\Blog;
use App\Repositories\FrontEnd\BaseFrontRepo;

class BlogRepo extends BaseFrontRepo implements BlogRepoInterface
{
    public function getBlogById($id)
    {
        return Blog::find($id);
    }
    public function getRandomBlog()
    {
        return Blog::all()->random(2);
    }
}
