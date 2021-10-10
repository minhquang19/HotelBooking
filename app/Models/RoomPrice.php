<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomPrice extends Model
{
    use HasFactory;
    protected $table='room_prices';
    protected $primaryKey='id';
    protected $fillable=['room_id','Weekends','Weekly','Weekends_vi','Weekly_vi'];
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
