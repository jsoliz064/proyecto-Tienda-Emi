@extends('adminlte::page')

@section('title', 'Pago')

@section('content_header')
<h1>Cuotas</h1>
@stop

@section('content')

   <?php
    if( empty($planPago)){ //la variable esta vacia
        $monto = "";
        $nroCuota = "";
        $idPlan = "";
    } else{
        $monto = $planPago->monto_cuota;
        $nroCuota = ($planPago->cuotas_pagadas) + 1;
        $idPlan = $planPago->id;
    }
   ?>
   
   <div class="card">
        <div class="card-body">
            <form action="{{ route('cuotas.store') }}" method="post">
                    @csrf
                    {{-- <h5>Plan de Pago:</h5>
                    <select   name="actualizar"  class="form-control" onchange="this.form.submit()">             
                        <?php //value="" <=> value=null  ?>
                        <option value="">Seleccione Plan De Pago</option>
                            @foreach ($planes as $plan)
                                <option value="{{$plan->id}}" >  {{$plan->id}}  </option>
                            @endforeach
                    </select>  --}}
                
                <h5>Plan De Pago</h5>
                <input type="text"  name="plan_id"  value ="{{$idPlan}}" class="focus border-primary  form-control" readonly>
                    @error('plan_id')
                        <span class="text-danger"> {{'seleccionar un Plan de Pago'}}</span>
                    @enderror
                
                <h5>Monto</h5>
                {{-- <input type="text"  name="monto"  value ="{{DB::table('plan_pagos')->where('id', $planPago)->value('monto')}}" class="focus border-primary  form-control" readonly> --}}
                <input type="text"  name="monto"  value ="{{$monto}}" class="focus border-primary  form-control" readonly>
                    @error('monto')
                        <span class="text-danger"> {{'Hay un plan de pago Existente'}}</span>
                    @enderror
                
                <h5>Nro de Cuota</h5>
                <input type="text"  name="nro_cuota"  value ="{{$nroCuota}}" class="focus border-primary  form-control" readonly>
                    @error('monto')
                        <span class="text-danger"> {{'Hay un plan de pago Existente'}}</span>
                    @enderror    
                
                    <br>
                <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
                <a href="{{route('cuotas.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
                

            </form>   

            <?php
            if(isset($_POST["actualizar"])){
                $paises=$_POST["actualizar"];
            }
            ?>
        </div>
    </div>   
    


    <script language="javascript">

        function activa_boton(campo,boton){
           if (campo.value != ""){
               boton.disabled=false;
           } else {
               boton.disabled=true;
           }
        }

        function makeDisable(){
            var x=document.getElementById("mySelect2");
            x.disabled=true
        }
        document.getElementById("fecha").value = 'soy darwin'
        //document.write('darwin');
    </script>  
@stop

@section('css')
    <link rel="stylesheet" href="css/home.css">
@stop

@section('js')



@stop