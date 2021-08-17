@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<h1>titulo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('resultados.store') }}">
                @csrf

                <h5>Nombre:</h5>
                <input type="text" name = "actualizar"  class="focus border-primary  form-control" >

              
            
                <br>
                <label for="personal" >{{ ('Fecha Inicial: ') }}</label>
                <input name="fechaInicial" type="date">
                <br>
                
                <br>
                <label for="personal" >{{ 'Fecha Final: ' }}</label>
                <input name="fechaFinal" type="date" class="focus border-primary">
        
                        
                 <br>
                 <br>
                 <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
                 <br>
                 <br>
                 <a href="{{route('resultados.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        
            </form>
        </div>
    </div>

    
    
@stop

@section('css')
    <link rel="stylesheet" href="css/home.css">
@stop

@section('js')
   
@stop