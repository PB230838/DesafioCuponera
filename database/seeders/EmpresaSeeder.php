<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    public function run()
{
    Empresa::create([
        'id' => 0,
        'nombre' => 'Sin empresa asignada',
        'telefono' => '0000000000',
        'direccion' => 'Dirección desconocida',
    ]);
}

}

