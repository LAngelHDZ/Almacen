@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <p class="text-4xl font-bold text-blue">Prerequisicion</p>
@stop

@section('content')

<div class="container w-75">
    <div class="bg-white border-primary">

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
