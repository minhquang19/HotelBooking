<?php
namespace App\Repositories\Front\Blog;
use App\Models\Blog;
use App\Repositories\Front\BaseFrontRepo;

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
