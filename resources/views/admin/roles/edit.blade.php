@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<h1>Editar Rol</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif
    
    <div class="card">
        <div class="card-body">

            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}
            
                @include('admin.roles.partials.form')

            {!! Form::submit('Actualizar Rol', ['class' => 'btn btn-primary']) !!}
            <a href="{{route('admin.roles.index')}}"class="btn btn-warning mt-2">Volver</a>
            {!! Form::close() !!}
        </div>
    </div>
@stop
