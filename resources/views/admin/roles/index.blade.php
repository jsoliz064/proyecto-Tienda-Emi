@extends('adminlte::page')

@section('title', 'roles')

@section('content_header')
    <h1>Lista de Roles</h1>
@stop

@section('content')
    {{-- mensage de alerta --}}
    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            {{-- solo los que tienen permiso a esas rutas.metodo podran ver el button --}}
            @can('clientes.create')
                <a class="btn btn-primary btb-sm " href="{{ route('admin.roles.create') }}">Registrar Rol</a>
            @endcan
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <table class="table table-striped" id="clientes">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        {{-- <th scope="col" colspan="2"></th> --}}
                        <th scope="col"></th>
                        <th scope="col"></th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>

                            <td width="10px">
                                {{-- @can('roles.edit') --}}
                                <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-sm btn-primary">Editar</a>
                                {{-- @endcan --}}
                            </td>

                            <td width="10px">
                                {{-- @can('roles.destroy') --}}
                                <form action="{{ route('admin.roles.destroy', $role) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')"
                                    value="Borrar">Eliminar</button>
                                </form>
                                {{-- @endcan --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#clientes').DataTable();
        });
    </script>
@stop
