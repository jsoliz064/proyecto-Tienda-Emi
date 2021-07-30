<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table="productos";
    protected $guarded=['id','created_at','updated_at'];

    public function categoria(){
        return $this->belongsTo('App\Models\Categoria', 'idCategoria');
    }
    //relacion muchos a muchos
    public function salidas(){
        return $this->belongsToMany('App\Models\Salida');
    }
}
