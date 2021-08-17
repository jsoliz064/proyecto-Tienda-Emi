@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
    <h1>Registrar Nota de Venta</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('notaVentas.store')}}" novalidate >
 
            @csrf
            <h5>Cliente:</h5>
            <select name = "nroCliente" id="nroCliente" class="form-control" onchange="habilitar()" >
                <option value="nulo">Seleccione un Cliente</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{$cliente->id}}">
                            {{$cliente->nombre}}
                        </option>
                    @endforeach
            </select>
            
            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>

            <a href="{{route('notaVentas.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop

@section('css')

@stop

@section('js')

@stop
