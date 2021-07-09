@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<head>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,900&display=swap" rel="stylesheet">
</head>
<body>
	<!--cliente, proveedor, productos¿,personal-->
	<div class= "container">
		<div class="cabecera"style="display: flex">
	<i class="fas fa-car-side fa-5x" style="color:#111111" > </i>
		<h1 class= "title"> TIENDA DE ACCESORIOS EMI </h1>
	</div>
	<div class="prueba">
	<h2> Bienvenido</h2>
	</div>
	<div class= "menu" >
	
	<div class= "iconos">
	<a href="{{route('clientes.index')}}">
	<i class="fas fa-user-alt fa-7x" style="color:#364542" ></i> 
    </a>
	<h4> Clientes</h4>
	</div>
	
	<div class= "iconos">
		<a href="{{route('proveedores.index')}}">
			<i class="fas fa-dolly fa-7x" style="color:#364542" ></i> 
			</a>
	<h4> Proveedores</h4>
	</div>
	
	<div class= "iconos">
		<a href="{{route('clientes.index')}}">
			<i class="fas fa-box-open fa-7x" style="color:#364542"></i>
			</a>
	<h4> Productos</h4>
	</div>
	
	<div class= "iconos">
		<a href="{{route('personales.index')}}">
			<i class="fas fa-user-tie fa-7x" style="color:#364542" ></i> 
			</a>
	<h4> Personal</h4>
	</div>
	
	
	
</body>


@stop

@section('css')
    <link rel="stylesheet" href="css/home.css">
@stop

@section('js')
   
@stop