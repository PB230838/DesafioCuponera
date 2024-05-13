<?php

use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    protected $fillable = [
        'empresa_id', 'titulo', 'precio', 'cantidad_disponible', 'fecha_inicio', 'fecha_fin', 'estado',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
