@extends('adminlte::page')

@section('title', 'Compra')

@section('content_header')
    <h1>Detalle de Venta</h1>
@stop

@section('content')

<div class="container " style="background-color: white">
    <div class="row justify-content-center border rounded-top">
        <div class="col">
            <div class="row row justify-content-center m-2">
                <h2 class="font-weight-bold">DETALLE VENTA</h2>
            </div>
             
            <form method="post" action="{{route('detalleVentas.store')}}" novalidate >
                @csrf  
                <div class="row row justify-content-center"> 
                    <div class="col-1">
                        <input type="hidden"  name="NotaVenta_id" value=" {{$notaVenta->id}}" class="focus border-primary  form-control" >
                    </div>                 
                    <div class="col-4">
                        <h5>Producto:</h5>
                        <select name="producto_id" id="producto_id" class="form-control" onchange="habilitar()" >
                            <option value="nulo">Seleccione un producto</option>
                                @foreach ($productos as $producto)
                                    <option value="{{$producto->id}}">
                                        {{$producto->nombre}}
                                    </option>
                                @endforeach
                        </select>
                        @error('idProducto')
                            <p>DEBE INGRESAR BIEN EL PRODUCTO</p>
                        @enderror
                    </div>
                    <div class="col-1">
                        <h5>Bs:</h5>
                        <input type="txt" value="{{$producto->precioU}}" name="costo" class="focus border-primary  form-control" >
        
                        @error('costo')
                        <p>DEBE INGRESAR EL PRECIO </p>
                        @enderror
                    </div>
                    <div class="col-2">
                        <h5>Cantidad:</h5>
                        <input type="number" value="1" name="cantidad" class="focus border-primary  form-control" >
        
                        @error('cantidad')
                        <p>DEBE INGRESAR LA CANTIDAD</p>
                        @enderror
                    </div>
                    <div class="col-3 align-items-center">
                        <h5>Carrito</h5>
                        <button  class="btn btn-primary btn-sm" type="submit">Añadir</button>
                      
                    </div>
                </div>  
            </form>
            <div class="row row justify-content-center m-2">
                <h3>DETALLE</h3>
            </div>
            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                          <th scope="col">Producto</th>
                          <th scope="col">Cantidad</th>
                          <th scope="col">Importe</th>
                          <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($notas as $nota)
                            <tr>
                                <td>{{DB::table('productos')->where('id',$nota->producto_id)->value('nombre')}}</td>
                                <td>{{$nota->cantidad}}</td>
                                <td>{{$nota->importe}}</td>
                                <td>
                                    <form action="{{route('detalleVentas.destroy',$nota->id)}}" method="post">
                                      @csrf
                                      @method('delete')
                                      <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" 
                                      value="Borrar"><i class="fas fa-times"></i> </button>
                                    </form>
                                  </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" class="font-weight-bold">MONTO TOTAL</td>
                            <td class="font-weight-bold">{{$notaVenta->importe}}</td>
                        </tr>
                    </tbody> 
                </table> 
            </div>
             <div class="row justify-content-end">
                <form action="{{route('notaVentas.destroy', $notaVenta)}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm m-2" onclick="return confirm('¿ESTA SEGURO DE BORRAR?')" 
                    value="Borrar">Eliminar Venta</button> 
                    <a class="btn btn-success btn-sm m-2" href="{{route('notaVentas.index')}}">Guardar cambios</a> 
                  </form>
            </div> 
            
        </div>
    </div>       
</div>
@stop

@section('css')

@stop

@section('js')

@stop
