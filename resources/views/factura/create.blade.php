@extends('adminlte::page')

@section('title', 'Factura')

@section('content_header')
    <h1>Registrar Factura</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('facturas.store')}}" novalidate >

            @csrf
            <h5>Nota de Venta</h5>
            <input type="text" name="notaVenta_id" value="{{$notaVenta->id}}" class="focus border-primary  form-control" >

            <h5>N° Factura</h5>
            <input type="number"  name="numero" class="focus border-primary  form-control" >
            @error('numero')
            <p>DEBE INGRESAR BIEN EL NUMERO</p>
            @enderror


            <h5>NIT:</h5>
            <input type="number" name="nit"  class="focus border-primary  form-control" >

            @error('nit')
                <p>DEBE INGRESAR BIEN EL NIT</p>
            @enderror

            <h5>Cod. Control:</h5>
            <input type="number" name="codControl"  class="focus border-primary  form-control" >
            @error('email')
                <p>DEBE INGRESAR BIEN EL CODIGO</p>
            @enderror

            <h5>Total:</h5>
            <input type="text" name="total" value="{{$notaVenta->importe}}" class="focus border-primary  form-control"  >
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
