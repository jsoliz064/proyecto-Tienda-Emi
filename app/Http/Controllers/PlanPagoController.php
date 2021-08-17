<?php

namespace App\Http\Controllers;

use App\Models\PlanPago;
use Illuminate\Http\Request;
use App\Models\NotaVenta;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;

class PlanPagoController extends Controller
{
     //solo tienen acceso los admin
     public function __construct()
     {                   
         $this->middleware('can:planPagos.index'); //bloque todos los metodos de la class
 
     }
//--------------------------------------------------------------------------------------------------
    public function index()
    {
        $planes = PlanPago::all();
        return view('PlanPago.index', compact('planes'));
    }
    //---------------------------------------------------------------------------------------------------------

    public function create()
    {
        return view('PlanPago.create');
    }
    //---------------------------------------------------------------------------------------------------------
    
    public function create2(NotaVenta $notaVenta)
    {
        return view('PlanPago.create', compact('notaVenta'));        
    } 
    //---------------------------------------------------------------------------------------------------------

    public function store(Request $request)
    {
        $request->validate([
            'cantidad' => 'required',
            'nota_venta_id' => 'required  | unique:plan_pagos', 
        ]);

        $venta_id = $request->nota_venta_id; 
        $cantidad = $request->cantidad;
        $saldo = $request->saldo;
        $cuota = $saldo / $cantidad;

        $plan = PlanPago::create([
            'nota_venta_id' => $venta_id,
            'cantidad_cuotas' =>  $cantidad,
            'cuotas_pagadas' => 0,
            'monto_cuota' => $cuota,
            'total' => $saldo,
            'saldo' => $saldo,
            'estado' => 'vigente',
        ]);

        activity()->useLog('PlanPago')->log('Crear')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $plan->id;
        $lastActivity->save();

        return redirect()->route('planPagos.index');
    }
    //---------------------------------------------------------------------------------------------------------


    public function show(PlanPago $planPago)
    {
        $cuotas = DB::table('cuotas')->where('plan_id', $planPago->id)->get();
        return view('PlanPago.show', compact('planPago', 'cuotas'));
    }
    // public function show($name){

    //     switch ($name){
    //       case 'foo':  $this -> foo();  break;
    //       case 'bar':  $this ->bar();   break; 
    //       default: abort(404,'bad request');   break;
    //     }
       
    //    }
       
    // public function foo()
    // {
    // }
    // public function bar()
    // {

    // }
    //---------------------------------------------------------------------------------------------------------


    public function edit(PlanPago $planPago)
    {
        return view('PlanPago.show');
    }
    //---------------------------------------------------------------------------------------------------------

    public function update(Request $request, PlanPago $planPago)
    {
        //
    }
    //---------------------------------------------------------------------------------------------------------
    public function destroy(PlanPago $planPago)
    {
        $planPago->delete();

        activity()->useLog('PlanPago')->log('Eliminar')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $planPago->id;
        $lastActivity->save();
        return redirect()->route('planPagos.index');
    }
}
