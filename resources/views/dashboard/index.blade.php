@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<x-header/>
@stop

@section('content')
<div class="flex  flex-col">
    <header>
        <div class="mt-3 text-center">
            <h1 class=" font-bold text-4xl ml-2">Sistema de Gestion de Entrada y Salida de Recursos del Almacen General</h1>
        </div>
    </header>

    <div>
        {{-- <img class="img-fluid" src="{{ asset('img/SSFederal.jpeg') }}" style="opacity:0.1;" alt=""> --}}
    </div>
    <footer class=" h-25 px-2 mx-auto">
        <div class="">
            <img class="img-fluid" src="{{ asset('img/footerimg.jpeg') }}" alt="">
        </div>
    </footer>
</div>
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
