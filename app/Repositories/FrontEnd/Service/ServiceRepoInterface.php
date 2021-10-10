<?php
namespace App\Repositories\FrontEnd\Service;
use App\Repositories\FrontEnd\RepoFrontInterface;

interface ServiceRepoInterface extends RepoFrontInterface
{
    public function getServiceById($id);
}
