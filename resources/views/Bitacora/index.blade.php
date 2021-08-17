@extends('adminlte::page')

@section('title', 'Bitacora')

@section('content_header')
    {{-- <h1>Bitacora</h1> --}}
@stop




@section('content')
    <div class="card">
        <div class="card-header">
            <span>Bitácora</span>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="bitacora" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Autor id</th>
                        <th scope="col">Accion</th>
                        <th scope="col">Descripción</th>
                       {{--  <th scope="col">subject type</th> --}}
                        <th scope="col">id implicado</th>
                        {{-- <th scope="col">causer type</th> --}}
                        <th scope="col">Fecha</th>
                        {{-- <th scope="col">properties</th> --}}
                    </tr>
                </thead>

                <tbody>
                    @foreach ($actividades as $actividad)
                        <tr>
                            <td>{{$actividad->id}}</td>
                            <td>{{$actividad->name}}</td>
                            <td>{{$actividad->causer_id}}</td>
                            <td>{{$actividad->log_name}}</td>
                            <td>{{$actividad->description}}</td>
                            {{-- <td>{{$actividad->subject_type}}</td> --}}
                            <td>{{$actividad->subject_id}}</td>
                            {{-- <td>{{$actividad->causer_type}}</td> --}}
                            <td>{{$actividad->created_at}}</td>
                            {{-- <td>{{$actividad->properties}}</td> --}}
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
         $('#bitacora').DataTable();
        } );
    </script>
@stop