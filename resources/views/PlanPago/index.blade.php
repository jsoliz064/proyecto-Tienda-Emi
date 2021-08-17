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
            <th scope="col"> Acciones</th>
            </tr>

        </thead>

        <tbody>
        @foreach ($planes as $plan)
            
            <?php
            $cliente_id=DB::table('nota_ventas')->where('id',$plan->nota_venta_id)->value('nroCliente');
            ?>

            <tr>
                <td width="1%">{{$plan->id}}</td>
                <td width="10%" >{{DB::table('clientes')->where('id', $cliente_id)->value('nombre')}}</td>                
                <td width="1%" >{{$plan->cantidad_cuotas}}</td>
                <td width="5%">{{$plan->monto_cuota}}</td>
                <td width="1%">{{$plan->cuotas_pagadas}}</td>
                <td width="5%">{{$plan->saldo}}</td>
                <td width="5%">{{$plan->total}}</td>
                <td width="10%">{{$plan->estado}}</td>
                <td width="10%">

                    <form action = "{{route('planPagos.destroy',$plan)}}" method="post">
                        @csrf
                        @method('delete')   
                        @can('planPagos.show')
                            <a class="btn btn-primary btn-sm" href="{{route('planPagos.show',$plan)}}">Ver</a>
                         @endcan 
                        <?php
                            //$planPago = DB::table('plan_pagos')->find($plan->id);
                            //$planes = DB::table('plan_pagos')->where('estado', 'vigente')->get(); 
                           // if(($plan->cantidad_cuotas) > $plan->cuotas_pagadas){  ?>
                                {{-- <a href="{{route('cuotaCreate', $plan)}}"class="btn btn-dark text-white btn-sm">Pagar Cuota</a> --}}
                        <?php //   } ?>
                        
                        {{-- <a action="{{view('cuota.create', compact('planes', 'planPago'))}}" class="btn btn-info btn-sm">Editar</a> --}}
                        {{-- <a action="{{view('cuota.create', compact('planes', 'planPago'))}}" class="btn btn-info btn-sm">Editar</a> --}}
                        
                        @can('planPagos.destroy')
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
         $('#planes').DataTable();
        } );
    </script>
@stop