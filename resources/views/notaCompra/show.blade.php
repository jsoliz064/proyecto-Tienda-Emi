@extends('adminlte::page')

@section('title', 'notaCompras')

@section('content_header')
<h1></h1>
@stop

@section('content')

<div class="container " style="background-color: white">
    <div class="row justify-content-center border rounded-top">
        <div class="col">
            {{-- datos --}}
            <div class="row border"> 
                <div class="col">
                    <div class="row">
                        <h3 class="font-weight-bold px-2">DATOS Nota De Compra</h3>
                    </div>
                    
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Proveedor: </h5>
                        <h5>{{DB::table('proveedors')->where('id',$notaCompra->nroProveedor)->value('nombre')}}</h5>
                    </div>

                    <div class="row">
                        <h5 class="font-weight-bold px-2">Usuario: </h5>
                        <h5>{{DB::table('users')->where('id',$notaCompra->nroUsuario)->value('name')}}</h5>
                    </div>

                    <div class="row">
                        <h5 class="font-weight-bold px-2">Monto: </h5>
                        <h5>{{$notaCompra->monto}}</h5>
                    </div>

                    <div class="row">
                        <h5 class="font-weight-bold px-2">FechaHora: </h5>
                        <h5>{{$notaCompra->updated_at}}</h5>
                    </div>
                    
                    <div class="row">
                        <form>
                            <a href="{{route('notaCompras.index')}}"class="btn btn-warning text-white btn-sm m-2">Volver</a>
                        </form>

        
                    </div>
                    

                </div>
            </div>
        </div>
    </div>       
</div>

<br>
<br>
@stop