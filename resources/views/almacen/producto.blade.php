@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <p class="text-blue fw-bold ">Producto</p>
@stop
@livewireStyles
@section('content')
<div class="w-auto mx-5 ">
@if(!$view)
<div class="pt-2">
    @livewire('almacen.producto-insumos')
</div>
@else
<div class="bg-white">
    <div class="flex justify-between px-4 pt-2 ">
        <div class="flex ">
            <h3 class="mr-3 h4 text-bold">Material: </h3>
            <h4 class="h4">{{$producto[0]->producto}}</h4>
        </div>
        <div class="flex">
            <h3 class="mr-3 h4 text-bold">Referencia: </h3>
            <h4 class="h4">{{$producto[0]->clave_producto}}</h4>
        </div>
    </div>
    <div class="flex justify-center mt-5 ">
        <h3 class="h3">Alta de proveedores y precios</h3>
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

    function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

</script>
<script defer src="https://unpkg.com/alpinejs@3.9.5/dist/cdn.min.js"></script>
@livewireScripts

@stop
