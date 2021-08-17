@extends('adminlte::page')

@section('title', 'notaVentas')

@section('content_header')
<h1 class= text-center >Detalle De Venta</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-striped" id="detalleVenta" >
            <thead>
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Detalle</th>
                    <th scope="col">P.Unit</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">importe</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($detalleVenta as $detalle)
                    
                        <tr>
                            <td>{{DB::table('productos')->where('id',$detalle->producto_id)->value('codigo')}}</td>
                            <td>{{DB::table('productos')->where('id',$detalle->producto_id)->value('nombre')}}</td>
                            <td>{{$detalle->precio}}</td>
                            <td>{{$detalle->cantidad}}</td>
                            <td>{{$detalle->importe}} </td>
                        </tr>
                        {{-- <td width="30%">
                            <form action="{{ route('reciboPagos.destroy', $pago)}}" method="POST" >
                                @csrf
                                @method('delete')
                            
                                <a href="{{route('reciboPagos.show', $pago)}}" class="btn btn-primary btn-sm" >Ver</a>
                            
                                 <a href="{{route('reciboPagos.edit', $pago)}}" class="btn btn-info btn-sm" >Crear Cuota</a> 
                            
                                <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" 
                                value="Borrar">Eliminar</button> 
                            </form>
                        </td> --}}
                    
                @endforeach
            </tbody>
        </table>   

    </div>
</div>

<a href="{{route('notaVentas.index')}}"class="btn btn-warning text-white btn-sm m-2">Volver</a>

@stop


@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
     $('#detalleVenta').DataTable();
    } );
</script>
@stop