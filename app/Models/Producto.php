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
        // return $this->belongsToMany('App\Models\Salida');  //metodo 1 relacion
        //->withPivot('cantidad')--> especificamos que hay otro atributo en la tabla intermedia
        return $this->belongsToMany(Producto::class)->withPivot('cantidad'); //metodo 2 relacion
        //return $this->belongsToMany(Producto::class); //metodo 2 relacion sin atributos extras


    }
    public function autos(){

        return $this->belongsToMany('App\Models\Auto') ;  
    }
  
}
