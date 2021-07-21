@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Registrar Detalle Compra</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{url('/compras')}}" novalidate >

            @csrf
            <h5>Fecha:</h5>
            <input type="datetime-local"  name="fecha" class="focus border-primary  form-control" >

            @error('fecha')
            <p>DEBE INGRESAR LA FECHA</p>
            @enderror


            <h5>Usuario:</h5>
            <select name="usuarioId" id="select-muser" class="form-control" onchange="habilitar()" >
                <option value="nulo">Seleccione un usuario</option>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">
                            {{$user->name}}
                        </option>
                    @endforeach
            </select>
            @error('usuarioId')
                <p>DEBE INGRESAR BIEN EL USARIO</p>
            @enderror
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
            <a href="{{url('/compras/')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop


