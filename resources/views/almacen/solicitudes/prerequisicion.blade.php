@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <p class="text-4xl font-bold text-blue">Prerequisicion</p>
@stop

@section('content')
    <div class="container w-75">
        <div class="bg-white border-primary">
                <div class="mt-2">
                    @livewire('almacen.solictud.pre-solicitud')
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.4/dist/sweetalert2.all.min.js"></script>
<script defer src="https://unpkg.com/alpinejs@3.9.5/dist/cdn.min.js"></script>
  
    <script>
 Livewire.on('alert', function(){
        Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Requisición enviada con exito',
        showConfirmButton: false,
        timer: 1700,
})
 setTimeout( function() {
          window.location.href = "{{ route('h_requisiciones_gral') }}"; }, 1500 );
    })    
     </script>
      <script src="{{ asset('js/app.js') }}"></script>
@stop
