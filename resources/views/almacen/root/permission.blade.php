@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<x-header/>


@stop

@section('content')

@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
    <script> 
    Livewire.on('alert', function(){
        Swal.fire({
        position: 'top',
        icon: 'success',
        title: 'Operacion realizada con exito',
        showConfirmButton: false,
        timer: 1700
})
    })
    
    </script>
@stop