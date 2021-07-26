@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
@stop

@section('content')





<div class="container " style="background-color: white">
    <div class="row justify-content-center border rounded-top">
        <div class="col">
            {{-- datos --}}
            <div class="row border"> 
                <div class="col">
                    <div class="row">
                        <h3 class="font-weight-bold px-2">DATOS PRODUCTO</h3>
                    </div>
                    
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Codigo Producto: </h5>
                        <h5>{{$producto->codigo}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Nombre Producto: </h5>
                        <h5>{{$producto->nombre}}</h5>
                    </div>

                    <div class="row">
                        <h5 class="font-weight-bold px-2">Precio Unidad: </h5>
                        <h5>{{$producto->precioU}}</h5>
                    </div>

                  
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Precio Al Por Mayor: </h5>
                        <h5>{{$producto->precioM}}</h5>
                    </div>
                   
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Costo Promedio: </h5>
                        <h5>{{$producto->costoPromedio}}</h5>
                    </div>

                    <div class="row">
                        <h5 class="font-weight-bold px-2">Descripcion: </h5>
                        <h5>{{$producto->descripcion}}</h5>
                    </div>

                    <div class="row">
                        <h5 class="font-weight-bold px-2">Estado de Stock: </h5>
                        <h5>{{$producto->stock}}</h5>
                    </div>

                    <div class="row">
                        <h5 class="font-weight-bold px-2">Id Categoria: </h5>
                        <h5>{{$producto->idCategoria}}</h5>
                    </div>

                    <div class="row">
                        <a href="{{route('productos.index')}}"class="btn btn-warning text-white btn-sm m-2">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>       
</div>

<br>
<br>
@stop