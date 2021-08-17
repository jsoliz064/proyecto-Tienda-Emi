@extends('adminlte::page')

@section('title', 'Categoria')

@section('content_header')
    <h1>Registrar Categoria</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('categorias.store')}}" novalidate >
 
            @csrf
            <h5>nombre:</h5>
            <input type="text"  name="nombre"  class="focus border-primary  form-control">
            @error('nombre')
                <p>DEBE INGRESAR BIEN LA CATEGORIA</p>
            @enderror
           
            <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>

            <a href="{{route('categorias.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop

@section('css')

@stop

@section('js')

@stop