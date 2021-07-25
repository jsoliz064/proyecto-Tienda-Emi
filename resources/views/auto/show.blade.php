@extends('adminlte::page')

@section('title', 'Auto')

@section('content_header')
@stop

@section('content')
<div class="container " style="background-color: white">
    <div class="row justify-content-center border rounded-top">
        <div class="col">
            {{-- datos --}}
            <div class="row border"> 
                <div class="col">
                    <div class="row">
                        <h3 class="font-weight-bold px-2">DATOS DEL AUTO</h3>
                    </div>
                    
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Modelo: </h5>
                        <h5>{{$auto->modelo}}</h5>
                    </div>
                  

                    <div class="row">
                        <h5 class="font-weight-bold px-2">Id Marca: </h5>
                        <h5>{{$auto->idMarca}}</h5>
                    </div>



                    <div class="row">
                        <h5 class="font-weight-bold px-2">Descripcion: </h5>
                        <h5>{{$auto->descripcion}}</h5>
                    </div>
                   
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Año: </h5>
                        <h5>{{$auto->año}}</h5>
                    </div>


                    <div class="row">
                        <a href="{{route('autos.index')}}"class="btn btn-warning text-white btn-sm m-2">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>       
</div>

<br>
<br>
@stop