<?php
namespace App\Repositories\Admins\TagRoom;
use App\Repositories\RepositoryInterface;

interface TagRoomRepoInterface extends RepositoryInterface
{
    public function deleteTagByRoomId($id);
    public function createMultiTag($id,$arr);

}
