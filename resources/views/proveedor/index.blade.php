@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
    <h1>LISTA DE PROVEEDORES</h1>
@stop
 
@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('proveedores.create')}}"class="btn btn-primary btb-sm">Registrar Proveedor</a>
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
        <th scope="col">Acciones</th>
      </tr>
    </thead>

     <tbody>
      @foreach ($proveedores as $proveedor)

        <tr>
          <td>{{$proveedor->id}}</td>
          <td>{{$proveedor->nombre}}</td>
          <td>{{$proveedor->telefono}}</td>
          <td >
            <form action="{{route('proveedores.destroy',$proveedor)}}" method="post">
              @csrf
              @method('delete')
              <a class="btn btn-primary btn-sm" href="{{route('proveedores.show',$proveedor)}}">Ver</a>
                
              <a href="{{route('proveedores.edit',$proveedor)}}"class="btn btn-info btn-sm">Editar</a>

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
     $('#clientes').DataTable();
    } );
</script>
@stop
