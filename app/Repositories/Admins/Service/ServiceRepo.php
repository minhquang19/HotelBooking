<?php
namespace App\Repositories\Admins\Service;
use App\Models\Service;
use App\Repositories\BaseRepository;

class ServiceRepo extends BaseRepository implements ServiceRepoInterface
{

    public function getModel()
    {
       return Service::class;
    }
}
