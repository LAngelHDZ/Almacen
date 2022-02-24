@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <p class="text-red-500 font-bold text-4xl">Dashboard</p>
@stop

@section('content')
    <p class=" text-blue-500 text-3xl font-bold">Welcome  beautiful admin panel.</p>
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop