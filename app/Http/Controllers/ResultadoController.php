<?php

namespace App\Http\Controllers;

use App\Models\NotaVenta;
use App\Models\Resultado;
use App\Models\Salida;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ResultadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultados = DB::table('resultados')->get();
        return view('resultado.index', compact('resultados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resultado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        if($request->actualizar){
            //$salidas = NotaVenta::where('fecha', '>=', $request->fechaInicial)->where('fecha', '<=', $request->fechaFinal)->get();        

           // return view('resultado.show', compact('salidas'));
             return view('resultado.show');
            //return "hola";

        }
         $salidas = NotaVenta::where('fecha', '>=', $request->fechaInicial)->where('fecha', '<=', $request->fechaFinal)->get();        
        // Resultado::create([
        //     'nombre'=> $request->nombre,
        //     'fecha' => date('Y/m/d'),
        //     'hora' => date('H:i:s'),
        // ]);
        
        // $ventas = DB::table('nota_compras')->get();
        // $compras = DB::table('nota_ventas')->get();
        // //, compact('salidas', 'compras', 'ventas')
        return $salidas;
        // return "darwin";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Resultado $resultado)
    {
        return view('resultado.show' );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Resultado $resultado)
    {
        return view('resultado.edit');
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resultado $resultado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resultado $resultado)
    {
        $resultado->delete();

        return redirect()->route('resultados.index');
    }

    
    
    

    
    
}
