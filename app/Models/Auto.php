<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    use HasFactory;
    protected $table="autos";
    protected $guarded=['id','created_at','updated_at'];

    public function productos(){

    return $this->belongsToMany('App\Models\Producto') ;   
    }
}
