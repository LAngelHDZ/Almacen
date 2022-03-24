@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <p class="text-blue fw-bold ">Producto</p>
@stop
@livewireStyles
@section('content')
<div class=" w-auto mx-5">
@if(!$view)
<div class="mt-5">
    @livewire('almacen.producto.create-producto')
</div>
<div class="mt-2">
    @livewire('almacen.producto-insumos')
</div>
@else
<div class="bg-white">
    <div class=" pt-2 px-4 flex justify-between">
        <div class="flex ">
            <h3 class="h4 text-bold mr-3">Material: </h3>
            <h4 class="h4">{{$producto[0]->producto}}</h4>
        </div>
        <div class="flex">
            <h3 class="h4 text-bold mr-3">Referencia: </h3>
            <h4 class="h4">{{$producto[0]->clave_producto}}</h4>
        </div>
    </div>
    <div class=" mt-5 flex justify-center">
        <h3 class="h3">Listado de proveedores y precios</h3>
    </div>
    
    @livewire('almacen.producto.precio-producto',['idpro' => $producto[0]->id])
    <div>

        
    </div>
</div>
@endif

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