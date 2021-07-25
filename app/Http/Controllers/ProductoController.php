<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('producto.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=DB::table('categorias')->get();
        return view('producto.create',['categorias'=>$categorias]);
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
        $producto=Producto::create([
            'idCategoria'=>request('idCategoria'),
            'codigo'=>request('codigo'),
            'nombre'=>request('nombre'),
            'precioU'=>request('precioU'),
            'precioM'=>request('precioM'),
            'costoPromedio'=>request('costoPromedio'),
            'descripcion'=>request('descripcion'),
            'stock'=>0,
        ]);

        activity()->useLog('Cliente')->log('Nuevo')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = Producto::all()->last()->id;
        

        activity()->useLog('Producto')->log('Nuevo')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id=Producto::all()->last()->id;
        $lastActivity->save();
        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('producto.show',compact ('producto')); //return view('Cliente.show',compact ('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $categorias=DB::table('categorias')->get();
        return view('producto.edit',compact('producto'),['categorias'=>$categorias]);//return view('Cliente.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto,)
    {
         date_default_timezone_set("America/La_Paz");
        $producto->idCategoria=$request->idCategoria;
        $producto->codigo=$request->codigo;
        $producto->nombre=$request->nombre;
        $producto->precioU=$request->precioU;
        $producto->precioM=$request->precioM;
        $producto->costoPromedio=$request->costoPromedio;
        $producto->descripcion=$request->descripcion;
        $producto->stock=$request->stock;
        $producto->save();
        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        date_default_timezone_set("America/La_Paz");
        $producto->delete();
        activity()->useLog('Producto')->log('Eliminar')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $producto->id;
        $lastActivity->save();

        return redirect()->route('productos.index');
    }
}
