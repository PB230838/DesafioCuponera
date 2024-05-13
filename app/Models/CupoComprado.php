<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CupoComprado extends Model
{
    use HasFactory;
    public $table = "cupones_comprados";
    protected $guarded = ["id"];

    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('m/d/Y h:i A');
    }


    public function cupon()
    {
        return $this->belongsTo(Cupon::class, 'id_cupon');
    }
}
