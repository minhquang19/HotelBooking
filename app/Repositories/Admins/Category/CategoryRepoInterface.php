<?php
namespace App\Repositories\Admins\Category;
use App\Repositories\Admins\RepoAdminInterface;
interface CategoryRepoInterface extends RepoAdminInterface
{
    public function checkForeignKey($id);
}
