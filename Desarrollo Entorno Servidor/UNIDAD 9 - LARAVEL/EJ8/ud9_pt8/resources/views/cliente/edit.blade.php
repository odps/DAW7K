@extends('layout')
@section('title', 'Editar Cliente')@section('stylesheets')
@parent
@endsection
@section('content')
<h1>Editar Cliente</h1>
<a href="{{ route('cliente_list') }}">&laquo; Volver</a>
<div style="margin-top: 20px">
    <form method="POST" action="{{ route('cliente_edit', ['id' => $cliente->id]) }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="dni">DNI</label>
            <input type="text" name="dni" value="{{ $cliente->dni }}" />
        </div>
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value="{{ $cliente->nombre }}" />
        </div>
        <div>
            <label for="apellido">Apellido</label>
            <input type="text" name="apellidos" value="{{ $cliente->apellidos }}" />
        </div>
        <div>
            <label for="fechaN">Fecha Nacimiento</label>
            <input type="date" name="fechaN" value="{{ $cliente->fechaN }}" />
        </div>
        <div>
            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" />
        </div>
        @if($cliente->imagen)
        <div>
            <h3>Imagen Actual</h3>
            <img src="{{ asset('uploads/imagenes/' . $cliente->imagen) }}" alt="client_image" width="250" height="200">
            <br><label for="borrar">Deseo borrar la imagen.</label>
            <input type="checkbox" name="borrar">
        </div>
        @endif
        @if ($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <br><button type="submit">Editar Cliente</button>
    </form>
</div>
@endsection