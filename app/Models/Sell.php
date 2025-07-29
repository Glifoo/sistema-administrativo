<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    protected $fillable = [
        'total',
        'pago',
        'fecha',
        'concepto',
        'suscripcion_id',
        'estadov_id'
    ];

    /**
     * 
     * realciones
     */

    public function suscripcion()
    {
        return $this->belongsTo(Suscripcion::class, 'suscripcion_id');
    }

    public function estado()
    {
        return $this->belongsTo(EstatuSell::class, 'estado_id');
    }
}
