<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personale=Personal::all();
        return view('personal.index',compact('personale'));
        
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
        $personale=Personal::create([
            'ci'=>request('ci'),
            'nombre'=>request('nombre'),
            'sexo'=>request('sexo'),
            'telefono'=>request('telefono'),
            'email'=>request('email'),
            'domicilio'=>request('domicilio'),

        ]);
        return redirect()->route('personales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $personal)
    {
        return view('Personal.show',compact ('personal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Personal $personal)
    {
        return view('Personal.edit',compact('personal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personal $personal)
    {
        date_default_timezone_set("America/La_Paz");
        $personal->ci=$request->ci;
        $personal->nombre=$request->nombre;
        $personal->sexo=$request->sexo;
        $personal->telefono=$request->telefono;
        $personal->email=$request->email;
        $personal->domicilio=$request->domicilio;
        $personal->save();
        return redirect()->route('personal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personal $personal)
    {
        $personal->delete();
        return redirect()->route('personal.index');
    }
}
