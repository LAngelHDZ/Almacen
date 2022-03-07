@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <p class="text-blue font-bold text-4xl">Prerequisicion</p>
@stop

@section('content')

<div class="container w-75">
    <div class="bg-white ">
        <div class=" border-bottom border-primary">
            <p class=" h4  ">Datos requisición</p>
        </div>
        <header class="d-flex justify-content-between border-bottom border-primary">
          
            <div class="pl-3">
                <div class="ml-5">
                    <p class="font-weight-bolder h4">Prefolio: <span class="font-weight-normal h5"> 220306VI</span> </p> 
                </div>
                <div class="ml-5">
                    <p class="font-weight-bolder ">Departamento: <span class="font-weight-normal"> Virología</span></p>
                    <p class="font-weight-bolder ">Empleado: <span class="font-weight-normal"> Luis Angel Cervantes Hernandez</span></p>
                </div>
                <div class="ml-5">
                     
                </div>
            </div>
            <div class=" pr-4">
                <h3 class="font-weight-bolder  h5">Feha: <span class="font-weight-normal h6"> 06/03/2022</span> </h3>
                {{-- <p class="ms-3 h5"></p> --}}
            </div>

        </header>

    </div>

</div>
   
@stop

@section('css')
   
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    
@stop