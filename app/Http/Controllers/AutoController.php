<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\DB;

class AutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autos= Auto::all();
        return view('auto.index',compact('autos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas=DB::table('marcas')->get();
        
        return view('auto.create',['marcas'=>$marcas]);
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
        $autos=Auto::create([
        'modelo'=>request('modelo'),
        'idMarca'=>request('idMarca'),
        'descripcion'=>request('descripcion'),
        'modelo'=>request('modelo'),
        'año'=>request('año'),
        ]  );

        activity()->useLog('Auto')->log('Nuevo')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id=Auto::all()->last()->id;
        $lastActivity->save();
        return redirect()->route('autos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auto  $auto
     * @return \Illuminate\Http\Response
     */
    public function show(Auto $auto)
    {
        return view('auto.show',compact ('auto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auto  $auto
     * @return \Illuminate\Http\Response
     */
    public function edit(Auto $auto)
    {
        $marcas=DB::table('marcas')->get();
        return view('auto.edit',compact('auto'),['marcas'=>$marcas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Auto  $auto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auto $auto)
    {
        date_default_timezone_set("America/La_Paz");
        $auto->modelo=$request->modelo;
        $auto->idMarca=$request->idMarca;
        $auto->descripcion=$request->descripcion;
        $auto->año=$request->año;
        
        $auto->save();

        activity()->useLog('Auto')->log('Editar')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $auto->id;
        $lastActivity->save();
        return redirect()->route('autos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auto  $auto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auto $auto)
    {
        $auto->delete();
        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Auto')->log('Eliminar')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $auto->id;
        $lastActivity->save();
        return redirect()->route('autos.index');

        
    }
}
