@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="w-75 h-25 px-2 mx-auto">
        <img src="{{ asset('img/Salud.jpg') }}" width="100%" height="25%" alt="">
    </div>
@stop

@section('content')
<div class="mx-2 mt-5 ">
    <div class="pt-2">
    @livewire('almacen.root.table-users')
    </div>
</div>
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
    <script>
         window.addEventListener('show-modal', event =>{
        $('#showinfo').modal('show');
    })
    </script>
@stop