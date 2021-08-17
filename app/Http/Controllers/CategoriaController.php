<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $categorias = Categoria::all();
         return view('categoria.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.create'); //
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
        $categorias=categoria::create([
            'nombre'=>request('nombre'),
        ]);
        activity()->useLog('Categoria')->log('Registrar')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id=Categoria::all()->last()->id;
        $lastActivity->save();
        return redirect()->route('categorias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        return view('categoria.show',compact ('categoria'));//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        return view('categoria.edit',compact('categoria'));//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        date_default_timezone_set("America/La_Paz");
        $categoria->nombre=$request->nombre;
        $categoria->save();

        activity()->useLog('Categoria')->log('Editar')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $categoria->id;
        $lastActivity->save();

        return redirect()->route('categorias.index');//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
}
