@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="w-75 h-25 px-2 mx-auto">
    <img class="img-fluid" src="{{ asset('img/logoH1.png') }}" alt="">
</div>
@stop

@section('content')
<div class="flex justify-center">
    <h1 class="  text-4xl font-bold">Laboratorio Estatal </h1>
    <h1 class=" inline font-normal text-4xl ml-2">Dr. Galo Soberón y Parra</h1>
</div>
<div class="mt-3 text-center">
    <p class=" font-bold text-3xl ml-2">Sistema de Gestion de Entrada y Salida de Recursos del Almacen General</p>
</div>
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop