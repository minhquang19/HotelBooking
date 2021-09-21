<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;
    protected $primaryKey='id';
    protected $table='booking_details';
    protected $fillable = ['room_id','booking_id','checkin','checkout','amount_date','amount','unit_price','price'];
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
