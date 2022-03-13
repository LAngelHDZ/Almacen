@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <p class="text-blue-500 font-bold text-4xl">Panel de usuarios</p>
@stop

@section('content')
<div class="mx-2 mt-5 ">
    <div class=" d-flex justify-content-between">
        <div>
             <i class="fa fa-search mr-1"> </i><input type="text" >
        </div> 
        <div>
            <a href="{{route('formusers')}}" class="btn btn-success"> <i class="fa fa-plus-circle  mr-1"></i>Nuevo usuario</a>
        </div>
        
    </div>

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