@extends('adminlte::page')

@section('title', 'Pago')

@section('content_header')
<h1>Cuotas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('cuotas.store') }}" method="post">
                {{-- <form action="{{ route('cuotas.store') }}" method="post"> --}}
                    @csrf
                    @method('PATCH')
    
                    <h5>Plan de Pago:</h5>
                    <select name="actualizar"  id="idProducto" class="form-control"   >
                        
                        {{-- value="" <=> value=null  --}}
                        <option action="{{ route('cuotas.store') }}" method="post" value="">Seleccione Plan De Pago</option>
                
                            @foreach ($planes as $plan)
                                <option value="{{$plan->id}}">  {{$plan->id}}  </option>
                            @endforeach
                    </select>      
                              {{-- monto_Couta --}}
                {{-- </form>    --}}
                
                <h5>Plan De Pago</h5>
                <input type="text"  name="plan_id"  value ="{{1}}" class="focus border-primary  form-control" readonly>
                    @error('plan_id')
                        <span class="text-danger"> {{'Hay un plan de pago Existente'}}</span>
                    @enderror

            </form>   

            
        </div>
    </div>        
@stop

@section('css')
    <link rel="stylesheet" href="css/home.css">
@stop

@section('js')
   
@stop