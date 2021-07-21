<?php

namespace App\Http\Controllers;

use App\Models\NotaCompra;
use Illuminate\Http\Request;

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
        return view('notaCompra.index', compact('notaCompras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
