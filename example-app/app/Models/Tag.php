<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table='tags';
    protected $primaryKey='id';
    protected $fillable=['name'];
    public function Rooms()
    {
        return $this->belongsToMany(Room::class);
    }



}
