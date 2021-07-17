@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>CATEGORIAS</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href=""class="btn btn-primary btb-sm">Registrar Categorias</a>
    </div>
</div>
<div class="card">
<div class="card-body">
  <table class="table table-striped" id="categorias" >

    <thead>

      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>>
      </tr>
    </thead>
     <tbody>
      @foreach ($categorias as $categoria)

        <tr>
          <td>{{$categoria->id}}</td>
          <td>{{$categoria->nombre}}</td>
          <td>
            <form action="{{route('categorias.destroy',$categoria)}}" method="post">
              @csrf
              @method('delete')
              {{-- <a class="btn btn-primary btn-sm" href="">Ver</a> --}}
                
              <a href=""class="btn btn-info btn-sm">Editar</a>

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
     $('#categorias').DataTable();
    } );
</script>
@stop
