@extends('adminlte::page')

@section('title', 'detalleVentas')

@section('content_header')
    {{-- <h1>NOTAS DE VENTAS</h1> --}}
    {{--<h1>Detalle Venta</h1>--}}
@stop
@section('content')
{{-- <div class="card">
        <div class="card-header">
            <h3>Detalle de Ventas:</h3>
            <a href="{{route('detalleVentas.create')}}"class="btn btn-primary btb-sm">Registrar</a>
        </div>
  </div> --}}
  
<div class="card">
  <div class="card-body">
      <table class="table table-striped" id="detalleVentas" >

        <thead>

          <tr>
            <th scope="col">ID</th>
            <th scope="col">notaVenta_id</th>
            <th scope="col">producto_id</th>
            <th scope="col">precio</th>
            <th scope="col">cantidad</th>
            <th scope="col">importe</th>
            <th scope="col">FechaHora</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($detalleVentas as $detalleVenta)

            <tr>
              <td>{{$detalleVenta->id}}</td>
               <td>{{DB::table('notaVentas')->where('id',$detalleVenta->notaVenta_id)->value('nroCliente')}}</td>
               <td>{{DB::table('productos')->where('id',$producto->producto_id)->value('nombre')}}</td>
               <td>{{$detalleVenta->precio}}</td>
               <td>{{$detalleVenta->cantidad}}</td>
               <td>{{$detalleVenta->importe}}</td>
               <td>{{$detalleVenta->updated_at}}</td>
               <td>
                 <form action="{{route('detalleVentas.destroy',$detalleVenta)}}" method="post">
                   @csrf
                   @method('delete')
                   <a class="btn btn-primary btn-sm" href="{{route('detalleVentas.show', $detalleVenta)}}">Ver</a>
                   {{--<a class="btn btn-primary btn-sm" href="{{route('detalleVentas.show',auth()->detalleVenta()->detalleVenta)}}">Ver</a>--}}
                   <a href="{{route('detalleVentas.edit', $detalleVenta)}}"class="btn btn-info btn-sm">Editar</a>
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
           $('#detalleVentas').DataTable();
          } );
      </script>
  @stop