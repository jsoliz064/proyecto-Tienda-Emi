@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<h1>Crear nuevo Rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- la informacion del fomr se la envia al controlador "admin.roles.store" --}}
            {!! Form::open(['route' => 'admin.roles.store']) !!}

                @include('admin.roles.partials.form')
            
                {!! Form::submit('Crear Rol', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}

        </div>
    </div>
@stop
