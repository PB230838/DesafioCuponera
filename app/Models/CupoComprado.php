<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CupoComprado extends Model
{
    use HasFactory;
    public $table = "cupones_comprados";
    protected $guarded = ["id"];
}
