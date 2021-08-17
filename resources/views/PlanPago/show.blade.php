@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<h1>Lista de Cuotas</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <?php
            if(($planPago->cantidad_cuotas) > $planPago->cuotas_pagadas){  ?>
                <a href="{{route('cuotaCreate', $planPago)}}"class="btn btn-dark text-white btn-sm">Pagar Cuota</a>
            <?php    } ?>
        </div>
    </div> 

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="cuotas" >
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">monto</th>
                        <th scope="col">nro de Cuota</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Fecha</th>
                        <th scope="col"> Acciones</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($cuotas as $cuota)
                        
                            <tr>
                                {{-- <td>{{DB::table('productos')->where('id',$detalle->producto_id)->value('codigo')}}</td> --}}
                                <td>{{$cuota->id}}</td>
                                <td>{{$cuota->monto}}</td>
                                <td>{{$cuota->nro_cuota}}</td>
                                <td>{{$cuota->hora}}</td>
                                <td>{{$cuota->fecha}} </td>
                                <td width="28%">
                                    <?php
                                       //$cuota = DB::table('cuotas')->find($cuota->id);
                                       $cuota = App\Models\Cuota::find($cuota->id);
                                       $idC = DB::table('recibo_Pagos')->where('idC', $cuota->id)->value('id');
                                       $reciboPagos = App\Models\ReciboPago::find($idC);
                                        
                                       if (! isset($reciboPagos)) {
                                        $reciboPagos = "";
                                       }
                                    //    echo ($reciboPagos);
                                     ?>

                                    <form action="{{ route('cuotas.destroy', $cuota)}}" method="POST" >
                                        @csrf
                                        @method('delete')

                                        <?php
                                         if($reciboPagos != ""){  ?>
                                            <a href="{{route('reciboPagos.show', $reciboPagos)}}" class="btn btn-primary btn-sm" >Ver comprobante Pago</a>
                                        <?php    } ?>
                        
                                        <?php
                                         if($reciboPagos == ""){  ?>
                                            <a href="{{route('reciboPagosCrear', $cuota)}}" class="btn btn-info btn-sm" >generar comprobante Pago</a>
                                        <?php    } ?>

                                       
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

    <a href="{{route('planPagos.index')}}"class="btn btn-warning text-white btn-sm m-2">Volver</a>
    
    
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
     $('#cuotas').DataTable();
    } );
</script>
@stop