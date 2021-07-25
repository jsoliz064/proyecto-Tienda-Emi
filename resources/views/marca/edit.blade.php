@extends('adminlte::page')

@section('title', 'Marcas')

@section('content_header')
    <h1>Editar Marca</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('marcas.update',$marca)}}" novalidate >

            @csrf
            @method('PATCH')
            

            <h5>Descripcion:</h5>
            <input type="text" name="descripcion" value="{{$marca->descripcion}}"  class="focus border-primary  form-control" >


            @error('descripcion')
                <p>DEBE INGRESAR BIEN LA DESCRIPCION</p>
            @enderror

            
            
            
            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Guardar</button>
            <a href="{{route('marcas.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form> 

    </div>
</div>
@stop