<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table='rooms';
    protected $primaryKey='id';
    protected $fillable=['name','description','name_vi','description_vi','coverImages','status','visibility','area','category_id','bath','bad'];
    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function roomPrice()
    {
        return $this->hasOne(RoomPrice::class);
    }
    public function roomImage()
    {
        return $this->hasMany(RoomImage::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
