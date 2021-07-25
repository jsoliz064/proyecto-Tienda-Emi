@extends('adminlte::page')

@section('title', 'Auto')

@section('content_header')
    <h1>Registrar Marca</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('marcas.store')}}" novalidate >
 
            @csrf
            <h5>Descripción:</h5>
            <input type="text"  name="descripcion"  class="focus border-primary  form-control">
            @error('descripcion')
                <p>DEBE INGRESAR BIEN LA DESCRIPCIÓN</p>
            @enderror
            
           
            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>

            <a href="{{route('autos.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop

@section('css')

@stop

@section('js')

@stop