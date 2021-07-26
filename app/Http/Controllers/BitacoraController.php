<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\DB;

class BitacoraController extends Controller
{
    //solo tienen acceso los admin
    public function __construct()
    {                 
        //bloque todos los metodos de bitacora.index  
        $this->middleware('can:bitacora.index');  //bloque todos los metodos de la class
    }

    public function index()
    {
        // $actividades = Activity::all(); 

        $actividades = DB::table('activity_log')
             ->join('users', 'activity_log.causer_id', '=', 'users.id')->select('activity_log.*', 'users.name')->get();

        // return $actividades;
        return view('Bitacora.index', compact('actividades'));
    }
}
