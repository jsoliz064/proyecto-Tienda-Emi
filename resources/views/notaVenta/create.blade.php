@extends('adminlte::page')

@section('title', 'notaVentas')

@section('content_header')
    <h1>Registrar Nota Venta</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('notaVentas.store')}}" novalidate >

            @csrf

            <h5>NroCliente:</h5>
            <input type="text"  name = "nroCliente" class="focus border-primary  form-control" >
            @error('nroCliente')
            <p>DEBE INGRESAR BIEN EL NUMERO DE CLIENTE</p>
            @enderror

            <h5>Importe:</h5>
            <input type="text"  name = "importe" class="focus border-primary  form-control" >
            @error('importe')
            <p>DEBE INGRESAR BIEN EL IMPORTE</p>
            @enderror

            <h5>Fecha:</h5>
            <input type="text" name="fecha"  class="focus border-primary  form-control" >
            @error('fecha')
                <p>DEBE INGRESAR BIEN LA FECHA</p>
            @enderror

            <h5>Hora:</h5>
            <input type="text" name="hora"  class="focus border-primary  form-control" >
            @error('hora')
                <p>DEBE INGRESAR BIEN LA HORA</p>
            @enderror
            
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