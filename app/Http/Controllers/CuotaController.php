<?php

namespace App\Http\Controllers;

use App\Models\Cuota;
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
        $planes = DB::table('plan_pagos')
                ->whereNotExists(function($query){
                $query -> select(DB::raw(1))
                  -> from('cuotas')
                  ->whereRaw('plan_pagos.id = cuotas.plan_id');
       })->get();;
        return view('cuota.create', compact('planes'));
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
            // $planes = DB::table('plan_pagos')
            //     ->whereNotExists(function($query){
            //     $query -> select(DB::raw(1))
            //       -> from('cuotas')
            //       ->whereRaw('plan_pagos.id = cuotas.plan_id');
            //   })->get();;
            return 'darwin'; 
        }

        return 'nada';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cuota  $cuota
     * @return \Illuminate\Http\Response
     */
    public function show(Cuota $cuota)
    {
        return view('cuota.show');
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
        //
    }
}
