<?php


namespace App\Repositories\Admins\Booking;


use App\Models\Booking;
use App\Models\BookingDetail;
use App\Repositories\Admins\BaseAdminRepo;
use Carbon\Carbon;
use LaravelFullCalendar\Facades\Calendar;

class BookingRepo extends BaseAdminRepo implements BookingRepoInterface
{

    public function getModel()
    {
        return Booking::class;
    }
    public function showFullCalendar()
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
        return $calendar;
    }

    public function getListBookingCreated()
    {
        return Booking::orderByDesc("created_at")->get();
    }

    public function getBookingDetail($id)
    {
        return BookingDetail::where('booking_id',$id)->get();
    }


}
