@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
@stop

@section('content')

<section id="container">
    <div class="title_page">
        <h1><i class="fas fa-cube"></i> Nueva Venta</h1>
    </div>
    <div class="datos_cliente">
        <div class="action_cliente">
            <h4>Datos del Cliente</h4>
            <h6>{{$producto->codigo}}</h6>
            {{--<a href="#" class="btn_new btn_new_cliente"><i class="fas fa-plus"></i>Nuevo Cliente</a>--}}
        </div>
        <form name="form_new_cliente_venta" id="form_new_cliente_venta" class="datos">
            <input type="hidden" name="action" value="addCliente">
            <input type="hidden" name="idcliente" value="idcliente" value="" required>
            <div class="wd30">
                <label>NIT</label>
                <input type="text" name="nit_cliente" id="nit_cliente" disabled required>
                <h4>{{$producto->codigo}}</h4>
            </div>
            <div class="wd30">
                <label>Nombre</label>
                {{--<input type="text" name="nit_cliente" id="nit_cliente">--}}
                <h4>{{$producto->codigo}}</h4>
            </div>
            <div class="wd30">
                <label>Telefono</label>
                {{--<input type="text" name="nit_cliente" id="nit_cliente">--}}
                <h4>{{$producto->codigo}}</h4>
            </div>
            <div class="wd100">
                <label>Direccion</label>
                {{--<input type="text" name="nit_cliente" id="nit_cliente">--}}
                <h4>{{$producto->codigo}}</h4>
            </div>
            
        </form>
    </div>
</section>







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