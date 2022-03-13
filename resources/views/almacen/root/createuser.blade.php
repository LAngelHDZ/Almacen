@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@if(!$view)
<p class="text-blue-500 font-bold text-4xl">Registro de usuario</p>
    @else
    <p class="text-blue-500 font-bold text-4xl">Actualizacion de usuario</p>
    @endif
@stop

@section('content')
<div class="container w-75">
    @if(!$view)
    @livewire('almacen.root.form-users',['viewer' => $view])
    @else
    @livewire('almacen.root.form-users',['viewer' => $view, 'id_user' => $id])
    @endif


</div>
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