<?php
namespace App\Repositories\Admins\RoomPrice;
use App\Models\RoomPrice;
use App\Repositories\Admins\BaseAdminRepo;
use App\Repositories\BaseRepository;

class RoomPriceRepo extends BaseAdminRepo implements RoomPriceRepoInterface
{

    public function getModel()
    {
       return RoomPrice::class;
    }
}
