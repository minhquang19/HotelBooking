<?php

namespace App\Http\Controllers\Admin;

use App\HelperClass\Date;
use App\Http\Controllers\Controller;
use App\Repositories\Admins\Admin\AdminRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class HomeController extends Controller
{
    protected $adminRepo;
    public function __construct(AdminRepo $adminRepo)
    {
        $this->adminRepo = $adminRepo;
    }

    public function index()
    {
        $roomAmount     = $this->adminRepo->countRoom();
        $bookingAmount  = $this->adminRepo->countBooking();
        $userAmount     = $this->adminRepo->countUser();
        $blogAmount     = $this->adminRepo->countBlog();
        $listBooking    = $this->adminRepo->getListBookingDESC();
        $Revenue        = $this->adminRepo->getRevenueInDay();
        $listDayOfMonth = Date::getListDayInMonth();
        $arrRevenue     = $this->adminRepo->getStatisticalByDay($listDayOfMonth);
        $viewData =[
                'roomAmount'       => $roomAmount,
                'bookingAmount'    => $bookingAmount,
                'userAmount'       => $userAmount,
                'blogAmount'       => $blogAmount,
                'listBooking'      => $listBooking,
                'Revenue'          => $Revenue,
                'listDayOfMonth'   => json_encode($listDayOfMonth),
                'arrRevenue'       => json_encode($arrRevenue),
        ];
        return view('Admin.Index',$viewData);
    }

    public function store(Request $request)
    {
        if(!Auth::guard('admin')->attempt($request->only('email','password'),$request->filled('remember')))
        {
            throw ValidationException::withMessages([
                'email'=> 'Invalid email or password'
            ]);
        }
            return redirect()->intended('/admin');
    }

    public function destroy()
    {
        Auth::guard('admin')->logout();
        return redirect()->intended('/admin/login');
    }

    public function createAdminAccount()
    {
        return $this->adminRepo->createAccountAdminDefault();
    }
}
