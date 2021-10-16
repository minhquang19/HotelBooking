<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Repositories\Admins\Booking\BookingRepo;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use LaravelFullCalendar\Facades\Calendar;

class BookingController extends Controller
{
    protected $bookingRepo;

    public function __construct(BookingRepo $bookingRepo)
    {
        $this->bookingRepo = $bookingRepo;
    }

    public function index()
    {
        $calendar   = $this->bookingRepo->showFullCalendar();
        $listBooked = $this->bookingRepo->getListBookingCreated();
        $viewData   = [
            'calendar'   => $calendar,
            'listBooked' => $listBooked,
        ];
        return view('Admin.Booking',$viewData);
    }

    public function show($id)
    {
        $booking        =  $this->bookingRepo->find($id);
        $bookingdetail  =  $this->bookingRepo->getBookingDetail($id);
        $viewData       = [
            'bookingdetail' => $bookingdetail,
            'booking'       => $booking,
        ];
        return view('Admin.BookingDetail',$viewData);
    }


}
