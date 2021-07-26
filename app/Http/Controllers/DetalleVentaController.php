<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Models\NotaVenta;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetalleVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* $detalleVentas=DetalleVenta::all();
        return view('detalleVenta.index', compact('detalleVentas'));//
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      /*  $cliente = DB::table('clientes')->get();
        //$users = DB::table('users')->get();
        $productos = DB::table('productos')->get();
        return view('notaCompra.create', ['proveedors' => $proveedors, 'users' => $users, 'productos' => $productos]);
        */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set("America/La_Paz");
        $notaVenta_id = request('notaVenta_id');
        $producto = DB::table('productos')->where('id',request('producto_id'))->value('precioU');
        
        $detalleVenta=DetalleVenta::create([
            'notaVenta_id'=>NotaVenta::all()->last()->id,
            'producto_id'=>request('producto_id'),
            'precio'=>$producto,
            'cantidad'=>request('cantidad'),
            'importe'=>$producto*request('cantidad'),
        ]);

        $importe=DB::table('detalle_ventas')->where('notaVenta_id',$notaVenta_id)->sum('importe');
        DB::table('nota_ventas')->where('id',$notaVenta_id)->update([
            'importe'=>$importe
        ]);

        $productoStock = DB::table('productos')->where('id',request('producto_id'))->value('stock');
        $cantidad=request('cantidad');
        $nuevoStock = $productoStock - $cantidad;
        DB::table('productos')->where('id',request('producto_id'))->update([
            'stock'=>$nuevoStock
        ]);
        return redirect()->route('detalleVentas.show',$notaVenta_id);
    }

 /*    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetalleVenta  $detalleVenta
     * @return \Illuminate\Http\Response
     */ 
    public function show($id)
    {
        $notaVenta=NotaVenta::findOrFail($id);
        $notas=DB::table('detalle_ventas')->where('notaVenta_id',$notaVenta->id)->get();
        $productos=DB::table('productos')->get();
        return view('detalleVenta.create',compact('notaVenta'),['productos'=>$productos, 'notas'=>$notas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetalleVenta  $detalleVenta
     * @return \Illuminate\Http\Response
     */
    public function edit(DetalleVenta $detalleVenta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetalleVenta  $detalleVenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleVenta $detalleVenta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetalleVenta  $detalleVenta
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        date_default_timezone_set("America/La_Paz");
        $idNotaVenta = DB::table('detalle_ventas')->where('id',$id)->value('notaVenta_id');
        $idProducto = DB::table('detalle_ventas')->where('id',$id)->value('producto_id');
        $productoStock = DB::table('productos')->where('id',$idProducto)->value('stock');
        $cantidad = DB::table('detalle_ventas')->where('id',$id)->value('cantidad');
        
        $nuevoStock = $productoStock + $cantidad;
        DB::table('productos')->where('id',$idProducto)->update([
            'stock'=>$nuevoStock
        ]);
        DetalleVenta::destroy($id);

        $importe = DB::table('detalle_ventas')->where('notaVenta_id',$idNotaVenta)->sum('importe');
        DB::table('nota_ventas')->where('id',$idNotaVenta)->update([
            'importe'=>$importe
        ]);
        
        return redirect(route('detalleVentas.show', $idNotaVenta));
    }
}
