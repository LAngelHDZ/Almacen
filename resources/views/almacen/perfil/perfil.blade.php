@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<x-header/>
@stop

@section('content')
<div class="">
    @livewire('almacen.perfil.perfil-user')
</div>
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
