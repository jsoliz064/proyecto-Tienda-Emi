<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personales=Personal::all();
        return view('personal.index',compact('personales'));
        
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personal.create');
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
        $personal=Personal::create([
            'ci'=>request('ci'),
            'nombre'=>request('nombre'),
            'sexo'=>request('sexo'),
            'telefono'=>request('telefono'),
            'email'=>request('email'),
            'domicilio'=>request('domicilio'),

        ]);
        activity()->useLog('Personal')->log('Nuevo')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id=Personal::all()->last()->id;
        $lastActivity->save();
        

        return redirect()->route('personales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $personale)
    {
        return view('personal.show',compact ('personale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Personal $personale)
    {
        return view('Personal.edit',compact('personale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personal $personale)
    {
        date_default_timezone_set("America/La_Paz");
        $personale->ci=$request->ci;
        $personale->nombre=$request->nombre;
        $personale->sexo=$request->sexo;
        $personale->telefono=$request->telefono;
        $personale->email=$request->email;
        $personale->domicilio=$request->domicilio;
        $personale->save();

        activity()->useLog('Personal')->log('Editar')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $personale->id;
        $lastActivity->save();
       
        return redirect()->route('personales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personal $personale)
    {
        $personale->delete();
        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Personal')->log('Eliminar')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $personale->id;
        $lastActivity->save();
    

        return redirect()->route('personales.index');
    }
}
