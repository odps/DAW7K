<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTime;


class Cliente extends Model
{

    public function nombreApellidos()
    {
        return $this->nombre . " " . $this->apellidos;
    }


    public function getFechaN()
    {
        $date = new DateTime($this->fechaN);
        return $date->format('d-m-Y');
    }

    public function cuentas()
    {
        return $this->hasMany(Cuenta::class);
    }
    public function numCuentas()
    {
        return $this->hasMany(Cuenta::class)->count();
    }
}
