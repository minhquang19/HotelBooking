<?php
namespace App\Repositories\Admins\Category;

use App\Models\Category;
use App\Models\Room;
use App\Repositories\Admins\BaseAdminRepo;

class CategoryRepo extends BaseAdminRepo implements CategoryRepoInterface
{

    public function getModel()
    {
        return Category::class;
    }

    public function checkForeignKey($id)
    {
        return Room::where('category_id',$id)->count() > 0;
    }
}
