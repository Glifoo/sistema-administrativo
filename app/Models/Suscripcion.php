<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    protected $fillable = [
        'user_id',
        'paquete_id',
        'fecha_inicio',
        'fecha_fin',
        'estado'
    ];

    /**
     * 
     * realciones
     */
    
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function paquete()
    {
        return $this->belongsTo(Paquete::class, 'paquete_id');
    }

    public function ventas()
    {
        return $this->hasMany(Sell::class, 'suscripcion_id');
    }

    public function renovaciones()
    {
        return $this->hasMany(Renovation::class, 'suscripcion_id');
    }
}
