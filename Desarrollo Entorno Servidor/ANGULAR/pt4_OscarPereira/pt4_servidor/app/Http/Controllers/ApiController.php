<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Autor;

class ApiController extends Controller
{
    public function getLibros()
    {
        return Libro::with('autor')->get();
    }
    public function updateLibro(Request $request, $id)
    {
        //hay que poner en la peticion PUT el Header field:
        //Content-Type = application/x-www-form-urlencoded
        $libro = Libro::find($id);
        $libro->update($request->all());
        return $libro;
    }
    public function getLibro($id)
    {
        return Libro::find($id);
    }

    public function getAutores()
    {
        return Autor::all();
    }

    public function getAutor($id)
    {
        return Autor::find($id);
    }

    // POST
    public function createLibro(Request $request)
    {
        return Libro::create($request->all());
    }

    public function createAutor(Request $request)
    {
        return Autor::create($request->all());
    }

    // PUT
    public function updateAutor(Request $request, $id)
    {
        $autor = Autor::find($id);
        $autor->update($request->all());
        return $autor;
    }

    // DELETE
    public function deleteLibro($id)
    {
        $libro = Libro::find($id);
        $libro->delete();
        return response()->json(['message' => 'Libro eliminado con éxito']);
    }

    public function deleteAutor($id)
    {
        $autor = Autor::find($id);
        $autor->delete();
        return response()->json(['message' => 'Autor eliminado con éxito']);
    }
}
