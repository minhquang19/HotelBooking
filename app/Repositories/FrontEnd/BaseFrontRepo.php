<?php
namespace App\Repositories\FrontEnd;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Room;
use App\Models\Service;
use App\Models\Tag;

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
        return Blog::all();
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
