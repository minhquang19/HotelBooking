<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Repositories\Front\Home\HomeRepo;

class HomeController extends Controller
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
            $listBlog       = $this->homeRepo->getLimitBlog();
            $listService    = $this->homeRepo->getLimitService();
            $viewData       = [
                'listRoom'      => $listRoom,
                'listCategory'  => $listCategory,
                'listBlog'      => $listBlog,
                'listService'   => $listService,
            ];
            return view('frontEnd.index',$viewData);
        }catch (Exception $e)
        {
            abort(500);
        }
    }
}
