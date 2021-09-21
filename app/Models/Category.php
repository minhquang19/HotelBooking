<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table ='categories';
    protected $primaryKey='id';
    protected $fillable=['name','description','name_vi','description_vi','maxPeople'];
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
