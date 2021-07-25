<?php

namespace App\Http\Controllers;

use App\Models\NotaCompra;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class NotaCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notaCompras=NotaCompra::all();
        return view('nota_compra.index', compact('notaCompras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedors = DB::table('proveedors')->get();
        $users = DB::table('users')->get();
        return view('nota_compra.create', ['proveedors' => $proveedors, 'users' => $users]);
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
        $notaCompra=NotaCompra::create([
            'nroProveedor'=>request('nroProveedor'),
            'nroUsuario'=> request('nroUsuario'),
            'monto'=> 0, //request('descripcion'),
            'fecha'=> Carbon::now()->format('m-d-Y'),
            'hora'=> Carbon::now()->format('h:i:s a'),
        ]);
        activity()->useLog('Cliente')->log('Nuevo')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = Producto::all()->last()->id;
        $lastActivity->save();
        return redirect()->route('notasCompras.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NotaCompra  $notaCompra
     * @return \Illuminate\Http\Response
     */
    public function show(NotaCompra $notaCompra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NotaCompra  $notaCompra
     * @return \Illuminate\Http\Response
     */
    public function edit(NotaCompra $notaCompra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NotaCompra  $notaCompra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NotaCompra $notaCompra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NotaCompra  $notaCompra
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotaCompra $notaCompra)
    {
        //
    }
}
