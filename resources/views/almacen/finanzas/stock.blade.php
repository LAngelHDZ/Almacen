@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <p class="text-4xl font-bold text-blue">Stock de productos</p>
@stop

@section('content')
    @livewire('almacen.finanzas.stock-productos')
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
<script defer src="https://unpkg.com/alpinejs@3.9.5/dist/cdn.min.js"></script>
<script>
    window.addEventListener('show-form', event =>{
        $('#showreq').modal('show');
    })

    window.addEventListener('close-form', event =>{
        $('#showreq').modal('hide');
    })
</script>
<script src="{{ asset('js/app.js') }}"></script>
@stop