@extends('adminlte::page')

@section('title', 'planes')

@section('content_header')
<h1>Planes de pago</h1>
@stop

@section('content')
    
<div class="card">
  <div class="card-body">
    <table class="table table-striped" id="planes">
        <thead>

            <tr>
            <th scope="col">Id</th>
            <th scope="col">Cliente</th>
            <th scope="col">Cantidad Cuotas</th>
            <th scope="col">Cuota</th>
            <th scope="col">Cuotas Pagadas</th>
            <th scope="col">Saldo Pendiente</th>
            <th scope="col">Total</th>
            <th scope="col">Estado</th>
            <th  scope="col"> Acciones</th>
            </tr>

        </thead>

        <tbody>
        @foreach ($plan as $planes)
            
            <?php
            $cliente_id=DB::table('nota_ventas')->where('id',$planes->nota_venta_id)->value('nroCliente');
            ?>

            <tr>
                <td width="1%">{{$planes->id}}</td>
                <td width="10%" >{{DB::table('clientes')->where('id', $cliente_id)->value('nombre')}}</td>                
                <td width="1%" >{{$planes->cantidad_cuotas}}</td>
                <td width="5%">{{$planes->monto_cuota}}</td>
                <td width="1%">{{$planes->cuotas_pagadas}}</td>
                <td width="5%">{{$planes->saldo}}</td>
                <td width="5%">{{$planes->total}}</td>
                <td width="10%">{{$planes->estado}}</td>
                <td width="10%">

                    <form action = "{{route('planPagos.destroy',$planes)}}" method="post">
                        @csrf
                        @method('delete')   
          
                        {{-- <a class="btn btn-primary btn-sm" href="{{route('productos.show',$planes)}}">Ver</a>
                          
                        
                        <a href="{{route('productos.edit',$planes)}}"class="btn btn-info btn-sm">Editar</a>
                         --}}
          
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
         $('#planes').DataTable();
        } );
    </script>
@stop