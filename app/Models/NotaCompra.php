<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NotaCompra extends Model
{
    use HasFactory;
    protected $table = "nota_compras";
    
    protected $guarded = ['id','created_at','updated_at'];

    public function usuario()
     {
         return $this->belongsTo('App\Models\User', 'nroUsuario');
     }
     public function proveedor()
     {
         return $this->belongsTo('App\Models\Proveedor');
     }
     public function deleteDetalle(NotaCompra $notaCompra){
        $detalles=DB::table('detalle_compras')->where('idNotaCompra',$notaCompra->id)->get();
        foreach ($detalles as $detalle){
            $idDetalle = $detalle -> id;
            $idNotaCompra = $detalle -> idNotaCompra;
            $idProducto = $detalle -> idProducto;
            $cantidad = $detalle -> cantidad;
            $productoStock = DB::table('productos')->where('id',$idProducto)->value('stock');
            $nuevoStock = $productoStock - $cantidad;
            DB::table('productos')->where('id',$idProducto)->update([
                 'stock'=>$nuevoStock
            ]);
        }
     }
}
