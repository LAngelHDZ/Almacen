@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
    <p class="text-blue fw-bold ">Producto</p>
@stop
@livewireStyles
@section('content')
<div class=" w-auto mx-5">

    <div class="mt-5">
    
        @livewire('almacen.producto.create-producto')
    </div>
    <div class="mt-2">
    
        @livewire('almacen.producto-insumos')
    </div>
</div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.4/dist/sweetalert2.all.min.js"></script>
<script>
    window.addEventListener('show-form', event =>{
        $('#pro-create').modal('show');
    })

    window.addEventListener('close-form', event =>{
        $('#pro-create').modal('hide');
    })

    window.addEventListener('show-formedit', event =>{
        $('#pro-update').modal('show');
    })

    window.addEventListener('close-formedit', event =>{
        $('#pro-update').modal('hide');
    })

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
@livewireScripts
   
@stop