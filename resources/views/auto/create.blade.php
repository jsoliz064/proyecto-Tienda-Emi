@extends('adminlte::page')

@section('title', 'Auto')

@section('content_header')
    <h1>Registrar Auto</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('autos.store')}}" novalidate >
 
            @csrf
            <h5>Modelo:</h5>
            <input type="text"  name="modelo"  class="focus border-primary  form-control">
            @error('modelo')
                <p>DEBE INGRESAR BIEN EL MODELO</p>
            @enderror

            <h5>Marca:</h5>
            <select name = "idMarca" id="idMarca" class="form-control" onchange="habilitar()" >
                <option value="nulo">Seleccione la marca</option>
                    @foreach ($marcas as $marca)
                        <option value="{{$marca->id}}">
                            {{$marca->descripcion}}
                        </option>
                    @endforeach
            </select>

           
            @error('idMarca')
                <p>DEBE INGRESAR BIEN EL ID DE LA MARCA</p>
            @enderror
            <h5>Descripcion:</h5>
            <input type="text"  name="descripcion" class="focus border-primary  form-control" >
            @error('descripcion')
            <p>DEBE INGRESAR BIEN LA DESCRIPCION</p>
            @enderror


            <h5>Año:</h5>
            <input type="text" name="año"  class="focus border-primary  form-control" >


            @error('año')
                <p>DEBE INGRESAR BIEN EL AÑO</p>
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
