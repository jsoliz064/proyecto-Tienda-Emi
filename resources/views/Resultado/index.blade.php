@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<h1>Estado de Resulados</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('resultados.create')}}"class="btn btn-primary btb-sm"> Generar Reporte</a>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
        <table class="table table-striped" id="resultados" >
        
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">nombre</th>
                    <th scope="col">hora</th>
                    <th scope="col">fechaI</th>
                    <th scope="col">fechaF</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
        
            <tbody>
                @foreach ($resultados as $resultado)
                    <tr>
                        <td>{{$resultado->id}}</td>
                        <td>{{$resultado->nombre}}</td>
                        <td>{{$resultado->hora}}</td>
                        <td>{{$resultado->fechaInicial}}</td>
                        <td>{{$resultado->fechaFinal}}</td>

                        <td>
                            <form action="{{route('resultados.destroy', $resultado)}}" method="post">
                            @csrf
                            @method('delete')
                            <a class="btn btn-primary btn-sm" href="{{route('resultados.show',$resultado)}}">Ver</a>
                                
                            {{-- <a href="{{route('users.edit',$usuario)}}" class="btn btn-info btn-sm">Editar</a> --}}
                
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
            $('#resultados').DataTable();
        });
    </script>
@stop