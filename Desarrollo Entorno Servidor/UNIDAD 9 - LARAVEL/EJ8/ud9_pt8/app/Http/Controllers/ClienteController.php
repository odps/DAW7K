<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\File;

class ClienteController extends Controller
{
    function list()
    {
        $clientes = Cliente::all();
        return view('cliente.list', ['clientes' => $clientes]);
    }

    function new(Request $request)
    {
        if ($request->isMethod('post')) {

            $validated = $request->validate([
                'dni' => 'required|string|size:9|unique:clientes,dni',
                'nombre' => 'required|string',
                'apellidos' => 'required|string',
                'fechaN' => 'required|date|before_or_equal:today',
            ]);

            // Recogemos los campos del formulario en un objeto cliente
            $cliente = new Cliente;
            $cliente->dni = $request->dni;
            $cliente->nombre = $request->nombre;
            $cliente->apellidos = $request->apellidos;
            $cliente->fechaN = $request->fechaN;

            if ($request->file('imagen')) {
                $file = $request->file('imagen');
                $filename = $cliente->nombreApellidos() . "_" . uniqid() . "." . $file->getClientOriginalExtension();
                // guardamos en una variable $filename el nombre que pondremos al fichero
                $file->move(public_path('uploads/imagenes'), $filename);
                $cliente->imagen = $filename;
            }

            // Guardamos los datos de cliente en la BB.DD
            $cliente->save();
            return redirect()->route('cliente_list')->with('status', 'Nuevo cliente
' . $cliente->nombreApellidos() . ' creado!');
        }
        // si no venimos de hacer submit al formulario, tenemos que mostrar el formulario
        $clientes = Cliente::all();
        return view('cliente.new', ['clientes' => $clientes]);
    }

    function edit(Request $request, $id)
    {
        if ($request->isMethod('post')) {

            $validated = $request->validate([
                'dni' => 'required|string|size:9|unique:clientes,dni,' . $id,
                'nombre' => 'required|string',
                'apellidos' => 'required|string',
                'fechaN' => 'required|date|before_or_equal:today',
            ]);

            $cliente = Cliente::find($id);
            // recogemos los campos del formulario en un objeto cliente
            $cliente->dni = $request->dni;
            $cliente->nombre = $request->nombre;
            $cliente->apellidos = $request->apellidos;
            $cliente->fechaN = $request->fechaN;

            if ($request->file('imagen')) {
                $file = $request->file('imagen');
                $filename = $cliente->nombreApellidos() . "_" . uniqid() . "." . $file->getClientOriginalExtension();
                // guardamos en una variable $filename el nombre que pondremos al fichero
                $file->move(public_path('uploads/imagenes'), $filename);
                $cliente->imagen = $filename;
            }

            if (isset($request->borrar)) {
                if ($cliente->imagen) {
                    File::delete(public_path('uploads/imagenes/' . $cliente->imagen));
                    $cliente->imagen = null;
                }
            }



            if ($cliente) {
                $cliente->save();
                return redirect()->route('cliente_list')->with('status', 'Cliente: ' . $cliente->nombreApellidos() . ' editado correctamente.');
            } else {
                return redirect()->route('cliente_list')->with('error', 'Cliente no encontrado.');
            }
        } else {
            // si no venimos de hacer submit al formulario, tenemos que mostrar el formulario
            $cliente = Cliente::find($id);

            if ($cliente) {
                return view('cliente.edit', ['cliente' => $cliente]);
            } else {
                return redirect()->route('cliente_list')->with('error', 'Cliente no encontrado.');
            }
        }
    }

    function delete($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->route('cliente_list')->with('status', 'Cliente
' . $cliente->nombreApellidos() . ' eliminado!');
    }
}
