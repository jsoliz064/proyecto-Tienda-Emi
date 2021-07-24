@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1> Editar Producto</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('productos.update', $producto)}}" novalidate >

            @csrf

            <h5>Categoria:</h5>
            <select name = "idCategoria" id="idCategoria" value="{{$producto->idCategoria}}" class="form-control" onchange="habilitar()" >
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
            <input type="text"  name = "codigo" value="{{$producto->codigo}}" class="focus border-primary  form-control" >
            @error('codigo')
            <p>DEBE INGRESAR EL CODIGO</p>
            @enderror

            <h5>Nombre:</h5>
            <input type="text" name="nombre" value="{{$producto->nombre}}" class="focus border-primary  form-control" >
            @error('nombre')
                <p>DEBE INGRESAR BIEN SU NOMBRE</p>
            @enderror

            <h5>Precio Unitario:</h5>
            <input type="text" name="precioU" value="{{$producto->precioU}}" class="focus border-primary  form-control" >
            @error('precioU')
                <p>DEBE INGRESAR BIEN EL PRECIO UNITARIO</p>
            @enderror

            <h5>Precio por Mayor:</h5>
            <input type="text" name = "precioM" value="{{$producto->precioM}}"  class="focus border-primary  form-control" >
            @error('precioM')
                <p>DEBE INGRESAR BIEN EL PRECIO POR MAYOR</p>
            @enderror
            
            <h5>Costo Promedio:</h5>
            <input type="text" name = "costoPromedio" value="{{$producto->costoPromedio}}"  class="focus border-primary  form-control" >
            @error('costoPromedio')
                <p>DEBE INGRESAR BIEN EL Costo Promedio</p>
            @enderror

            <h5>Descripcion:</h5>
            <input type="text" name = "descripcion" value="{{$producto->descripcion}}" class="focus border-primary  form-control" >

            <h5>Stock:</h5>
            <input type="text" name = "stock" value="{{$producto->stock}}"  class="focus border-primary  form-control" >
            @error('stock')
                <p>DEBE INGRESAR BIEN EL Stock</p>
            @enderror

            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">guardar</button>

            <a href="{{route('productos.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>
    </div>
</div>
@stop
