<?php

namespace App\Http\Controllers;

use App\Models\DetalleCompra;
use Illuminate\Http\Request;
use App\Models\NotaCompra;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class DetalleCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(NotaCompra $notaCompra)
    {
        // $productos = DB::table('productos')->get();
        // return view('detalleCompra.create',compact('notaCompra'), ['productos' => $productos]);
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
        $idNotaCompra = request('idNotaCompra');
        $idProducto = request('idProducto');
        $cantidad = request('cantidad');
        $costo = request('costo');
        $detalleCompra=detalleCompra::create([
            'idNotaCompra' => request('idNotaCompra'),
            'idProducto'=> request('idProducto'),
            'cantidad'=> request('cantidad'),
            'costo'=> request('costo'),
            'importe'=> $costo * $cantidad,
        ]);
        $monto=DB::table('detalle_compras')->where('idNotaCompra',$idNotaCompra)->sum('importe');
        DB::table('nota_compras')->where('id',$idNotaCompra)->update([
            'monto'=>$monto
        ]);
        $productoStock = DB::table('productos')->where('id',$idProducto)->value('stock');
        $cantidad=request('cantidad');
        $nuevoStock = $productoStock + $cantidad;
        DB::table('productos')->where('id',$idProducto)->update([
            'stock'=>$nuevoStock
        ]);
        return redirect(route('detalleCompras.show', $idNotaCompra));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetalleCompra  $detalleCompra
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notaCompra=NotaCompra::findOrFail($id);
        $notas=DB::table('detalle_compras')->where('idNotaCompra',$notaCompra->id)->get();
        $productos=DB::table('productos')->get();
        return view('detalleCompra.create',compact('notaCompra'),['productos'=>$productos, 'notas'=>$notas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetalleCompra  $detalleCompra
     * @return \Illuminate\Http\Response
     */
    public function edit(DetalleCompra $detalleCompra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetalleCompra  $detalleCompra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleCompra $detalleCompra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetalleCompra  $detalleCompra
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetalleCompra $detalleCompra)
    {
        //
    }
}
