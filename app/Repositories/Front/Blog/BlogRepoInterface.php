<?php
namespace App\Repositories\Front\Blog;

use App\Repositories\Front\RepoFrontInterface;

interface BlogRepoInterface extends RepoFrontInterface
{
    public function getBlogById($id);
    public function getRandomBlog();
}
