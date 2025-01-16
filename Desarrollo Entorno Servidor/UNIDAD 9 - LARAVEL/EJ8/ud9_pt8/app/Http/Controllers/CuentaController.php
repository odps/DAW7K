<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Cliente;

class CuentaController extends Controller
{
    function list()
    {
        $cuentas = Cuenta::orderBy('saldo', 'desc')->get();
        return view('cuenta.list', ['cuentas' => $cuentas]);
    }


    function new(Request $request)
    {
        if ($request->isMethod('post')) {

            $validated = $request->validate([
                'codigo' => 'required|string|unique:cuentas,codigo|max:10',
                'saldo' => 'required',
            ]);

            if ($validated) {
                // recogemos los campos del formulario en un objeto cuenta
                $cuenta = new Cuenta;
                $cuenta->codigo = $request->codigo;
                $cuenta->saldo = $request->saldo;
                $cuenta->cliente_id = $request->cliente_id;
                $cuenta->save();
                return redirect()->route('cuenta_list')->with('status', 'Nueva cuenta
' . $cuenta->codigo . ' creada!');
            }
        }
        // si no venimos de hacer submit al formulario, tenemos que mostrar el formulario

        $clientes = Cliente::all();
        return view('cuenta.new', ['clientes' => $clientes]);
    }

    function edit(Request $request, $id)
    {
        if ($request->isMethod('post')) {

            $cuenta = Cuenta::find($id);

            if ($cuenta) {
                $validated = $request->validate([
                    'codigo' => 'required|string|unique:cuentas,codigo,' . $cuenta->id . '|max:10',
                    'saldo' => 'required',
                ]);

                // Update the cuenta with the validated data
                $cuenta->codigo = $request->codigo;
                $cuenta->saldo = $request->saldo;
                $cuenta->cliente_id = $request->cliente_id;
                $cuenta->save();

                return redirect()->route('cuenta_list')->with('status', 'Cuenta: ' . $cuenta->codigo . ' editada correctamente.');
            } else {
                return redirect()->route('cuenta_list')->with('error', 'Cuenta no encontrada.');
            }
        } else {
            // si no venimos de hacer submit al formulario, tenemos que mostrar el formulario
            $cuenta = Cuenta::find($request->id);

            if ($cuenta) {
                $clientes = Cliente::all();
                return view('cuenta.edit', ['cuenta' => $cuenta, 'clientes' => $clientes]);
            } else {
                return redirect()->route('cuenta_list')->with('error', 'Cuenta no encontrada.');
            }
        }
    }

    function delete($id)
    {
        $cuenta = Cuenta::find($id);
        $cuenta->delete();
        return redirect()->route('cuenta_list')->with('status', 'Cuenta
' . $cuenta->codigo . ' eliminada!');
    }

    function filtro(Request $request)
    {
        $cuentas = [];

        if ($request->has('codigo') && $request->has('saldo')) {

            if ($request->input('filtro') == 'and') {
                $cuentas = Cuenta::buscaCodigoAND($request->input('codigo'), $request->input('saldo'));
            } elseif ($request->input('filtro') == 'or') {
                $cuentas = Cuenta::buscaCodigoOR($request->input('codigo'), $request->input('saldo'));
            }
        } else {
            $cuentas = Cuenta::all();
        }

        return view('cuenta.list', ['cuentas' => $cuentas]);
    }
}
