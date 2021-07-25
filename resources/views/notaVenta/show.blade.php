@extends('adminlte::page')

@section('title', 'notaVentas')

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
                        <h3 class="font-weight-bold px-2">DATOS NotaVenta</h3>
                    </div>
                    
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Numero de Cliente: </h5>
                        <h5>{{$notaVenta->nroCliente}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Importe: </h5>
                        <h5>{{$notaVenta->importe}}</h5>
                    </div>

                    <div class="row">
                        <h5 class="font-weight-bold px-2">FechaHora: </h5>
                        <h5>{{$notaVenta->updated_at}}</h5>
                    </div>
                    <div class="row">
                        <a href="{{route('notaVentas.index')}}"class="btn btn-warning text-white btn-sm m-2">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>       
</div>

<br>
<br>
@stop