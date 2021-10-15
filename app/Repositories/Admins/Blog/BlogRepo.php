<?php
namespace App\Repositories\Admins\Blog;
use App\Models\Blog;
use App\Repositories\Admins\BaseAdminRepo;

class BlogRepo extends BaseAdminRepo implements BlogRepoInterface
{
    public function getModel()
    {
        return Blog::class;
    }
}
