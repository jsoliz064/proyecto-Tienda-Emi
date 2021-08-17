@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<h1>Nota de Salida</h1>
@stop

@section('content')

    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif

<div class="card">
    <div class="card-body">
        <div class="row row justify-content-center m-2">
            <h2 class="font-weight-bold">DETALLE DE SALIDA</h2>
        </div>
        {{-- CAPTURA LAS VARIABLES DEL FORMULARIO --}}
        <form action="{{ route('salidas.update', $salida) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="row row justify-content-center">
                 {{-- SELECCIONAR PRODUCTO --}}
                <div class="col-4">
                    <h5>Producto:</h5>
                    <select name="idProducto" id="idProducto" class="form-control" onchange="habilitar()" >
                        {{-- value="" <=> value=null  --}}
                        <option value="">Seleccione un producto</option>
                            @foreach ($productos as $producto)
                                <option value="{{$producto->id}}">  {{$producto->nombre}}  </option>
                            @endforeach
                    </select>

                    @error('idProducto')
                        <p>DEBE INGRESAR BIEN EL PRODUCTO</p>
                    @enderror
                </div>  
                {{-- esto es una prueba --}}
                {{-- <div class="form-group">
                    <p class="font-weight-bold">productos</p>
                    @foreach ($productos as $producto)
                        <label class="mr-2">
                            {!! Form::checkbox('productos[]', $producto->id, null) !!}
                            {{$producto->nombre}}
                        </label>
                    @endforeach   
                </div> --}}
                
                {{-- INGRESAR CANTIDAD --}}
                <div class="col-2">
                    <h5>Cantidad:</h5>
                    <input type="number" value="0" name="cantidad" class="focus border-primary  form-control" >
                    @error('cantidad')
                        <p>DEBE INGRESAR LA CANTIDAD</p>
                    @enderror
                </div>
                {{--BUTTON AñADIR AL CARRITO  --}}
                <div class="col-3 align-items-center">
                    <h5>Carrito</h5>
                    <button  class="btn btn-info" type="submit">Añadir</button>
                </div>

            </div>    
        </form>
        <br> <br>
        {{-- las tablas  --}}
        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($detalleSalidas as $detalle)
                    <tr>
                        <td>{{$detalle->codigo}}</td>
                        <td>{{$detalle->nombre}}</td>
                        <td>{{$detalle->pivot->cantidad}}</td>
                        <td>
                            {{-- <form action="{{ route('salidas.destroyDetalle', $salida, $detalle->id) }}" method="post"> --}}
                            {{-- <form  action="{{ route('salidas.update', $salida) }}" method="POST"> --}}
                            {!! Form::model("EliminarDetalle", ['route' => ['salidas.update', $salida], 'method' => 'put']) !!}
                                @csrf
                                <button name="productoId" value={{$detalle->id}} class="btn btn-danger btn-sm"  > <i class="fas fa-times"></i>  </button>
                            {{-- </form> --}}
                            {!! Form::close() !!}
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- <button  class="btn btn-danger btn-sm" type="submit">Guardar</button> --}}
        <a href="{{route('salidas.index')}}" class="btn btn-warning text-white">Volver</a>          
        
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="css/home.css">
@stop

@section('js')
   
@stop