@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>Actualizar datos</h1>
@stop

@section('content')
    
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            
            {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'put']) !!}
                @csrf
                @method('PATCH')

                <div class="form-group col-md-6">
                    <label for="name">Ingrese el nombre de usuario</label>
                    <input  name="name" type="text" class="form-control" value="{{old('name', $user->name)}}" id="name">
                    @error('name')
                        <small>{{$message}}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="check_password">Nueva contraseña</label>
                    {{-- <input type="checkbox" name="activar-contraseña" id="check_password" onclick="cambiarEstado()" > --}}
                    <input type="password" name="password" class="form-control" value="{{old('password')}}" id="passwordInput" placeholder="Escriba si modificara ">
                    @error('password')
                        <small>{{$message}}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="name">Nuevo email</label>
                    <input   type="text" name="email" class="form-control" value="{{old('email', $user->email)}}" id="email">
                    @error('email')
                        <small>{{$message}}</small>
                        <br><br>
                    @enderror
                </div>
                
                {{-- @foreach ($roles as $role)
                    <div>
                        <label >
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{$role->name}}
                        </label>
                    </div>
                @endforeach --}}
                {{-- <h2 class="h5"> Seleccione un Rol</h2> --}}
                <label for="name">Seleccione un Rol</label>
                <select name="roles" class="form-control col-md-6" id="select-roles" >
                       <option value=0 >Seleccione Rol</option>
                         @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name}}</option>
                        @endforeach 
                </select>
                

                <label for="name">Seleccione un personal</label>
                <select name="personales" class="form-control" id="select-personales" >
                    <option value=0 >Seleccione al personal</option>
                         @foreach ($personales as $personal)
                            <option value="{{ $personal->id }}">{{ $personal->nombre}}</option>
                        @endforeach 
                </select>

            {!! Form::submit('Actualizar Usuario', ['class' => 'btn btn-primary mt-2']) !!}
            <a href="{{route('users.index')}}"class="btn btn-warning mt-2">Volver</a> 
            {{-- {!! Form::close() !!}        --}}
        </div>
    </div>

    <script> 
    var contra = document.getElementById('passwordInput');

    function cambiarEstado(){
        if(contra.disabled == true){
            contra.disabled = false
        if(contra.disabled == false){
            contra.disabled = true
            contra.value = ''
        }
    }
    </script>


@stop

@section('css')

@stop

@section('js')

@stop