<?php
namespace App\Repositories\FrontEnd\Service;
use App\Models\Service;
use App\Repositories\FrontEnd\BaseFrontRepo;

class ServiceRepo extends BaseFrontRepo implements ServiceRepoInterface
{

    public function getServiceById($id)
    {
        return Service::find($id);
    }
}
