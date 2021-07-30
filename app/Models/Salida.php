<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;

    //relacion muchos a muchos
    public function productos(){
        return $this->belongsToMany('App\Models\Producto');
    }
}
