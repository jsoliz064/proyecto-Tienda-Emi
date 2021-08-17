@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<h1>Lista de Pagos</h1>
@stop

@section('content')
    {{-- <div class="card">
        <div class="card-header">
            <a href="{{ route('reciboPagos.create') }}" class="btn btn-primary btb-sm">Registrar</a>
        </div>
    </div> --}}

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="pagos" >
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">nombre</th>
                        
                        {{-- <th scope="col">sub Total</th>
                        <th scope="col">nro de Cuota</th>
                        <th scope="col">saldo</th> --}}

                        <th scope="col">Hora</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($reciboPagos as $pago)
                        <tr>
                            <td width="10%">{{$pago->id}}</td>
                            <td width="30%">{{$pago->nombre }}</td>

                            {{-- <td width="19%">{{1 }}</td>
                            <td width="19%">{{1}}</td>
                            <td width="19%">{{1}}</td> --}}

                            <td width="20%">{{$pago->hora}}</td>
                            <td width="20%">{{$pago->fecha }}</td>
                            <td width="30%">
                                <form action="{{ route('reciboPagos.destroy', $pago)}}" method="POST" >
                                    @csrf
                                    @method('delete')
                                
                                    <a href="{{route('reciboPagos.show', $pago)}}" class="btn btn-primary btn-sm" >Ver</a>
                                
                                    {{-- <a href="{{route('reciboPagos.edit', $pago)}}" class="btn btn-info btn-sm" >Crear Cuota</a> --}}
                                
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
     $('#pagos').DataTable();
    } );
</script>
@stop