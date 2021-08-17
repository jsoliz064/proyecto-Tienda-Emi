@extends('adminlte::page')

@section('title', 'Salida')

@section('content_header')
<h1>Registrar Nota de Salida</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row row justify-content-center m-2">
                <h2 class="font-weight-bold">DETALLE DE SALIDA</h2>
            </div>
            {{-- CAPTURA LAS VARIABLES DEL FORMULARIO --}}
            <form action="{{route('salidas.store', $salida)}}" method="POST">
                @csrf
                
                <div class="row row justify-content-center">
                     {{-- SELECCIONAR PRODUCTO --}}
                    <div class="col-4">
                        <h5>Producto:</h5>
                        <select name="idProducto" id="idProducto" class="form-control" onchange="habilitar()" >
                            <option value="">Seleccione un producto</option>
                                @foreach ($productos as $producto)
                                    <option value="{{$producto->id}}">  {{$producto->nombre}}  </option>
                                @endforeach
                        </select>
                        @error('idProducto')
                            <p>DEBE INGRESAR BIEN EL PRODUCTO</p>
                        @enderror
                    </div>  
                    
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
                        <input type="number" value="1" name="cantidad" class="focus border-primary  form-control" >
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
                {{--creat nota salida  --}}
                <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
                {{-- no crea nota de salida --}}
                <a href="{{route('salidas.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>          
            </form>
            {{--  --}}
            <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Producto</th>
                            {{-- <th scope="col">Cantidad</th>
                            <th scope="col">Importe</th>
                            <th scope="col">Acciones</th> --}}
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>{{}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="css/home.css">
@stop

@section('js')
   
@stop