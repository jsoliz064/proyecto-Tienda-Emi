@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Editar Categoria</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('categorias.update',$categoria)}}" novalidate >
            @csrf
            @method('PATCH')
    
            <h5>Nombre:</h5>
            <input type="text" name="nombre" value="{{$categoria->nombre}}"  class="focus border-primary  form-control" >
            @error('nombre')
                <p>DEBE INGRESAR BIEN EL NOMBRE</p>
            @enderror
            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Guardar</button>
            <a href="{{route('categorias.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form> 

    </div>
</div>
@stop