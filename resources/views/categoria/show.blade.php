@extends('adminlte::page')

@section('title', 'Categoria')

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
                        <h3 class="font-weight-bold px-2">CATEGORIA</h3>
                    </div>
                       
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Id Categoria: </h5>
                        <h5>{{$categoria->id}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Nombre Categoria: </h5>
                        <h5>{{$categoria->nombre}}</h5>
                    </div>
                   


                    <div class="row">
                        <a href="{{route('categorias.index')}}"class="btn btn-warning text-white btn-sm m-2">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>       
</div>

<br>
<br>
@stop