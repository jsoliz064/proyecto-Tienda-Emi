@extends('adminlte::page')

@section('title', 'Autos')

@section('content_header')
    <h1>Autos</h1>
@stop

@section('content')
<div class="card">
  <div class="card-header">
      <a href="{{route('compatibilidades.create')}}"class="btn btn-primary btb-sm">Registrar Compatibilidad</a>
  </div>
</div>
<div class="card">
    <div class="card-header">
        <a href="{{route('autos.create')}}"class="btn btn-primary btb-sm">Registrar Autos</a>
    </div>
</div>

<div class="card">
<div class="card-body">
  <table class="table table-striped" id="autos" >

    <thead>

      <tr>
        <th scope="col">ID</th>
        <th scope="col">Modelo</th>>
        <th scope="col">Acciones</th>>
      </tr>
    </thead>
     <tbody>
      @foreach ($autos as $auto)

        <tr>
          <td>{{$auto->id}}</td>
          <td>{{$auto->modelo}}</td>
          <td>
            <form action="{{route('autos.destroy',$auto)}}" method="post">
              @csrf
              @method('delete')
              <a class="btn btn-primary btn-sm" href="{{route('autos.show',$auto)}}">Ver</a> 
              <a class="btn btn-primary btn-sm" href="{{route('compatibilidades.show',$auto)}}">Accesorios</a> 
              <a href="{{route('autos.edit',$auto)}}"class="btn btn-info btn-sm">Editar</a>

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
     $('#autos').DataTable();
    } );
</script>
@stop