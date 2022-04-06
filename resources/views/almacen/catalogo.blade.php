@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <p class="text-4xl font-bold text-blue-500">Catalogo</p>
@stop

@section('content')
    @livewire('almacen.catalogo-insumos')
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
<script defer src="https://unpkg.com/alpinejs@3.9.5/dist/cdn.min.js"></script>

    @livewireScripts
@stop
