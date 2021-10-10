<?php
namespace App\Repositories\Admins\RoomPrice;
use App\Models\RoomPrice;
use App\Repositories\BaseRepository;
use App\Repositories\Admins\RoomPrice\RoomPriceRepoInterface;

class RoomPriceRepo extends BaseRepository implements RoomPriceRepoInterface
{

    public function getModel()
    {
       return RoomPrice::class;
    }
}
