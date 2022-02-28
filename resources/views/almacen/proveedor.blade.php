@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <p class="text-blue fw-bold ">Proveedor</p>
@stop
@livewireStyles
@section('content')
<div class=" w-auto mx-5">

    <div class="mt-5">
    
        @livewire('almacen.proveedor.create-proveedor')
    </div>
    <div class="mt-2">
    
        @livewire('almacen.proveedor-insumos')
    </div>
</div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
@stop

@section('js')
<script>
    window.addEventListener('show-form', event =>{
        $('#form').modal('show');
    })
</script>

   
@stop