@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<h1>Crear Recibo de Pago</h1>
@stop

@section('content')


<div class="card">
    <div class="card-body">
        <form action="{{ route('reciboPagos.store') }}" method="post">
                @csrf
                
            
            <h5>id plan De Pago :</h5>
            <input type="text"  name="plan_idC"  value ="{{$cuota->plan_id}}" class="focus border-primary  form-control" readonly>
                @error('plan_idC')
                    <span class="text-danger"> {{'seleccionar un Plan de Pago'}}</span>
                @enderror

            <h5>id Cuota :</h5>
            <input type="text"  name="idC"  value ="{{$cuota->id}}" class="focus border-primary  form-control" readonly>
                @error('idC')
                    <span class="text-danger"> {{'seleccionar un Plan de Pago'}}</span>
                @enderror    
            
            <h5>nombre del Pagante :</h5>
            <input type="text"  name="nombre"  value ="" class="focus border-primary  form-control" >
                @error('nombre')
                    <span class="text-danger"> {{'ingrese un nombre'}}</span>
                @enderror    
                 
            
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
            <a href="{{route('reciboPagos.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
            

        </form>   

        <?php
        if(isset($_POST["actualizar"])){
            $paises=$_POST["actualizar"];
        }
        ?>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="css/home.css">
@stop

@section('js')
   
@stop