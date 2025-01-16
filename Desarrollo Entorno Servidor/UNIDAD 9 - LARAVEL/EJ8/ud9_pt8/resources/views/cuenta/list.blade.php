@extends('layout')
@section('title', 'Listado de cuentas')
@section('stylesheets')
@parent
@endsection
@section('content')
<h1>Listado de cuentas</h1>
@auth
<a href="{{ route('cuenta_new') }}">+ Nueva cuenta</a>
@endauth
@if (session('status'))
<div>
    <strong>Success!</strong> {{ session('status') }}
</div>
@endif
<table style="margin-top: 20px;margin-bottom: 10px;">
    <thead>
        <tr>
            <th>Código</th>
            <th>Saldo</th>
            <th>Cliente</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cuentas as $cuenta)
        <tr>
            <td>{{ $cuenta->codigo }}</td>
            <td>{{ $cuenta->saldo }}</td>
            <td> @if(@isset($cuenta->cliente))
                {{ $cuenta->cliente->nombreApellidos() }}
                @else
                @endif
            </td>
            @auth
            <td>
                <a href="{{ route('cuenta_delete', ['id' =>
$cuenta->id]) }}">Eliminar</a>

                <a href="{{ route('cuenta_edit', ['id' =>
$cuenta->id]) }}">Editar</a>

            </td>
            @endauth
        </tr>
        @endforeach
    </tbody>
</table>
<br>
@include('layouts.filtro')

@if (request()->has('codigo'))
<div>
    Se esta filtrando por codigo: {{request()->codigo}}
    <br>
    Se esta filtrando por saldo: {{request()->saldo}}
    <br>
    <a href="{{route('cuenta_list')}}">Limpiar Filtro</a>
</div>
@endif
@endsection