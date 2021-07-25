@extends('adminlte::page')

@section('title', 'notaVentas')

@section('content_header')
    {{-- <h1>NOTAS DE VENTAS</h1> --}}
    <h1></h1>
@stop

@section('content')
<div class="card">
  <div class="card-header">
      <h3>Facturas:</h3>
      <a href="{{route('facturas.index')}}"class="btn btn-primary btb-sm">Ver</a>
  </div>
</div>

<div class="card">
        <div class="card-header">
            <h3>Notas de Ventas:</h3>
            <a href="{{route('notaVentas.create')}}"class="btn btn-primary btb-sm">Registrar</a>
        </div>
  </div>
  
<div class="card">
  <div class="card-body">
      <table class="table table-striped" id="notaVentas" >

        <thead>

          <tr>
            <th scope="col">Id</th>
            <th scope="col">Cliente</th>
            <th scope="col">Importe</th>
            <th scope="col">Fecha y Hora</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($notaVentas as $notaVenta)

            <tr>
              <td>{{$notaVenta->id}}</td>
               <td>{{DB::table('clientes')->where('id',$notaVenta->nroCliente)->value('nombre')}}</td>
               <td>{{$notaVenta->importe}}</td>
               <td>{{$notaVenta->updated_at}}</td>
               <td>
                 <form action="{{route('notaVentas.destroy',$notaVenta)}}" method="post">
                   @csrf
                   @method('delete')
                   <a class="btn btn-primary btn-sm" href="{{route('notaVentas.show', $notaVenta)}}">Ver</a>
                     
                   <a href="{{route('notaVentas.edit', $notaVenta)}}"class="btn btn-info btn-sm">Editar</a>
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
           $('#notaVentas').DataTable();
          } );
      </script>
  @stop