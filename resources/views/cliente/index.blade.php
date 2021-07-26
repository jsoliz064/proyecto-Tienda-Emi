@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
  <h1>LISTA DE CLIENTES</h1>
@stop

@section('content')
  <div class="card">
    <div class="card-header">
        {{-- solo los que tienen permiso a esas rutas.metodo podran ver el button --}}
        @can('clientes.create')
          <a class="btn btn-primary btb-sm" href="{{url('/clientes/create')}}">Registrar Cliente</a>    
        @endcan
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <table class="table table-striped" id="clientes" >
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre Completo</th>
            <th scope="col">Telefono</th>
            <th scope="col" width="0%">Acciones</th>
            {{-- <th colspan=""></th> --}}
          </tr>
        </thead>
        
        <tbody>

          @foreach ($clientes as $cliente)
            <tr>
              <td>{{$cliente->id}}</td>
              <td>{{$cliente->nombre}}</td>
              <td>{{$cliente->telefono}}</td>
              <td >
                <form  action="{{route('clientes.destroy',$cliente)}}" method="post">
                  @csrf
                  @method('delete')
                    {{-- solo los que tienen permiso a esas rutas.metodo podran ver el button --}}
                    @can('clientes.show') 
                    <a  class="btn btn-primary btn-sm" href="{{route('clientes.show',$cliente)}}">Ver</a>  
                    @endcan

                    @can('clientes.edit')
                      <a class="btn btn-info btn-sm" href="{{route('clientes.edit',$cliente)}}">Editar</a>                 
                    @endcan

                    @can('clientes.destroy')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" 
                    value="Borrar">Eliminar</button>
                    @endcan  

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
