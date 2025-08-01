<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Paquete extends Model
{
  protected $fillable = [
    'nombre',
    'descripcion',
    'preciounitario',
    'descuento',
    'duracion',
    'image_url',
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
  /**
   * 
   * Métodos
   */
  protected static function boot()
  {
    parent::boot();

    static::updating(function ($ticket) {


      if ($ticket->isDirty('image_url')) {
        Storage::disk('public')->delete('/' . $ticket->getOriginal('image_url'));
      }
    });

    static::deleting(function ($ticket) {
      Storage::disk('public')->delete($ticket->image_url);
    });
  }
  public function getPrecioFinalAttribute()
  {
    $precioConDuracion = $this->preciounitario * $this->duracion;
    $descuento = $precioConDuracion * ($this->descuento / 100);
    return $precioConDuracion - $descuento;
  }
}
