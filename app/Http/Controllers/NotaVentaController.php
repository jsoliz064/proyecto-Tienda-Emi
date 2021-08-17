<?php

namespace App\Http\Controllers;

use App\Models\NotaVenta;
use App\Models\DetalleVenta;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;

class NotaVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notaVentas=NotaVenta::all();
        return view('notaVenta.index', compact('notaVentas'));//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

   

    public function create()
    {
        $clientes = DB::table('clientes')->get();
        $productos = DB::table('productos')->get();
        return view('notaVenta.create',['clientes'=> $clientes,'productos' => $productos]);//
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
        $notaVenta=NotaVenta::create([
            'nroCliente'=>request('nroCliente'),
            'importe'=>0,
            'fecha' => date('Y/m/d'),
            'hora' => date('H:i')
        ]);

        activity()->useLog('NotaVenta')->log('Nuevo')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = NotaVenta::all()->last()->id;
        $lastActivity->save();
        return redirect()->route('detalleVentas.show',$notaVenta);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\notaVenta  $notaVenta
     * @return \Illuminate\Http\Response
     */
    public function show(notaVenta $notaVenta)
    {
        $detalleVenta= DB::table('detalle_ventas')->where('notaVenta_id',$notaVenta->id)->get();
        //$detalleVenta = DB::table('detalle_ventas')->find(;
        return view('notaVenta.show',compact ('detalleVenta'));
        // foreach ($id_detalleVenta as $detalle) {
        //     echo ($detalle->cantidad);
        // }
        // return $id_detalleVenta;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\notaVenta  $notaVenta
     * @return \Illuminate\Http\Response
     */
    public function edit(notaVenta $notaVenta)
    {
        $clientes = DB::table('clientes')->get();
        return view('notaVenta.edit',compact('notaVenta'),['clientes'=>$clientes]);//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\notaVenta  $notaVenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, notaVenta $notaVenta)
    {
        date_default_timezone_set("America/La_Paz");
        $notaVenta->nroCliente=$request->nroCliente;
        $notaVenta->importe=$request->importe;
        $notaVenta->save();

        activity()->useLog('NotaVenta')->log('Editar')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $notaVenta->id;
        $lastActivity->save();
        return redirect()->route('notaVentas.index');//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\notaVenta  $notaVenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(notaVenta $notaVenta)
    {
        $notaVenta->delete();
        activity()->useLog('NotaVenta')->log('Eliminar')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $notaVenta->id;
        $lastActivity->save();
        return redirect()->route('notaVentas.index');//
    }
}
