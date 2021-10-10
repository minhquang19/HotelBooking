<?php
namespace App\Repositories\Admins\Category;


use App\Repositories\RepositoryInterface;

interface CategoryRepoInterface extends RepositoryInterface
{
    public function checkForeignKey($id);
}
