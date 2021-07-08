@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Editar Proveedor</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('proveedores.update',$proveedore)}}" novalidate >

            @csrf
            @method('PATCH')

            <h5>Nombre Completo:</h5>
            <input type="text"  name="nombre" value="{{$proveedore->nombre}}" class="focus border-primary  form-control" >

            @error('nombre')
            <p>DEBE INGRESAR BIEN SU NOMBRE</p>
            @enderror

            <h5>Telefono:</h5>
            <input type="text" name="telefono" value="{{$proveedore->telefono}}"  class="focus border-primary  form-control" >


            @error('telefono')
                <p>DEBE INGRESAR BIEN SU TELEFONO</p>
            @enderror
            
            <h5>Direccion:</h5>
            <input type="text" name="direccion" value="{{$proveedore->direccion}}" class="focus border-primary  form-control" >


            @error('direccion')
                <p>DEBE INGRESAR BIEN SU DIRECCION</p>
            @enderror 

            <h5>Email:</h5>
            <input type="text" name="email" value="{{$proveedore->email}}" class="focus border-primary  form-control" >


            @error('email')
                <p>DEBE INGRESAR BIEN SU EMAIL</p>
            @enderror
            
            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Guardar</button>
            <a href="{{route('proveedores.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop