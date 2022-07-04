@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<x-header />


@stop

@section('content')
@if (session('info'))
<div class="alert alert-success">
    <strong>{{ session('info') }}</strong>
</div>

@endif
<div class="card-body">
    <p class="h5 text-bold">Nombre:</p>
    <p class="form-control">{{ $user->name }}</p>

    <h2 class="h2">Listado de roles</h2>
    {!! Form::model($user, ['route'=>['root.user.roleasing',$user], 'method'=>'put']) !!}
    <div class="flex">
        <div >
            <h5 class="mb-3 h5">Rol</h5>
        @foreach ($roles as $role )
            <div>
                <label class="font-normal">

                    {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1']) !!}
                    {{ $role->name }}
                </label>
            </div>

                @endforeach
        </div>


        <div class="ml-4">
            <h5 class="mb-3 h5">Descripción</h5>
            @foreach ($roles as $role )
            <div>

                <label class="bg-gray-100 rounded-full font-light">{{ $role->description }}</label>
            </div>
            @endforeach
        </div>

    </div>
    {!! Form::submit('Asignar rol', ['class'=>'mt-2 bg-primary py-2 px-2 rounded-sm ']) !!}
    {!! Form::close() !!}
</div>
</div>
@stop

@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
<script>
    Livewire.on('alert', function() {
        Swal.fire({
            position: 'top'
            , icon: 'success'
            , title: 'Operacion realizada con exito'
            , showConfirmButton: false
            , timer: 1700
        })
    })

</script>
@stop
