@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <p class="text-blue-500 font-bold text-4xl">Proveedor</p>
@stop

@section('content')
    @livewire('almacen.proveedor-insumos')
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop