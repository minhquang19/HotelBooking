<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table='rooms';
    protected $primaryKey='id';
    protected $fillable=['name','description','coverImages','status','visibility','area','category_id'];
    public function category()
    {
        return $this->hasOne(Category::class);
    }
    public function roomPrice()
    {
        return $this->hasOne(roomPrice::class);
    }
    public function roomImage()
    {
        return $this->hasMany(roomImage::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
