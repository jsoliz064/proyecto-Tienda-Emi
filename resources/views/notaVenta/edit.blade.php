@extends('adminlte::page')

@section('title', 'notaVentas')

@section('content_header')
    <h1>Editar Nota de Venta</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('notaVentas.update',$notaVenta)}}" novalidate >

            @csrf
            @method('PATCH')
            
            <h5>Cliente:</h5>
            <input type="text"  name="nroCliente" value="{{$notaVenta->nroCliente}}" class="focus border-primary  form-control" >
            @error('nro')
            <p>DEBE INGRESAR BIEN NROCLIENTE</p>
            @enderror

            <h5>Importe:</h5>
            <input type="text"  name="importe" value="{{$notaVenta->importe}}" class="focus border-primary  form-control" >

            @error('importe')
            <p>DEBE INGRESAR BIEN EL IMPORTE</p>
            @enderror

            <h5>Fecha:</h5>
            <input type="text"  name="fecha" value="{{$notaVenta->fecha}}" class="focus border-primary  form-control" >

            @error('fecha')
            <p>DEBE INGRESAR BIEN LA FECHA</p>
            @enderror

            <h5>Hora:</h5>
            <input type="text"  name="hora" value="{{$notaVenta->hora}}" class="focus border-primary  form-control" >

            @error('hora')
            <p>DEBE INGRESAR BIEN LA HORA</p>
            @enderror

            <h5>FechaHora:</h5>
            <input type="text"  name="FechaHora" value="{{$notaVenta->updated_at}}" class="focus border-primary  form-control" >

            @error('FechaHora')
            <p>DEBE INGRESAR BIEN fechahora</p>
            @enderror

            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Guardar</button>
            <a href="{{route('notaVentas.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form> 

    </div>
</div>
@stop