<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table='bookings';
    protected $fillable = ['user_id','totalPrice','totalPrice_vi','payment'];
    public function bookingDetail()
    {
        return $this->hasMany(BookingDetail::class);
    }
    public function users()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

}
