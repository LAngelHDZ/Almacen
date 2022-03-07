@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <p class="text-blue h2">Prerequisición</p>
@stop

@section('content')

<div class="container w-75">
    <div class="bg-white border-primary">
        <div class="mb-3 pt-2">    
            <div class=" border-bottom border-primary">
                <p class="h4 ml-3 mb-0">Datos requisición</p>
            </div>    
           
            <div class="d-flex justify-content-between ">

                <div class="pl-3">
                    <div class="ml-5 ">
                        <p class="font-weight-bolder h4 mb-0">Prefolio: <span class="font-weight-normal h5"> 220306VI</span> </p> 
                    </div>
                    <div class="ml-5">
                        <p class="font-weight-bolder mb-0 ">Departamento: <span class="font-weight-normal"> Virología</span></p>
                        <p class="font-weight-bolder mb-0">Empleado: <span class="font-weight-normal"> Luis Angel Cervantes Hernandez</span></p>
                    </div>
                </div>
                <div class=" pr-4">
                    <h3 class="font-weight-bolder  h5">Feha: <span class="font-weight-normal h6"> 06/03/2022</span> </h3>
                    {{-- <p class="ms-3 h5"></p> --}}
                </div>
            </div>
        </div>
        <div class="mb-3">
            <div class="border-bottom border-primary">
                <p class="h4 ml-3 mb-0">Productos a solicitar</p>
            </div>
            <div class="mt-2">
                @livewire('almacen.solictud.pre-solicitud')
            </div>
        </div>
    </div>
    <div>
        <button class="btn btn-success">Solicitar requisicion</button>
    </div>

</div>
   
@stop

@section('css')
   
     <link rel="stylesheet" href="{{ asset('css/app.css')">  
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    
@stop