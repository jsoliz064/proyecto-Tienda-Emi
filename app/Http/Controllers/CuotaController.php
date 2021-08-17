<?php

namespace App\Http\Controllers;

use App\Models\Cuota;

use App\Models\PlanPago;
use App\Models\ReciboPago;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CuotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $cuotas = Cuota::all();
        return view('cuota.index', compact('cuotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $planes = DB::table('plan_pagos')->where('estado', 'vigente')->get();
        //$planPago = DB::table('plan_pagos')->where('id', 1)->value('monto_Couta');
        //$planPago = DB::table('plan_pagos')->where('id', 1)->get();
        //  return $planes;
       //$planPago = 1;

       $planPago = DB::table('plan_pagos')->find(0);
    //    return $planPago ->monto_Couta;
       return view('cuota.create', compact('planes', 'planPago'));
    }

    public function create2(PlanPago $planPago)
    {
        $planes = DB::table('plan_pagos')->where('estado', 'vigente')->get();
        return view('cuota.create', compact('planes', 'planPago'));        
    }     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->actualizar)
        {
            $planes = DB::table('plan_pagos')->where('estado', 'vigente')->get();
            $id = $request->actualizar;
            $planPago = DB::table('plan_pagos')->find($id);
             return view('cuota.create', compact('planes', 'planPago'));
        }
        $request->validate([
            'plan_id' => 'required', 
        ]);

        //return $request ;
        Cuota::create([
            'plan_id' => $request -> plan_id,
            'monto' =>  $request -> monto,
            'nro_cuota' => ($request -> nro_cuota) ,
            'hora' => date('H:i:s'),
            'fecha' => date('Y/m/d'),
        ]);

        
        $cuotas_pagadas = ($request -> nro_cuota);
        //actualizar plan de pago
//        $planPago = DB::table('plan_pagos')->find($request -> plan_id);
        $planPago = PlanPago::find($request -> plan_id);
        $planPago -> cuotas_pagadas = $cuotas_pagadas;
        $planPago -> saldo =  ($planPago -> saldo) -  ($planPago -> monto_cuota);

        $cantidad_cuotas = $planPago -> cantidad_cuotas;
        if (($cantidad_cuotas) == ($cuotas_pagadas)){
            $planPago -> estado = 'finalizado';
            $planPago -> saldo = 0;
        }
        $planPago->save();


        return redirect()->route('planPagos.show', $planPago);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cuota  $cuota
     * @return \Illuminate\Http\Response
     */
    public function show(Cuota $cuota)
    {
        $recibo_id = DB::table('recibo_pagos')->where('idC', $cuota->id)->value('id');
        $reciboPagos = ReciboPago::find($recibo_id) ;
        //return $reciboPagos;
        return view('cuota.show', compact('cuota', 'reciboPagos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cuota  $cuota
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuota $cuota)
    {
        return view('cuota.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cuota  $cuota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuota $cuota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuota  $cuota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuota $cuota)
    {
        //actualizar plan de pago
        $planPago = PlanPago::find($cuota->plan_id);
        $planPago -> cuotas_pagadas = (($planPago -> cuotas_pagadas) - 1) ;
        $planPago -> saldo =  ($planPago -> saldo) +  ($planPago -> monto_cuota);

        $cantidad_cuotas = $planPago -> cantidad_cuotas;
        if (($cantidad_cuotas) == (($planPago -> cuotas_pagadas)+1)){
            $planPago -> estado = 'vigente';
        }
        $planPago->save();

        $cuota->delete();
        //return redirect()->route('cuotas.index');
        return redirect()->route('planPagos.show', $planPago);
    }

    private function consulta()
    {
        return DB::table('plan_pagos')
                ->whereNotExists(function($query){
                $query -> select(DB::raw(1))
                -> from('cuotas')
                ->whereRaw('plan_pagos.id = cuotas.plan_id');
                })->get();;

    }
}
