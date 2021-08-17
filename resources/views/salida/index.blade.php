@extends('adminlte::page')

@section('title', 'NotaSalidas')

@section('content_header')
    <h1>Notas de Salida</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <a href="{{ route('salidas.create') }}" class="btn btn-primary btb-sm">Registrar</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="notaVentas" >
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($salidas as $salida)
                        <tr>
                            <td width="19%">{{$salida->id}}</td>
                            <td width="19%">{{$salida->hora}}</td>
                            <td width="19%">{{$salida->fecha}}</td>
                            <td width="19%">
                                <form action="{{ route('salidas.destroy', $salida)}}" method="POST" >
                                    @csrf
                                    @method('delete')
                                   
                                    {{-- <a href="{{route('salidas.show', $salida)}}" class="btn btn-primary btn-sm" >Ver</a> --}}
                                   
                                    <a href="{{route('salidas.edit', $salida)}}" class="btn btn-info btn-sm" >Editar</a>
                                   
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
