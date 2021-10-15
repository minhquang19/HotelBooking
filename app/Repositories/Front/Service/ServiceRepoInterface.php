<?php
namespace App\Repositories\Front\Service;

use App\Repositories\Front\RepoFrontInterface;

interface ServiceRepoInterface extends RepoFrontInterface
{
    public function getServiceById($id);
}
