<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomImage extends Model
{
    use HasFactory;
    protected $table='room_images';
    protected $primaryKey='id';
    protected $fillable=['room_id','name'];
    public function Room(){
        return $this->belongsTo(Room::class);
    }
}
