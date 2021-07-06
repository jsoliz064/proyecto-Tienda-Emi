@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

<body>
	
	<div class= "container">
	<div class="prueba">
	<h2 class= "title"> Tienda Emi </h2>
	</div>
	<div class= "menu" >
	
	<div class= "image">
	<img src= "vendor/adminlte/dist/img/img1.jpeg">
    <a href="{{url('/clientes/create')}}">
    </a>
	</div>
	
	<div class= "image">
	<img src= "vendor/adminlte/dist/img/img1.jpeg">
	<a href="{{url('/clientes/create')}}">
	</div>
	
	<div class= "image">
	<img src= "vendor/adminlte/dist/img/img1.jpeg">
    <a href="{{url('/clientes/create')}}">
	</div>
	
	<div class= "image">
	<img src= "vendor/adminlte/dist/img/img1.jpeg">
    <a href="{{url('/clientes/create')}}">
	</div>
	
	<div class= "image">
	<img src= "vendor/adminlte/dist/img/img1.jpeg">
    <a href="{{url('/clientes/create')}}">
	</div>
	
	<div class= "image">
	<img src= "vendor/adminlte/dist/img/img1.jpeg">
    <a href="{{url('/clientes/create')}}">
	</div>
	
	</div>
	
</body>


@stop

@section('css')
    <link rel="stylesheet" href="css/home.css">
@stop

@section('js')
   
@stop