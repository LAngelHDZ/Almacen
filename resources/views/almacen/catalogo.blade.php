@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <p class="text-blue-500 font-bold text-4xl">Catalogo</p>
@stop

@section('content')

    {{-- <livewire:catalogo-insumos /> --}}
    @livewire('almacen.catalogo-insumos')
@stop

@section('css')
   
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    {{-- @livewireScripts --}}
@stop