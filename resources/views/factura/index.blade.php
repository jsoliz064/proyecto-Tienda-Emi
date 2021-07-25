@extends('adminlte::page')

@section('title', 'Facturas')

@section('content_header')
    <h1>FACTURAS</h1>
@stop
 
@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('notaVentas.index')}}"class="btn btn-primary btb-sm">Volver</a>
    </div>
</div>
<div class="card">
<div class="card-body">
  <table class="table table-striped" id="clientes" >

    <thead>

      <tr>
        <th scope="col">ID</th>
        <th scope="col">NotaVenta ID</th>
        <th scope="col">Numero</th>
        <th scope="col">Total</th>
        <th scope="col">Fecha</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
     <tbody>
      @foreach ($facturas as $factura)

        <tr>
            <td>{{$factura->id}}</td>
            <td>{{$factura->notaVenta_id}}</td>
            <td>{{$factura->numero}}</td>
            <td>{{$factura->total}}</td>
            <td>{{$factura->created_at}}</td>
            <td>
            <form action="{{route('facturas.destroy',$factura)}}" method="post">
              @csrf
              @method('delete')
              <a class="btn btn-primary btn-sm" href="{{route('facturas.show',$factura)}}">Ver</a>
                
              {{-- <a href="{{route('proveedores.edit',$proveedor)}}"class="btn btn-info btn-sm">Editar</a> --}}

              <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" 
              value="Borrar">Eliminar</button> 
            </form>
          </td>
        </tr>

       @endforeach

    </tbody> 

  </table>
</div>
</div>
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
     $('#clientes').DataTable();
    } );
</script>
@stop
