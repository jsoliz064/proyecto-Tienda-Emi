<?php

namespace App\Http\Controllers;

use App\Models\ReciboPago;
use App\Models\Cuota;
use App\Models\PlanPago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReciboPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reciboPagos = ReciboPago::all();
        return view('reciboPago.index', compact('reciboPagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reciboPago.create');
    }

    public function create2(Cuota $cuota)
    {
        return view('reciboPago.create', compact('cuota'));        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        ReciboPago::create([
            'plan_idC' => $request -> plan_idC,
            'idC' =>  $request -> idC,
            'nombre' => $request -> nombre ,
            'hora' => date('H:i:s'),
            'fecha' => date('Y/m/d'),
        ]);

        $planPago = PlanPago::find($request -> plan_idC);
        return redirect()->route('planPagos.show', $planPago);

        // return redirect()->route('reciboPagos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReciboPago  $reciboPago
     * @return \Illuminate\Http\Response
     */
    public function show(ReciboPago $reciboPago)
    {
        // $planPago = DB::table('plan_pagos')->where('id',$reciboPago->plan_idC)->value('nota_venta_id');
        $planPago = DB::table('plan_pagos')->find($reciboPago->plan_idC);

        // $idFactura =  DB::table('facturas')->where('notaVenta_id',$planPago)->value('id');
        // $factura =  DB::table('facturas')->find($idFactura);     
        // return $reciboPago;
        $notaVenta = DB::table('nota_ventas')->find($planPago->nota_venta_id);
        $tablaDetalles=DB::table('detalle_ventas')->where('notaVenta_id',$notaVenta->id)->get();
  
        return view('reciboPago.show', compact ('notaVenta', 'tablaDetalles', 'reciboPago', 'planPago'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReciboPago  $reciboPago
     * @return \Illuminate\Http\Response
     */
    public function edit(ReciboPago $reciboPago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReciboPago  $reciboPago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReciboPago $reciboPago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReciboPago  $reciboPago
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReciboPago $reciboPago)
    {
        //
    }
}
