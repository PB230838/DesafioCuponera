<?php

namespace App\Http\Controllers;

use App\Models\CupoComprado;
use Illuminate\Http\Request;

class CuponCompradoController extends Controller
{
    public function index()
    {
        $cuponesComprados = CupoComprado::where('id_usuario', auth()->user()->id)
            ->where('created_at', '>', now()->subDays(30)) // Solo cupones comprados en los últimos 30 días
            ->where('estado', '!=', 'Canjeado') // Filtrar por estado diferente a "Canjeado"
            ->get();
    
        return view('canjear', compact('cuponesComprados'));
    }
    

    public function canjear(Request $request, CupoComprado $cuponComprado)
    {
        // Verificar si el código ingresado coincide con el código del cupón
        if ($request->codigo !== $cuponComprado->codigo) {
            return redirect()->back()->withError('El código ingresado no es válido.');
        }
    
        // Cambiar el estado del cupón a "Canjeado"
        $cuponComprado->update(['estado' => 'Canjeado']);
    
        return redirect()->route('canjear-cupon.index')->withSuccess('Cupón canjeado exitosamente.');
    }
    
}
