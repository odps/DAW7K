<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public static function buscaCodigo($codigo)
    {
        return self::where('codigo', 'like', '%' . $codigo . '%')->get();
    }

    public static function buscaCodigoAND($codigo, $saldo)
    {
        return self::where('codigo', 'like', '%' . $codigo . '%')
            ->where('saldo', '>=', $saldo)
            ->get();
    }
    public static function buscaCodigoOR($codigo, $saldo)
    {
        return self::where('codigo', 'like', '%' . $codigo . '%')
            ->orWhere('saldo', '>=', $saldo)
            ->get();
    }
}
