<?php
namespace App\Repositories\Admins\Category;

use App\Models\Category;
use App\Models\Room;
use App\Repositories\BaseRepository;

class CategoryRepo extends BaseRepository implements CategoryRepoInterface
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
