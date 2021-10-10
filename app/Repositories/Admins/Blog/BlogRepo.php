<?php
namespace App\Repositories\Admins\Blog;
use App\Models\Blog;
use App\Repositories\BaseRepository;

class BlogRepo extends BaseRepository implements BlogRepoInterface
{
    public function getModel()
    {
        return Blog::class;
    }
}
