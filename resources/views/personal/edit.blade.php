@extends('adminlte::page')

@section('title', 'Personal')

@section('content_header')
    <h1>Editar Personal</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('personales.update',$personale)}}" novalidate >

            @csrf
            @method('PATCH')
            
            <h5>Carnet de Identidad:</h5>
            <input type="text"  name="ci" value="{{$personale->ci}}" class="focus border-primary  form-control" >
            @error('ci')
            <p>DEBE INGRESAR BIEN EL CI</p>
            @enderror

            <h5>Nombre Completo:</h5>
            <input type="text"  name="nombre" value="{{$personale->nombre}}" class="focus border-primary  form-control" >

            @error('nombre')
            <p>DEBE INGRESAR BIEN SU NOMBRE</p>
            @enderror

         <div class="form-group">
            <h5>Sexo:</h5>
            <select name="sexo" id="select-sexo"  class="focus border-primary  form-control">
                <option value="{{$personale->sexo}}">{{$personale->sexo}}</option>
                <option value="F">Femenino</option>
                <option value="M">Masculino</option>
            </select>

            @error('sexo')
                <p>DEBE INGRESAR BIEN SU SEXO</p>
            @enderror
         </div>

            <h5>Telefono:</h5>
            <input type="text" name="telefono" value="{{$personale->telefono}}"  class="focus border-primary  form-control" >


            @error('telefono')
                <p>DEBE INGRESAR BIEN SU TELEFONO</p>
            @enderror

            <h5>Email:</h5>
            <input type="text" name="email" value="{{$personale->email}}" class="focus border-primary  form-control" >


            @error('email')
                <p>DEBE INGRESAR BIEN SU EMAIL</p>
            @enderror
            
            <h5>Domicilio:</h5>
            <input type="text" name="domicilio" value="{{$personale->domicilio}}" class="focus border-primary  form-control" >


            @error('direccion')
                <p>DEBE INGRESAR BIEN SU DOMICILIO</p>
            @enderror 
            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Guardar</button>
            <a href="{{route('personales.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form> 

    </div>
</div>
@stop