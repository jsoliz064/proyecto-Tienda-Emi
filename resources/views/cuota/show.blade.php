@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<h1>Comprobante de Pago</h1>
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
                        <th scope="col">Hora</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                    
                <tbody>
                    {{-- @foreach ($reciboPagos as $pago) --}}
                    @if (isset($reciboPagos))
                                
                               
                        <tr>
                            
                            <td width="10%">{{$reciboPagos->id}}</td>
                            <td width="30%">{{$reciboPagos->nombre }}</td>
                            <td width="20%">{{$reciboPagos->hora}}</td>
                            <td width="20%">{{$reciboPagos->fecha }}</td>
                            <td width="30%">
                                
                                <form action="{{ route('reciboPagos.destroy', $reciboPagos)}}" method="POST" >
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('reciboPagos.show', $reciboPagos)}}" class="btn btn-primary btn-sm" >Ver</a>
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')"  value="Borrar">Eliminar</button> 
                                </form>

                            </td>
                        </tr>
                    {{-- @endforeach --}}
                    @endif 
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