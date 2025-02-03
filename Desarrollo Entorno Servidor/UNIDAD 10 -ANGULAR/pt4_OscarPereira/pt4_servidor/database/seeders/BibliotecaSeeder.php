<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BibliotecaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insertar un autor
        DB::table('autors')->insert([
            'nombre' => 'Autor de Prueba',
            'apellidos' => 'Apellido de Prueba', // Añadir el campo 'apellidos'
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Obtener el id del autor recién insertado
        $autorId = DB::table('autors')->orderBy('id', 'desc')->first()->id;

        // Insertar dos libros para el autor
        DB::table('libros')->insert([
            [
                'titulo' => 'Libro de Prueba 1',
                'autor_id' => $autorId,
                'fechaP' => now(), // Añadir el campo 'fechaP'
                'ventas' => 0, // Añadir el campo 'ventas'
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Libro de Prueba 2',
                'autor_id' => $autorId,
                'fechaP' => now(), // Añadir el campo 'fechaP'
                'ventas' => 0, // Añadir el campo 'ventas'
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
