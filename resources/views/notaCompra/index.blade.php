@extends('adminlte::page')

<<<<<<< HEAD
@section('title', 'notaCompras')
=======
@section('title', 'Compras')
>>>>>>> ffdb270d03d72a566d18da8d63d7d94120da8d30

@section('content_header')
    <h1>NOTA DE COMPRAS</h1>
@stop

@section('content')

<div class="card">
        <div class="card-header">
            <a href="{{route('notaCompras.create')}}"class="btn btn-primary btb-sm">Registrar Nota de Compra</a>
        </div>
  </div>
<div class="card">
  <div class="card-body">
      <table class="table table-striped" id="notaCompras" >
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Usuario</th>
            <th scope="col">Monto</th>
            <th scope="col">Fecha</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($notaCompras as $notaCompra)
            <tr>
              <td>{{$notaCompra->id}}</td>
               <td>{{DB::table('proveedors')->where('id',$notaCompra->nroProveedor)->value('nombre')}}</td>
               <td>{{DB::table('users')->where('id',$notaCompra->nroUsuario)->value('name')}}</td>
               {{-- <td>{{$notaCompra->users->name}}</td> --}}
               <td>{{$notaCompra->monto}}</td>
               <td>{{$notaCompra->fecha}}</td>
               <td>
                 <form action="{{route('notaCompras.destroy',$notaCompra)}}" method="post">
                   @csrf
                   @method('delete')
                   <a class="btn btn-primary btn-sm" href="{{route('notaCompras.show', $notaCompra)}}">Ver</a>
                     
                   <a href="{{route('notaCompras.edit', $notaCompra)}}"class="btn btn-info btn-sm">Editar</a>
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
           $('#notaCompras').DataTable();
          } );
      </script>
  @stop






  