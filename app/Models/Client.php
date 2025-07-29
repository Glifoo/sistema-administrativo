<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'contacto',
        'nit',
        'email',
        'usuario_id',
    ];

    /**
     * 
     * realciones
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
    public function trabajos()
    {
        return $this->hasMany(Trabajo::class);
    }
}
