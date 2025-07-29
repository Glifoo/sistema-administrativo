<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    protected $fillable = [
        'trabajo',
        'descripcion',
        'cantidad',
        'estado',
        'manobra',
        'ganancia',
        'gananciaefectivo',
        'iva',
        'ivaefectivo',
        'Costofactura',
        'Costoproduccion',
        'Costofinal',
        'cliente_id',
    ];

    /**
     * 
     * realciones
     */

    public function cliente()
    {
        return $this->belongsTo(Client::class);
    }

    public function ordenesPago()
    {
        return $this->hasMany(Ordenpago::class, 'trabajo_id');
    }

    public function insumos()
    {
        return $this->hasMany(Insumo::class, 'trabajo_id');
    }
}
