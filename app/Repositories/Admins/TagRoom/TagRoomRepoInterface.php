<?php
namespace App\Repositories\Admins\TagRoom;
use App\Repositories\Admins\RepoAdminInterface;

interface TagRoomRepoInterface extends RepoAdminInterface
{
    public function deleteTagByRoomId($id);
    public function createMultiTag($id,$arr);

}
