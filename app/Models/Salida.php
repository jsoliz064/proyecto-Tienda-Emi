<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;
    //protected $dateFormat = 'U'; //formato de la fecha
    protected $table='salidas';
    //estos campos no se llenaran por asignacion masiva
    protected $guarded = ['id','created_at','updated_at'];


    //relacion muchos a muchos
    public function productos(){
        // return $this->belongsToMany('App\Models\Producto');
        //->withPivot('cantidad')--> especificamos que hay otro atributo en la tabla intermedia
        return $this->belongsToMany(Producto::class)->withPivot('cantidad');
        //return $this->belongsToMany(Producto::class);


    }
}
