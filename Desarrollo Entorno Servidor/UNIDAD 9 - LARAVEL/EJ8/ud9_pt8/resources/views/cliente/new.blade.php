@extends('layout')
@section('title', 'Nuevo Cliente')@section('stylesheets')
@parent
@endsection
@section('content')
<h1>Nuevo Cliente</h1>
<a href="{{ route('cliente_list') }}">&laquo; Volver</a>
<div style="margin-top: 20px">
    <form method="POST" action="{{ route('cliente_new') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="dni">DNI</label>
            <input type="text" name="dni" />
        </div>
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" />
        </div>
        <div>
            <label for="apellido">Apellido</label>
            <input type="text" name="apellidos" />
        </div>
        <div>
            <label for="fechaN">Fecha Nacimiento</label>
            <input type="date" name="fechaN" value="{{ date('Y-m-d') }}" />
        </div>
        <div>
            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" />
        </div>
        @if ($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <button type="submit">Crear Cliente</button>
    </form>
</div>
@endsection