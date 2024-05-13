<?php
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'nombre', 'correo', 'password', 'telefono', 'direccion',
    ];

    protected $hidden = [
        'password',
    ];
}
