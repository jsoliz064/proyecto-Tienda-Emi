@extends('adminlte::page')

@section('title', 'Plan')

@section('content_header')
<h1>Plan de Pago</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{route('planPagos.store')}}" novalidate >
                @csrf

                <h5>Nota de Venta</h5>
                <input type="text"  name="nota_venta_id"  value ="{{$notaVenta->id}}" class="focus border-primary  form-control" readonly>
                    @error('nota_venta_id')
                        <span class="text-danger"> {{'Hay un plan de pago Existente'}}</span>
                    @enderror

                <h5>Cantidad de Cuotas</h5>
                <input type="number"  name="cantidad" min="1" max="50" class="focus border-primary  form-control">
                    @error('cantidad')
                        <span class="text-danger"> {{'ingrese la cantidad de cuotas'}}</span>
                    @enderror

                <h5>Saldo:</h5>
                <input type="number"  name="saldo"  value ="{{$notaVenta->importe}}" class="focus border-primary  form-control" readonly>
                
                <br>
                <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
                <a href="{{route('planPagos.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
            </form>

        </div>
    </div>

    <script>
        var fecha = new Date;
        var year = fecha.getFullYear();
        var dia = String(fecha.getDate());
        var mes = fecha.getMonth()+1;
        if (mes <= 9 ) {
            mes = '0'+mes;
        }
        var dato =  year + '-' + mes + '-' + dia;
        document.getElementById("fecha").value = dato;
        //document.write(dato);
    </script>
@stop

@section('css')
    <link rel="stylesheet" href="css/home.css">
@stop

@section('js')
   
@stop