@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>Asignar un rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre</p>
            <p class="form-control">{{$user->name}}</p>

            <h2 class="h5"> Listado de Roles</h2>
            {{-- {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'put']) !!}
                @foreach ($roles as $role)
                    <div>
                        <label >
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{$role->name}}
                        </label>
                    </div>
                @endforeach
            {!! Form::close() !!} --}}

            {{-- {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary mt-2']) !!} --}}
           
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop