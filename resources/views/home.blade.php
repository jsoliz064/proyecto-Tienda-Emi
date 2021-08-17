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
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,160L14.1,186.7C28.2,213,56,267,85,272C112.9,277,141,235,169,224C197.6,213,226,235,254,208C282.4,181,311,107,339,101.3C367.1,96,395,160,424,202.7C451.8,245,480,267,508,250.7C536.5,235,565,181,593,160C621.2,139,649,149,678,170.7C705.9,192,734,224,762,218.7C790.6,213,819,171,847,170.7C875.3,171,904,213,932,197.3C960,181,988,107,1016,69.3C1044.7,32,1073,32,1101,69.3C1129.4,107,1158,181,1186,208C1214.1,235,1242,213,1271,208C1298.8,203,1327,213,1355,213.3C1383.5,213,1412,203,1426,197.3L1440,192L1440,320L1425.9,320C1411.8,320,1384,320,1355,320C1327.1,320,1299,320,1271,320C1242.4,320,1214,320,1186,320C1157.6,320,1129,320,1101,320C1072.9,320,1045,320,1016,320C988.2,320,960,320,932,320C903.5,320,875,320,847,320C818.8,320,791,320,762,320C734.1,320,706,320,678,320C649.4,320,621,320,593,320C564.7,320,536,320,508,320C480,320,452,320,424,320C395.3,320,367,320,339,320C310.6,320,282,320,254,320C225.9,320,198,320,169,320C141.2,320,113,320,85,320C56.5,320,28,320,14,320L0,320Z"></path></svg>
@stop
   <a href="http://" target="_blank" rel="noopener noreferrer"></a>