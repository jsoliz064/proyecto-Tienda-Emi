@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
    <h1>Compatibilidad5</h1>
@stop

@section('content')


<div class="card">
        <div class="card-header">
            <a href="{{route('compatibilidades.create')}}"class="btn btn-primary btb-sm">Registrar Compatibilidad</a>
        </div>
  </div>
<div class="card">
  <div class="card-body">
     
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
          
      </script>
  @stop