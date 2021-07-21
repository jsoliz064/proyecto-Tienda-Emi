@extends('adminlte::page')

@section('title', 'Santana')

@section('content_header')
@stop

@section('content')
<div class="container " style="background-color: white">
    <div class="row justify-content-center border rounded-top">
        <div class="col">
            <div class="row row justify-content-center m-2">
                <h2 class="font-weight-bold">NOTA COMPRA</h2>
            </div>
            <div class="row">
                <div class="col">   
                    <div class="row">
                        <h6 class="font-weight-bold px-2">Compra Registrado por: </h6>
                        <h6>{{DB::table('users')->where('id',$compra->usuarioId)->value('name')}}</h6>
                    </div>
                    <div class="row">
                        <h6 class="font-weight-bold px-2">Fecha de Registro: </h6>
                        <h6>{{$compra->updated_at}}</h6>
                    </div>
                </div>
            </div>
            <div class="row row justify-content-center m-2">
                <h3>DETALLE</h3>
            </div>
            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                          <th scope="col">Producto</th>
                          <th scope="col">Cantidad</th>
                          <th scope="col">Importe</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notas as $nota)
                            <tr>
                                <td>{{DB::table('productos')->where('id',$nota->productoId)->value('nombre')}}</td>
                                <td>{{$nota->cantidad}}</td>
                                <td>{{$nota->montoTotal}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" class="font-weight-bold">Total</td>
                            <td class="font-weight-bold">{{$compra->total}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row justify-content-start">
                <a class="btn btn-warning btn-sm m-2" href="{{url('/compras/')}}">Volver</a>
            </div>    
            
        </div>
    </div>       
</div>

<br>
<br>
@stop