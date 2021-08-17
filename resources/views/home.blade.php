@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')

@stop

@section('content')
<head>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,900&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">

</head>
<body>
	<!--cliente, proveedor, productos¿,personal-->
	<div class= "container">
		<div class="cabecera"style="display: flex">
	<i class="fas fa-car-side fa-5x" style="color:#F7F7F7" > </i>
		<h1 class= "title"> TIENDA DE ACCESORIOS EMI </h1>
	</div>
	<div class="prueba">
	<h2> ACCESOS RAPIDOS</h2>
	</div>
	<div class= "menu" >
	
	<div class= "iconos">
	<a href="{{route('clientes.index')}}">
	<i class="fas fa-user-alt fa-7x" style="color:#364542" ></i> 
    </a>
	<h4>Clientes</h4>
	</div>
	
	<div class= "iconos">
		<a href="{{route('proveedores.index')}}">
			<i class="fas fa-dolly fa-7x" style="color:#364542" ></i> 
			</a>
	<h4> Proveedores</h4>
	</div>
	
	<div class= "iconos">
		<a href="{{route('productos.index')}}">
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
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#970606" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
@stop
   {{-- <a href="http://" target="_blank" rel="noopener noreferrer"></a> --}}