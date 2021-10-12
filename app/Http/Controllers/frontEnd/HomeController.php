<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Repositories\FrontEnd\Home\HomeRepo;
class homeController extends Controller
{
    protected $homeRepo;
    public function __construct(HomeRepo $homeRepo)
    {
        $this->homeRepo = $homeRepo;
    }

    public function index()
    {
        try {
            $listRoom       = $this->homeRepo->getAllRoom();
            $listCategory   = $this->homeRepo->getAllCategory();
            $listBlog       = $this->homeRepo->getAllBlog();
            $listService    = $this->homeRepo->getAllService();
//            $service =  Models\Service::all()->random(2);
            return view('frontEnd.index',compact('listRoom','listCategory','listBlog','listService'));
        }catch (Exception $e)
        {
            abort(500);
        }
    }
}
