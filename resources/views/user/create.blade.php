@extends('adminlte::page')

@section('title', 'Personal')

@section('content_header')
<a class="btn btn-secundary" href="{{route('users.index')}}">Volver</a>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="personal" class="col-md-4 col-form-label text-md-right">{{ __('Seleccione Personal') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"> --}}
                                <select name="personales" class="form-control" id="select-personales" >
                                    <option value=0 >Seleccione al personal</option>
                                         @foreach ($personales as $personal)
                                            <option value="{{ $personal->id }}">{{ $personal->nombre}}</option>
                                        @endforeach 
                                </select>    
                            </div>

                        </div>
                        

                        <div class="form-group row">
                            <label for="roles" class="col-md-4 col-form-label text-md-right">{{ __('Seleccione Rol') }}</label>
                            
                            <div class="col-md-6">
                                <select name="roles" class="form-control" id="select-roles" >
                                    {{-- <option value=0 >Seleccione un rol</option> --}}
                                         @foreach ($roles as $rol)
                                            <option value="{{ $rol->id }}">{{ $rol->name}}</option>
                                        @endforeach 
                                </select>    
                            </div>

                        </div>
                            

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-6"> 
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                             </div> 

                            

                           {{--  <div class="col-md-0 offset-md-8"> 
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>  --}}
                          {{--   <button  class="btn btn-primary" type="submit">Registrar</button>
                            <a class="btn btn-primary" href="{{route('users.index')}}">Volver</a>  --}}
                         </div> 
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')

@stop

@section('js')

@stop
