<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\NotaVenta;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas=Factura::all();
        return view('factura.index',compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
    public function create2(NotaVenta $notaVenta)
    {
        return view('factura.create',compact('notaVenta'));
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
        $factura=Factura::create([
            'notaVenta_id'=>request('notaVenta_id'),
            'numero'=>request('numero'),
            'nit'=>request('nit'),
            'codControl'=>request('codControl'),
            'total'=>request('total'),
        ]);

        activity()->useLog('Factura')->log('Nuevo')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = Factura::all()->last()->id;
        $lastActivity->save();
        return redirect()->route('facturas.show',compact('factura'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(Factura $factura)
    {
        $cliente_id = DB::table('nota_ventas')->where('id',$factura->notaVenta_id)->value('nroCliente');
        $cliente = DB::table('clientes')->where('id',$cliente_id)->value('nombre');
        $tablaDetalles=DB::table('detalle_ventas')->where('notaVenta_id',$factura->notaVenta_id)->get();
        $productos=DB::table('productos')->get();
        return view('factura.show',compact ('factura'),['cliente'=> $cliente,'tablaDetalles'=>$tablaDetalles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(Factura $factura)
    {
        return view('factura.edit',compact('factura'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factura $factura)
    {
        date_default_timezone_set("America/La_Paz");
        $factura->notaVenta_id=$request->notaVenta_id;
        $factura->numero=$request->numero;
        $factura->nit=$request->nit;
        $factura->codControl=$request->codControl;
        $factura->total=$request->total;
        $factura->save();

        activity()->useLog('Factura')->log('Editar')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $factura->id;
        $lastActivity->save();

        return redirect()->route('facturas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Factura $factura)
    {
        $factura->delete();

        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Factura')->log('Eliminar')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $factura->id;
        $lastActivity->save();

        return redirect()->route('facturas.index');
    }
}
