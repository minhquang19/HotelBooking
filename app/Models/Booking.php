<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table='bookings';
    protected $fillable = ['user_id','totalPrice'];
    public function bookingDetail()
    {
        return $this->hasMany(BookingDetail::class);
    }
}
