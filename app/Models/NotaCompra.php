<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaCompra extends Model
{
    use HasFactory;
    protected $table='nota_compras';
    protected $guarded = ['id','created_at','updated_at'];

    // public function usuario()
    //  {
    //      return $this->belongsTo('App\Model\User');
    //  }
    //  public function proveedor()
    //  {
    //      return $this->belongsTo('App\Model\Proveedor');
    //  }
}