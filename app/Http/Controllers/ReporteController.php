<?php

namespace App\Http\Controllers;

use App\Models\NotaVenta;
use App\Models\NotaCompra;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReporteController extends Controller
{   
//Privilegios---------------------------------------------------------------------------------------------
    public function __construct()
    {                   
        $this->middleware('can:reporte_date')
             ->only('reporte_fecha',
                    'reporteCompra_fecha',
                    'reporte_fecha',
                    'reporteCompra_resultado'
                    );   
         //bloque todos los metodos de la class
            //usar el permiso ("users.index") para proteger la ruta ("index")
        //$this->middleware('can:users.index')->only('index'); //bloque rutas especidficas
        //$this->middleware('can:users.edit')->only('edit', 'update');

    }
//---------------------------------------------------------------------------------------------

    //reporte de ventas
    public function reporte_fecha(){
        date_default_timezone_set("America/La_Paz");
        $ventas=NotaVenta::whereDate('created_at',Carbon::today())->get();
        $total = $ventas->sum('importe');
        $fecha=Carbon::now();
        $fechaini=$fecha->format('Y-m-d');
        $fechafin=$fecha->format('Y-m-d');
        return view('ReporteVenta.index',compact('ventas','total','fechaini','fechafin'));
    }
    public function reporte_resultado(Request $request){
        date_default_timezone_set("America/La_Paz");
        $fi=$request->fecha_ini.' 00:00:00';
        $ff=$request->fecha_fin.' 23:59:59';
        $ventas=NotaVenta::whereBetween('created_at',[$fi,$ff])->get();
        $total = $ventas->sum('importe');
        $fechaini=$request->fecha_ini;
        $fechafin=$request->fecha_fin;
        return view('ReporteVenta.index',compact('ventas','total','fechaini','fechafin'));
    }
    //reporte de compras
    public function reporteCompra_fecha(){
        date_default_timezone_set("America/La_Paz");
        $compras=NotaCompra::whereDate('created_at',Carbon::today())->get();
        $total = $compras->sum('monto');
        $fecha=Carbon::now();
        $fechaini=$fecha->format('Y-m-d');
        $fechafin=$fecha->format('Y-m-d');
        return view('ReporteCompra.index',compact('compras','total','fechaini','fechafin'));
    }
    public function reporteCompra_resultado(Request $request){
        date_default_timezone_set("America/La_Paz");
        $fi=$request->fecha_ini.' 00:00:00';
        $ff=$request->fecha_fin.' 23:59:59';
        $compras=NotaCompra::whereBetween('created_at',[$fi,$ff])->get();
        $total = $compras->sum('monto');
        $fechaini=$request->fecha_ini;
        $fechafin=$request->fecha_fin;
        return view('ReporteCompra.index',compact('compras','total','fechaini','fechafin'));
    }
}
