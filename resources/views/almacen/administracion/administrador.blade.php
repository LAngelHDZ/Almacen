@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<x-header/>
@stop

@section('content')
    @livewire('almacen.administracion.administrador-requisiciones')
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

    window.addEventListener('show-formr', event =>{
        $('#showrec').modal('show');
    })

    window.addEventListener('close-formr', event =>{
        $('#showrec').modal('hide');
    })
</script>
<script src="{{ asset('js/app.js') }}"></script>
@stop