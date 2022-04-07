@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <p class="text-4xl font-bold text-blue">Prerequisicion</p>
@stop

@section('content')

<div class="container w-75">
    <div class="bg-white border-primary">
        <div class="pt-2 mb-3">
            <div class=" border-bottom border-primary">
                <p class="mb-0 ml-3 h4">Datos requisición</p>
            </div>

            <div class="d-flex justify-content-between ">

                <div class="pl-3">
                    <div class="ml-5 ">
                        <p class="mb-0 font-weight-bolder h4">Prefolio: <span class="font-weight-normal h5"> {{$prefolio }}</span> </p>
                    </div>
                    <div class="ml-5">
                        <p class="mb-0 font-weight-bolder ">Departamento: <span class="font-weight-normal"> {{ $usuario[0]->departamento }}</span></p>
                        <p class="mb-0 font-weight-bolder">Empleado: <span class="font-weight-normal">  {{ auth()->user()->name }}</span></p>
                    </div>
                </div>
                <div class="pr-4 ">
                    <h3 class="font-weight-bolder h5">Fecha: <span class="font-weight-normal h6"> {{ $fecha }}</span> </h3>
                    {{-- <p class="ms-3 h5"></p> --}}
                </div>
            </div>
        </div>
        <div class="mb-3">
            <div class="border-bottom border-primary">
                <p class="mb-0 ml-3 h4">Productos a solicitar</p>
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
