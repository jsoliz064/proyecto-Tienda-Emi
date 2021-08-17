<?php

namespace App\Http\Controllers;

use Spatie\Activitylog\Models\Activity;
use App\Models\Compatibilidad;
use App\Models\Auto;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompatibilidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* $compatibilidad= Compatibilidad::all();
        return view('compatibilidad.index',compact('compatibilidads'));*/
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function create( )
    {
          $autos=DB::table('autos')->get();
         $productos=DB::table('productos')->get();
         $compatibilidades=DB::table('compatibilidads')->get();
        return view('compatibilidad.create',['autos'=>$autos],['productos'=>$productos],
        ['compatibilidades'=>$compatibilidades],);
        

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
        $idAuto = request('idAuto');
        $idProducto = request('idProducto');
        
        $compatibilidad=Compatibilidad::create([
            'idAuto' => Auto::all()->last()->id,
            'idProducto'=> request('idProducto'),
            'detalle' => request('detalle'),
            
        ]);
      
        return redirect(route('autos.index', $idAuto));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compatibilidad  $compatibilidad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $autos=Auto::findOrFail($id);
        $compatibilidades=DB::table('compatibilidads')->where('idAuto',$autos->id)->get();
        $productos=DB::table('productos')->get();
        return view('compatibilidad.show',compact('autos'),['compatibilidads'=>$compatibilidades, 'productos'=>$productos, 'autos'=>$autos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compatibilidad  $compatibilidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Compatibilidad $compatibilidade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compatibilidad  $compatibilidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compatibilidad $compatibilidade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compatibilidad  $compatibilidad
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $idAuto = DB::table('compatibilidads')->where('id',$id)->value('idAuto');
        Compatibilidad::destroy($id);
        return redirect()->route('compatibilidades.show',$idAuto);

    }
}
