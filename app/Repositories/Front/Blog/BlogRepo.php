<?php
namespace App\Repositories\Front\Blog;
use App\Models\Blog;
use App\Repositories\Front\BaseFrontRepo;
use Illuminate\Support\Facades\Config;

class BlogRepo extends BaseFrontRepo implements BlogRepoInterface
{
    public function getBlogById($id)
    {
        return Blog::find($id);
    }
    public function getRandomBlog()
    {
        return Blog::limit(Config::get('constants.blograndom'))->get();
    }
}
