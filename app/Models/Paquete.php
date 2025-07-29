<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
  protected $fillable = [
    'nombre',
    'descripcion',
    'precio',
    'duracion',
    'imagen_url',
    'estado',
  ];

  /**
   * 
   * realciones
   */

  public function suscripciones()
  {
    return $this->hasMany(Suscripcion::class, 'paquete_id');
  }
}
