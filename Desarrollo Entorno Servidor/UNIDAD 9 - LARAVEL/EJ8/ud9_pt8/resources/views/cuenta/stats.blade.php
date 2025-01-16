@extends('layout')
@section('title', 'Estadisticas')
@section('stylesheets')
@parent
@endsection
@section('content')
<h1>Estadisticas</h1>
@if (session('status'))
<div>
    <strong>Success!</strong> {{ session('status') }}
</div>
@endif
<h1>Cuenta con mayor saldo</h1>
<table style="margin-top: 20px;margin-bottom: 10px;">
    <thead>
        <tr>
            <th>Código</th>
            <th>Saldo</th>
            <th>Cliente</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $maxCuenta->codigo }}</td>
            <td>{{ $maxCuenta->saldo }}</td>
            <td> @if(@isset($maxCuenta->cliente))
                {{ $maxCuenta->cliente->nombreApellidos() }}
                @else
                @endif
            </td>
        </tr>
    </tbody>
</table>
<br>
<h1>Cuenta con menor saldo</h1>
<table style="margin-top: 20px;margin-bottom: 10px;">
    <thead>
        <tr>
            <th>Código</th>
            <th>Saldo</th>
            <th>Cliente</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $minCuenta->codigo }}</td>
            <td>{{ $minCuenta->saldo }}</td>
            <td> @if(@isset($minCuenta->cliente))
                {{ $minCuenta->cliente->nombreApellidos() }}
                @else
                @endif
            </td>
        </tr>
    </tbody>
</table>
<br>
<h1>Cuentas</h1>
<table style="margin-top: 20px;margin-bottom: 10px;">
    <thead>
        <tr>
            <th>Numero de cuentas</th>
            <th>Saldo Promedio</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$totalCuentas}}</td>
            <td>{{$saldoPromedio}}</td>
        </tr>
    </tbody>
</table>
<br>
@endsection