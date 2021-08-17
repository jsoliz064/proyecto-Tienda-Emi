
@extends('adminlte::page')

@section('title', 'Compatibilidad')

@section('content_header')
    <h1>Compatibilidad</h1>
@stop

@section('content')

<div class="container " style="background-color: white">
    <div class="row justify-content-center border rounded-top">
        <div class="col">
            <div class="row row justify-content-center m-2">
                <h2 class="font-weight-bold">Compatibilidad</h2>
            </div>
             
            <form method="post" action="{{route('compatibilidades.store')}}" novalidate >
                @csrf  
                <div class="row row justify-content-center"> 
                    <div class="col-1">
                        {{-- <input type="hidden"  name="idAuto" value=" {{$compatibilidades->id}}" class="focus border-primary  form-control" > --}}
                    </div>             
                    <div class="col-4">
                        <h5>Auto:</h5>
                        <select name="idAuto" id="idAuto" class="form-control" onchange="habilitar()" >
                            <option value="nulo">Seleccione un auto</option>
                                @foreach ($autos as $auto)
                                    <option value="{{$auto->id}}">
                                        {{$auto->modelo}} 
                                    
                                    </option>
                                @endforeach
                        </select>
                        @error('idAuto')
                            <p>DEBE INGRESAR BIEN EL AUTO</p>
                        @enderror    
                    <div class="col-4">
                        <h5>Producto:</h5>
                        <select name="idProducto" id="idProducto" class="form-control" onchange="habilitar()" >
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
                    <div class="col-4">
                        <h5>Detalle:</h5>
                        <input type="text" value="" name="detalle" class="focus border-primary  form-control" >
        
                        @error('detalle')
                        <p>DEBE INGRESAR EL DETALLE </p>
                        @enderror
                    </div>
                   
                    <div class="col-3 align-items-center">
                        <h5>Nueva Compatibilidad</h5>
                        <button  class="btn btn-primary btn-sm" type="submit">Añadir</button>
                         
                    </div>
                </div>  
            </form>
       
            {{-- <div class="row row justify-content-center m-2">
                <h3>Compatibilidad</h3>
            </div>
            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                          <th scope="col">Producto</th>
                          <th scope="col">Auto</th>
                          <th scope="col">Detalle</th>
                          <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($compatibilidades as $compatibilidad)
                            <tr>
                                <td>{{DB::table('productos')->where('id',$compatibilidad->idProducto)->value('nombre')}}</td>
                                <td>{{$compatibilidad->detalle}}</td>
                                
                                <td>
                                    <form action="{{url('/auto/'.$compatibilidad->id)}}" method="post">
                                      @csrf
                                      @method('delete')
                                      <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" 
                                      value="Borrar"><i class="fas fa-times"></i> </button>
                                    </form>
                                  </td>
                            </tr>
                        @endforeach
                        {{-- <tr>
                            <td colspan="2" class="font-weight-bold">MONTO TOTAL</td>
                            <td class="font-weight-bold">{{$notaCompra->monto}}</td>
                        </tr> 
                    </tbody> 
                </table> 
            </div>
             <div class="row justify-content-end">
                {<form action="{{route('notaCompras.destroy', $notaCompra)}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm m-2" onclick="return confirm('¿ESTA SEGURO DE BORRAR?')" 
                    value="Borrar">Eliminar Compra</button> 
                    <a class="btn btn-success btn-sm m-2" href="{{route('notaCompras.index')}}">Guardar cambios</a> 
                  </form> 
            </div>  --}}
            
        </div> 
    </div>       
</div>
@stop

@section('css')

@stop

@section('js')

@stop


