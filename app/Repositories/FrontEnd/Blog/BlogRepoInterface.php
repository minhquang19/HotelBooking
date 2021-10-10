<?php
namespace App\Repositories\FrontEnd\Blog;
use App\Repositories\FrontEnd\RepoFrontInterface;

interface BlogRepoInterface extends RepoFrontInterface
{
    public function getBlogById($id);
    public function getRandomBlog();
}
