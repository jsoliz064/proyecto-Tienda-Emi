<?php

namespace App\Http\Controllers;

use App\Models\NotaCompra;
use App\Models\detalleCompra;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;

class NotaCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notaCompras=NotaCompra::all();
        return view('notaCompra.index', compact('notaCompras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedors = DB::table('proveedors')->get();
        $users = DB::table('users')->get();
        $productos = DB::table('productos')->get();
        return view('notaCompra.create', ['proveedors' => $proveedors, 'users' => $users, 'productos' => $productos]);
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
        $notaCompra=NotaCompra::create([
            'nroProveedor'=>request('nroProveedor'),
            'nroUsuario'=> request('nroUsuario'),
            'monto'=> 0, //request('descripcion'),
            'fecha'=> Carbon::now()->format('Y-m-d'),
            'hora'=> Carbon::now()->format('H:i:s'),
        ]);
        activity()->useLog('NotaCompra')->log('Nuevo')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = NotaCompra::all()->last()->id;
        $lastActivity->save();
        
        return redirect(route('detalleCompras.show', $notaCompra));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NotaCompra  $notaCompra
     * @return \Illuminate\Http\Response
     */
    public function show(NotaCompra $notaCompra)
    {
        return view('notaCompra.show',compact ('notaCompra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NotaCompra  $notaCompra
     * @return \Illuminate\Http\Response
     */
    public function edit(NotaCompra $notaCompra)
    {
        $proveedors = DB::table('proveedors')->get();
        $users = DB::table('users')->get();
        $productos = DB::table('productos')->get();
        return view('notaCompra.create', ['proveedors' => $proveedors, 'users' => $users, 'productos' => $productos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NotaCompra  $notaCompra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NotaCompra $notaCompra)
    {
        return redirect()->route('notaCompra.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NotaCompra  $notaCompra
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotaCompra $notaCompra)
    {
        date_default_timezone_set("America/La_Paz");
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
        $notaCompra->delete();
        return redirect()->route('notaCompras.index');
    }
}
