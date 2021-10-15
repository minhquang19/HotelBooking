<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Repositories\Front\Service\ServiceRepo;
use Illuminate\Support\Facades\Config;

class ServiceController extends Controller
{
    protected $serviceRepo;
    public function __construct(ServiceRepo $serviceRepo)
    {
        $this->serviceRepo = $serviceRepo;
    }

    public function index(){
        $listBlog       = $this->serviceRepo->getLimitBlog();
        $listService    = $this->serviceRepo->getAllService();
        return view('frontEnd.services',compact('listBlog','listService'));
    }
    public function show($id){
        $listBlog       = $this->serviceRepo->getAllBlog();
        $serviceDetail  = $this->serviceRepo->getServiceById($id);
        return view('frontEnd.serviceDetail',compact('listBlog','serviceDetail'));
    }
}
