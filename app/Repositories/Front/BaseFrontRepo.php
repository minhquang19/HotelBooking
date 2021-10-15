<?php
namespace App\Repositories\Front;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Room;
use App\Models\Service;
use App\Models\Tag;
use Illuminate\Support\Facades\Config;

abstract class BaseFrontRepo implements RepoFrontInterface
{

    public function getAllRoom()
    {
        return Room::all();
    }

    public function getAllCategory()
    {
        return Category::all();
    }

    public function getAllBlog()
    {
        return Blog::paginate(2);;
    }

    public function getLimitBlog()
    {
        return Blog::limit(Config::get('constants.blogLimit'))->get();
    }

    public function getLimitService()
    {
        return Service::limit(Config::get('constants.serviceLimit'))->get();
    }

    public function getAllService()
    {
        return  Service::all();
    }

    public function getAllTag()
    {
        return  Tag::all();
    }
}
