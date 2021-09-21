<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagRoom extends Model
{
    use HasFactory;
    protected $table='tag_rooms';
    protected $primaryKey='id';
    protected $fillable=['tag_id','room_id'];
    public function Rooms()
    {
        return $this->belongsToMany(Room::class);
    }
}
