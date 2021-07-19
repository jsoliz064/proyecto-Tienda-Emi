@extends('adminlte::page')

@section('title', 'Personal')

@section('content_header')
    <h1>LISTA DE PERSONAL</h1>
@stop

@section('content')
  <div class="card">
      <div class="card-header">
          <a href="{{route('personales.create')}}"class="btn btn-primary btb-sm"> Registrar Personal</a>
      </div>
  </div>
  
  <div class="card">

  <div class="card-body">
    <table class="table table-striped" id="personal" >

      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre Completo</th>
          <th scope="col">Telefono</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($personales as $personal)

          <tr>
            <td>{{$personal->id}}</td>
            <td>{{$personal->nombre}}</td>
            <td>{{$personal->telefono}}</td>
            <td>
              <form action="{{route('personales.destroy',$personal)}}" method="post">
                @csrf
                @method('delete')
                <a class="btn btn-primary btn-sm" href="{{route('personales.show',$personal)}}">Ver</a>
                  
                <a href="{{route('personales.edit',$personal)}}"class="btn btn-info btn-sm">Editar</a>

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
     $('#personal').DataTable();
    } );
</script>
@stop
