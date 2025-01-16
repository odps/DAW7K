@extends('layout')
@section('title', 'Nueva Cuenta')@section('stylesheets')
@parent
@endsection
@section('content')
<h1>Nueva Cuenta</h1>
<a href="{{ route('cuenta_list') }}">&laquo; Volver</a>
<div style="margin-top: 20px">
    <form method="POST" action="{{ route('cuenta_new') }}">
        @csrf
        <div>
            <label for="codigo">Código</label>
            <input type="text" name="codigo" />
        </div>
        <div>
            <label for="saldo">Saldo</label>
            <input type="number" name="saldo" />
        </div>
        <div>
            <label for="cliente_id">Cliente</label>
            <select name="cliente_id">
                <option value="">-- selecciona un cliente --</option>
                @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}">
                    @if(@isset($cliente))
                    {{ $cliente->nombreApellidos() }}
                    @else
                    @endif
                </option>
                @endforeach
            </select>
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
        <button type="submit">Crear Cuenta</button>
    </form>
</div>
@endsection