<?php
namespace App\Repositories\Admins\Tag;
use App\Models\Tag;
use App\Repositories\BaseRepository;
use App\Repositories\TagRoom\TagRoomRepoInterface;

class TagRepo extends BaseRepository implements TagRepoInterface
{

    public function getModel()
    {
        return Tag::class;
    }
}
