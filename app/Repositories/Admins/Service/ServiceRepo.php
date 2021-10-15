<?php
namespace App\Repositories\Admins\Service;
use App\Models\Service;
use App\Repositories\Admins\BaseAdminRepo;

class ServiceRepo extends BaseAdminRepo implements ServiceRepoInterface
{

    public function getModel()
    {
       return Service::class;
    }
}
