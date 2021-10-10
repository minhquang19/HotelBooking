<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Repositories\FrontEnd\Service\ServiceRepo;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Service;

class serviceController extends Controller
{
    protected $serviceRepo;
    public function __construct(ServiceRepo $serviceRepo)
    {
        $this->serviceRepo = $serviceRepo;
    }

    public function index(){
        $listBlog       = $this->serviceRepo->getAllBlog();
        $listService    = $this->serviceRepo->getAllService();
        return view('frontEnd.services',compact('listBlog','listService'));
    }
    public function show($id){
        $listBlog       = $this->serviceRepo->getAllBlog();
        $serviceDetail  = $this->serviceRepo->getServiceById($id);
        return view('frontEnd.serviceDetail',compact('listBlog','serviceDetail'));
    }
}
