@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Editar Proveedor</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('proveedores.update',$proveedor)}}" novalidate >

            @csrf
            @method('PATCH')

            <h5>Nombre Completo:</h5>
            <input type="text"  name="nombre" value="{{$proveedor->nombre}}" class="focus border-primary  form-control" >

            @error('nombre')
            <p>DEBE INGRESAR BIEN SU NOMBRE</p>
            @enderror

         <div class="form-group">
            <h5>Sexo:</h5>
            <select name="sexo" id="select-sexo"  class="focus border-primary  form-control">
                <option value="{{$proveedor->sexo}}">{{$proveedor->sexo}}</option>
                <option value="F">Femenino</option>
                <option value="M">Masculino</option>
            </select>

            @error('sexo')
                <p>DEBE INGRESAR BIEN SU SEXO</p>
            @enderror
         </div>

            <h5>Telefono:</h5>
            <input type="text" name="telefono" value="{{$cliente->telefono}}"  class="focus border-primary  form-control" >


            @error('telefono')
                <p>DEBE INGRESAR BIEN SU TELEFONO</p>
            @enderror

            <h5>Email:</h5>
            <input type="text" name="email" value="{{$cliente->email}}" class="focus border-primary  form-control" >


            @error('email')
                <p>DEBE INGRESAR BIEN SU EMAIL</p>
            @enderror
            
            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Guardar</button>
            <a href="{{route('clientes.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop