<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::all();
        return view('marca.index',compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marca.create');
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
        $marca=Marca::create([
            'descripcion'=>request("descripcion"),
        ]);
        activity()->useLog('Marca')->log('Nuevo')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id=Marca::all()->last()->id;
        $lastActivity->save();
        return redirect()->route('marcas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
        return view('marca.show',compact ('marca'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit(Marca $marca)
    {
        return view('marca.edit',compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marca $marca)
    {
        date_default_timezone_set("America/La_Paz");
        $marca->descripcion=$request->descripcion;
        
        $marca->save();

        activity()->useLog('Marca')->log('Editar')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $marca->id;
        $lastActivity->save();
        return redirect()->route('marcas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        $marca->delete();
        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Marca')->log('Eliminar')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $marca->id;
        $lastActivity->save();
        return redirect()->route('marcas.index');
    }
}
