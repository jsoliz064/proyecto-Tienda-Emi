@extends('adminlte::page')

@section('title', 'Autos')

@section('content_header')
    <h1>Editar Auto</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('autos.update',$auto)}}" novalidate >

            @csrf
            @method('PATCH')
            
            <h5>Modelo:</h5>
            <input type="text"  name="modelo" value="{{$auto->modelo}}" class="focus border-primary  form-control" >
            @error('modelo')
            <p>DEBE INGRESAR BIEN EL MODELO</p>
            @enderror

            <h5>Id Marca:</h5>
            <input type="text"  name="idMarca" value="{{$auto->idMarca}}" class="focus border-primary  form-control" >

            @error('idMarca')
            <p>DEBE INGRESAR BIEN EL ID DE LA MARCA</p>
            @enderror


            <h5>Descripcion:</h5>
            <input type="text" name="descripcion" value="{{$auto->descripcion}}"  class="focus border-primary  form-control" >


            @error('descripcion')
                <p>DEBE INGRESAR BIEN SU TELEFONO</p>
            @enderror

            <h5>Año:</h5>
            <input type="text" name="año" value="{{$auto->año}}" class="focus border-primary  form-control" >


            @error('año')
                <p>DEBE INGRESAR BIEN EL AÑO</p>
            @enderror
            
            
            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Guardar</button>
            <a href="{{route('autos.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form> 

    </div>
</div>
@stop