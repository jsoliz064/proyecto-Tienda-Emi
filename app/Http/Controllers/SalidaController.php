<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Salida;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalidaController extends Controller
{
     public function index()
    {
        $salidas = Salida::all();
        return view('salida.index', compact('salidas'));
    }
    //---------------------------------------------------------------------------------------------------------
    public function create()
    {
        $salida = Salida::create([
            'fecha' => date('Y/m/d'),
            'hora' => date('H:i:s'),
        ]);
        //luego de crear la NOta de Salida-->mandamos a editar 
        return redirect()->route('salidas.edit', $salida);
    }
    //---------------------------------------------------------------------------------------------------------
    public function edit(Salida $salida)
    {   
        $productos = Producto::all();
        $detalleSalidas = $salida->productos()->get();
        return view('Salida.edit', compact('salida', 'productos', 'detalleSalidas'));
    }
    //---------------------------------------------------------------------------------------------------------
    public function update(Request $request, Salida  $salida)
    {   
        $info="hola";
        if ($request->productoId) {//eliminar
             $producto = $salida->productos()->find($request->productoId);
             $cantidad = $producto->pivot->cantidad; //cantidad tabla intermedia
             $producto->stock = $producto->stock + $cantidad;
             $producto->save();
             $salida->productos()->detach( $request->productoId );//elimina registro intermedio

        } else {//agregar
            $detalleSalida = $salida->productos()->find($request->idProducto); 
            if (!$detalleSalida){
                $producto = Producto::find($request->idProducto);
                if (($producto)&&($request->idProducto) &&($request->cantidad > 0) && 
                    ($request->cantidad <= $producto->stock) ) {
                    $salida->productos()->syncWithoutDetaching([$request->idProducto =>['cantidad'=>$request->cantidad]]);
                    $producto->stock = $producto->stock - $request->cantidad;
                    $producto->save();
                } 
            // if (($request->idProducto) && ($request->cantidad > 0) ) { 
               
               
               // $salida->productos()->sync([$request->idProducto =>['cantidad'=>$request->cantidad]]);
              //    $salida->productos()->attach($request->idProducto, ['cantidad'=>$request->cantidad]);
           }
        }
        return redirect()->route('salidas.edit', $salida); 
    }
    //---------------------------------------------------------------------------------------------------------
    public function destroy( Salida $salida)
    {
        $salida->delete();
        return redirect()->route('salidas.index');
    }

}
