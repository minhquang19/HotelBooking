<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingDetail;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use LaravelFullCalendar\Facades\Calendar;

class BookingController extends Controller
{

    public function index()
    {
        $events = [];
        $data = BookingDetail::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->room_name,
                    true,
                    Carbon::parse($value->checkin),
                    Carbon::parse($value->checkout)->addDay(),
                    null,
                    [
                        'color' => '#f05050',
                        'url'   => route('admin.booking.show',$value->booking_id)

                    ]
                );
            }
        }
        $calendar   = Calendar::addEvents($events);
        $list       = Booking::all();
        $viewData = [
            'calendar' => $calendar,
            'list' => $list,
        ];
        return view('backEnd.booking',$viewData);
    }

    public function show($id)
    {
        $booking       =  Booking::find($id);
        $bookingdetail = BookingDetail::where('booking_id',$id)->get();
        $viewData = [
            'bookingdetail' => $bookingdetail,
            'booking' => $booking,
        ];
        return view('backEnd.bookingdetail',$viewData);
    }


}
