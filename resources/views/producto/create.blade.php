@extends('adminlte::page')

@section('title', 'Producto')

@section('content_header')
    <h1>Registrar Producto</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('productos.store')}}" novalidate >

            @csrf

            <h5>Categoria:</h5>
            <select name = "idCategoria" id="idCategoria" class="form-control" onchange="habilitar()" >
                <option value="nulo">Seleccione una categoria</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}">
                            {{$categoria->nombre}}
                        </option>
                    @endforeach
            </select>

            @error('idCategoria')
            <p>DEBE INGRESAR BIEN LA CATEGORIA</p>
            @enderror

            <h5>Codigo del producto:</h5>
            <input type="text"  name = "codigo" class="focus border-primary  form-control" >
            @error('codigo')
            <p>DEBE INGRESAR EL CODIGO</p>
            @enderror

            <h5>Nombre:</h5>
            <input type="text" name="nombre"  class="focus border-primary  form-control" >
            @error('nombre')
                <p>DEBE INGRESAR BIEN SU NOMBRE</p>
            @enderror

            <h5>Precio Unitario:</h5>
            <input type="text" name="precioU"  class="focus border-primary  form-control" >
            @error('precioU')
                <p>DEBE INGRESAR BIEN EL PRECIO UNITARIO</p>
            @enderror

            <h5>Precio por Mayor:</h5>
            <input type="text" name = "precioM"  class="focus border-primary  form-control" >
            @error('precioM')
                <p>DEBE INGRESAR BIEN EL PRECIO POR MAYOR</p>
            @enderror
            
            <h5>Descripcion:</h5>
            <input type="text" name = "descripcion"  class="focus border-primary  form-control" >

            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>

            <a href="{{route('productos.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop

@section('css')

@stop

@section('js')

@stop
