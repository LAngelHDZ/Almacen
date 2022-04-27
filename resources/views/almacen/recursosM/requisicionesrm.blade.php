@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <p class="text-4xl font-bold text-blue-500">Requisiciones por atender</p>
@stop

@section('content')
    @livewire('almacen.recursos-m.requisiciones-rh')
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

{{-- <script>
    function actualizar(){
        Livewire.emit('refresh');
    }
    setInterval("actualizar()",3000);
</script> --}}
    {{-- @livewireScripts --}}
    <script src="{{ asset('js/app.js') }}"></script>
@stop
