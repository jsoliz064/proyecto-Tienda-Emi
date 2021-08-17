@extends('adminlte::page')

@section('title', 'Reporte Ventas')

@section('content_header')
    <h1>REPORTE DE VENTAS</h1>
    <h1></h1>
@stop

@section('content')
  
<div class="card">
  <div class="card-body">
    {!! Form::open(['route'=>'reporte.resultados','method'=>'POST'])!!}
    <div class="row">
        <div class="col-12 col-md-3">
            <span>Fecha inicial</span>
            <div class="form-group">
                <input class="form-control" type="date" value="{{$fechaini}}" name="fecha_ini" id="fecha_ini">
            </div>
        </div>
        <div class="col-12 col-md-3">
            <span>Fecha final</span>
            <div class="form-group">
                <input class="form-control" type="date" value="{{$fechafin}}" name="fecha_fin" id="fecha_fin">
            </div>
        </div>
        <div class="col-12 col-md-3 text-center mt-4">
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">consultar</button>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <span>Total de ingresos: <b> </b></span>
            <div class="form-group">
                <strong>Bs/{{$total}}</strong>
            </div>
        </div>
    </div>
    {!!Form::close()!!}

      <table class="table table-striped" id="notaVentas" >

        <thead>

          <tr>
            <th scope="col">Id</th>
            <th scope="col">Cliente</th>
            <th scope="col">Importe</th>
            <th scope="col">Fecha y Hora</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($ventas as $venta)

            <tr>
               <td>{{$venta->id}}</td>
               <td>{{DB::table('clientes')->where('id',$venta->nroCliente)->value('nombre')}}</td>
               <td>{{$venta->importe}}</td>
               <td>{{$venta->created_at}}</td>
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