<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Activitylog\Models\Activity;



class UserController extends Controller
{
    //solo tienen acceso los admin
    public function __construct()
    {                   
        $this->middleware('can:users.index'); //bloque todos los metodos de la class
            //usar el permiso ("users.index") para proteger la ruta ("index")
        //$this->middleware('can:users.index')->only('index'); //bloque rutas especidficas
        //$this->middleware('can:users.edit')->only('edit', 'update');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
        $users=User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            //'password' =>$request['password'], no oculta contraseña
        ]);

        activity()->useLog('Usuario')->log('Crear')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $users->id;
        $lastActivity->save();
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('user.edit',compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Usuario')->log('Editar')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $user->id;
        $lastActivity->save();
        return redirect()->route('users.edit', $user)->with('info', 'se asígno los roles correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Usuario')->log('Eliminar')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $user->id;
        $lastActivity->save();
        return redirect()->route('users.index');
    }
}
