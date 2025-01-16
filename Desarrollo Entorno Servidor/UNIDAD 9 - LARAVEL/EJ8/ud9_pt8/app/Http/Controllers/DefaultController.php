<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;

class DefaultController extends Controller
{
    function home()
    {
        return view('default.home');
    }
    function stats()
    {
        $maxCuenta = Cuenta::orderBy('saldo', 'desc')->first();
        $minCuenta = Cuenta::orderBy('saldo', 'asc')->first();
        $totalCuentas = Cuenta::count();
        $saldoPromedio = Cuenta::avg('saldo');

        return view('cuenta.stats', [
            'maxCuenta' => $maxCuenta,
            'minCuenta' => $minCuenta,
            'totalCuentas' => $totalCuentas,
            'saldoPromedio' => $saldoPromedio
        ]);
    }
}
