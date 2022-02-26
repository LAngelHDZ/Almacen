@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <p class="text-blue-500 font-bold text-4xl">Proveedor</p>
@stop
@livewireStyles
@section('content')
<div class="container mx-auto">

    <div class="mb-2">
    
        @livewire('almacen.proveedor.create-proveedor')
    </div>
    <div class="mt-2">
    
        @livewire('almacen.proveedor-insumos')
    </div>
</div>
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    {{-- @livewireScripts --}}
@stop