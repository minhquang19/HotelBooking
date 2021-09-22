<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roomPrice extends Model
{
    use HasFactory;
    protected $table='room_prices';
    protected $primaryKey='id';
    protected $fillable=['room_id','Weekends','Weekly','Moonly','Nightly'];
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
