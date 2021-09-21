<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table='services';
    protected $primaryKey='id';
    protected $fillable=['name','description','content','name_vi','description_vi','content_vi','image'];
}
