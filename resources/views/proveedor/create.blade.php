@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Registrar Proveedor</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('proveedores.store')}}" novalidate >

            @csrf

            <h5>Nombre Completo:</h5>
            <input type="text"  name="nombre" class="focus border-primary  form-control" >
            @error('nombre')
            <p>DEBE INGRESAR BIEN SU NOMBRE</p>
            @enderror

            <h5>Telefono:</h5>
            <input type="text" name="telefono"  class="focus border-primary  form-control" >
            @error('telefono')
                <p>DEBE INGRESAR BIEN SU TELEFONO</p>
            @enderror

            <h5>Direccion:</h5>
            <input type="text" name="direccion"  class="focus border-primary  form-control" >
            @error('direccion')
                <p>DEBE INGRESAR BIEN SU Direccion</p>
            @enderror

            <h5>Email:</h5>
            <input type="text" name="email"  class="focus border-primary  form-control" >
            @error('email')
                <p>DEBE INGRESAR BIEN SU EMAIL</p>
            @enderror
            
            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>

            <a href="{{route('proveedores.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop

@section('css')

@stop

@section('js')

@stop
