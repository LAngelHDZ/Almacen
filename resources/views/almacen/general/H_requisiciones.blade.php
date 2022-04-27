@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <p class="text-4xl font-bold text-blue">Historial de solicitudes</p>
@stop

@section('content')
    <div class="container w-75">
        <div class="bg-white border-primary">
                <div class="mt-2">
                    @livewire('almacen.general.historial-requisiciones')
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
<script defer src="https://unpkg.com/alpinejs@3.9.5/dist/cdn.min.js"></script>

<script src="{{ asset('js/app.js') }}"></script>
@stop