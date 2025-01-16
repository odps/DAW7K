@extends('layout')
@section('title', 'Listado de clientes')
@section('stylesheets')
@parent
@endsection
@section('content')
<h1>Listado de clientes</h1>
@auth
<a href="{{ route('cliente_new') }}">+ Nuevo Cliente</a>
@endauth
@if (session('status'))
<div>
    <strong>Success!</strong> {{ session('status') }}
</div>
@endif
<table style="margin-top: 20px;margin-bottom: 10px;">
    <thead>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Fecha Nacimiento</th>
            <th>Imagen</th>
            <th>Cantidad<br>Cuentas</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
        <tr>
            <td>{{ $cliente->dni }}</td>
            <td>{{ $cliente->nombreApellidos() }}</td>
            <td> {{$cliente->getFechaN()}}</td>
            <td><img src="{{ asset('uploads/imagenes/' . $cliente->imagen) }}" alt="client_image" width="250" height="200"></td>
            <td> {{$cliente->numCuentas()}}</td>
            @auth
            <td>
                <a href="{{ route('cliente_delete', ['id' => $cliente->id]) }}">Eliminar</a>
                <a href="{{ route('cliente_edit', ['id' => $cliente->id]) }}">Editar</a>
            </td>
            @endauth
        </tr>
        @endforeach
    </tbody>
</table>
@endsection