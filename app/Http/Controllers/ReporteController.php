<?php

namespace App\Http\Controllers;

use App\Models\NotaVenta;
use App\Models\NotaCompra;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReporteController extends Controller
{   
    //reporte de ventas
    public function reporte_fecha(){
        date_default_timezone_set("America/La_Paz");
        $ventas=NotaVenta::whereDate('created_at',Carbon::today())->get();
        $total = $ventas->sum('importe');
        
        return view('ReporteVenta.index',compact('ventas','total'));
    }
    public function reporte_resultado(Request $request){
        date_default_timezone_set("America/La_Paz");
        $fi=$request->fecha_ini.' 00:00:00';
        $ff=$request->fecha_fin.' 23:59:59';
        $ventas=NotaVenta::whereBetween('created_at',[$fi,$ff])->get();
        $total = $ventas->sum('importe');
        return view('ReporteVenta.index',compact('ventas','total'));
    }
    //reporte de compras
    public function reporteCompra_fecha(){
        date_default_timezone_set("America/La_Paz");
        $compras=NotaCompra::whereDate('created_at',Carbon::today())->get();
        $total = $compras->sum('monto');
        return view('ReporteCompra.index',compact('compras','total'));
    }
    public function reporteCompra_resultado(Request $request){
        date_default_timezone_set("America/La_Paz");
        $fi=$request->fecha_ini.' 00:00:00';
        $ff=$request->fecha_fin.' 23:59:59';
        $compras=NotaCompra::whereBetween('created_at',[$fi,$ff])->get();
        $total = $compras->sum('monto');
        return view('ReporteCompra.index',compact('compras','total'));
    }
}
