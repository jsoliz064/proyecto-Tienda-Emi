@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>PRODUCTOS</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('productos.create')}}"class="btn btn-primary btb-sm">Registrar Producto</a>
    </div>
</div>

<div class="card">
<div class="card-body">
  <table class="table table-striped" id="productos" >

    <thead>

      <tr>
        <th scope="col">ID</th>
        <th scope="col">Categoria</th>
        <th scope="col">Codigo</th>
        <th scope="col">Nombre</th>
        {{-- <th scope="col">Precio U</th>
        <th scope="col">Precio M</th> --}}
        <th scope="col">Stock</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
     <tbody>
      @foreach ($productos as $producto) 
        
        <tr>
          <td>{{$producto->id}}</td>
          <td>{{$producto->categoria->nombre}}</td>
          {{-- <td>{{DB::table('categorias')->where('id',$producto->idCategoria)->value('nombre')}}</td> --}}
          <td>{{$producto->codigo}}</td>
          <td>{{$producto->nombre}}</td>
          <td>{{$producto->stock}}</td>
          <td>
            <form action = "{{route('productos.destroy',$producto)}}" method="post">
              @csrf
              @method('delete')   

              <a class="btn btn-primary btn-sm" href="{{route('productos.show',$producto)}}">Ver</a>
                
              
              <a href="{{route('productos.edit',$producto)}}"class="btn btn-info btn-sm">Editar</a>
              

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
     $('#productos').DataTable();
    } );
</script>
@stop
