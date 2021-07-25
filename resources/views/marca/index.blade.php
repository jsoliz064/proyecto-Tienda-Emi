@extends('adminlte::page')

@section('title', 'Marcas')

@section('content_header')
    <h1>Marcas</h1>
@stop

@section('content')
 
<div class="card">
    <div class="card-header">
        <a href="{{route('marcas.create')}}"class="btn btn-primary btb-sm">Registrar Marcas</a>
    </div>
</div>

<div class="card">
<div class="card-body">
  <table class="table table-striped" id="marcas" >

    <thead>

      <tr>
        <th scope="col">ID</th>
        <th scope="col">Descripcion</th>>
        <th scope="col">Acciones</th>>
      </tr>
    </thead>
     <tbody>
      @foreach ($marcas as $marca)

        <tr>
          <td>{{$marca->id}}</td>
          <td>{{$marca->descripcion}}</td>
          <td>
            <form action="{{route('marcas.destroy',$marca)}}" method="post">
              @csrf
              @method('delete')
              
              <a class="btn btn-primary btn-sm" href="{{route('marcas.show',$marca)}}">Ver</a>  
              <a class="btn btn-info btn-sm" href="{{route('marcas.edit',$marca)}}">Editar</a>

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
     $('#marcas').DataTable();
    } );
</script>
@stop
