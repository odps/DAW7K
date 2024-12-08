<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Cliente;

class CuentaController extends Controller
{
    function list()
    {
        $cuentas = Cuenta::all();
        return view('cuenta.list', ['cuentas' => $cuentas]);
    }

    function new(Request $request)
    {
        if ($request->isMethod('post')) {
// recogemos los campos del formulario en un objeto cuenta
            $cuenta = new Cuenta;
            $cuenta->codigo = $request->codigo;
            $cuenta->saldo = $request->saldo;
            $cuenta->cliente_id = $request->cliente_id;
            $cuenta->save();
            return redirect()->route('cuenta_list')->with('status', 'Nueva cuenta
' . $cuenta->codigo . ' creada!');
        }
// si no venimos de hacer submit al formulario, tenemos que mostrar el formulario

        $clientes = Cliente::all();
        return view('cuenta.new', ['clientes' => $clientes]);
    }

    function delete($id)
    {
        $cuenta = Cuenta::find($id);
        $cuenta->delete();
        return redirect()->route('cuenta_list')->with('status', 'Cuenta
' . $cuenta->codigo . ' eliminada!');
    }
}
