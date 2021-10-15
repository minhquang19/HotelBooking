<?php
namespace App\Repositories\Front\Service;
use App\Models\Service;
use App\Repositories\Front\BaseFrontRepo;

class ServiceRepo extends BaseFrontRepo implements ServiceRepoInterface
{

    public function getServiceById($id)
    {
        return Service::find($id);
    }
}
