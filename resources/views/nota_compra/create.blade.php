@extends('adminlte::page')

@section('title', 'Compra')

@section('content_header')
    <h1>Registrar Nota de Compra</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{url('nota_compras.store')}}" novalidate >

            @csrf

            <h5>Proveedor:</h5>
            <select name = "nroProveedor" id="nroProveedor" class="form-control" onchange="habilitar()" >
                <option value="nulo">Seleccione una Proveedor</option>
                    @foreach ($proveedors as $proveedor)
                        <option value="{{$proveedor->id}}">
                            {{$proveedor->nombre}}
                        </option>
                    @endforeach
            </select>

            @error('idCategoria')
            <p>DEBE INGRESAR EL PROVEEDOR</p>
            @enderror

            <h5>:</h5>
                <select name="nroUsuario" id="nroUsuario" class="form-control" onchange="habilitar()" >
                <option value="nulo">Seleccione un usuario</option>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">
                            {{$user->nombre}}
                        </option>
                    @endforeach
            </select>
            @error('nroUsuario')
                <p>DEBE INGRESAR EL USUARIO</p>
            @enderror

            <h5>Fecha:</h5>
            <input type="datetime-local"  name="fecha" class="focus border-primary  form-control" >

            @error('fecha')
            <p>DEBE INGRESAR LA FECHA</p>
            @enderror


            <h5>Producto:</h5>
            <select name="idProducto" id="idProducto" class="form-control" onchange="habilitar()" >
                <option value="nulo">Seleccione un producto</option>
                    @foreach ($productos as $producto)
                        <option value="{{$producto->id}}">
                            {{$producto->name}}
                        </option>
                    @endforeach
            </select>
            @error('idProducto')
                <p>DEBE INGRESAR BIEN EL PRODUCTO</p>
            @enderror
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
            <a href="{{route('nota_compras.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop

@section('css')

@stop

@section('js')

@stop



