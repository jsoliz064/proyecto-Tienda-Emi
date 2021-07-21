@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Editar Compra</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{url('/compras/'.$compra->id)}}" novalidate >

            @csrf
            @method('PATCH')
            <h5>FECHA:</h5>
            <input type="datetime-local"  name="fecha" value="{{$compra->fecha}}" class="focus border-primary  form-control" >

            @error('fecha')
            <p>DEBE INGRESAR BIEN LA FECHA</p>
            @enderror


            <h5>Usuario:</h5>
            <select name="usuarioId" id="select-user" class="form-control" onchange="habilitar()" >
                <option value="{{$compra->usuarioId}}">{{DB::table('users')->where('id',$compra->usuarioId)->value('name')}}</option>
                    @foreach ($users as $user)
                    @if($compra->usuarioId!=$user->id)
                        <option value="{{$user->id}}">
                            {{$user->name}}
                        </option>
                    @endif
                    @endforeach
            </select>
            @error('usuarioId')
                <p>DEBE INGRESAR BIEN EL USARIO</p>
            @enderror


            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Guardar</button>
            <a href="{{url('/compras/')}}"class="btn btn-warning text-white btn-sm ">Volver</a>
        </form>

    </div>
</div>
@stop


