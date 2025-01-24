<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    // Opción 1: Habilitar mass assignment para todas las columnas
    protected $guarded = [];
    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }
}
