<?php

namespace App\Http\Controllers;

use App\Models\CupoComprado;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class CuponCompradoController extends Controller
{
    public function index()
    {
        $cuponesComprados = CupoComprado::where('id_usuario', auth()->user()->id)
            ->where('created_at', '>', now()->subDays(30)) 
            ->where('estado', '!=', 'Canjeado') 
            ->get();
    
        return view('canjear', compact('cuponesComprados'));
    }
    


public function canjearCupon(Request $request, CupoComprado $cuponComprado)
{
    if ($request->codigo !== $cuponComprado->codigo) {
        $errors = new MessageBag(['message' => 'El código ingresado no es válido.']);
        return redirect()->back()->withErrors($errors);
    }

    if ($cuponComprado->cantidad_compra <= 0) {
        $errors = new MessageBag(['message' => 'No tienes cupones disponibles para canjear.']);
        return redirect()->back()->withErrors($errors);
    }

    $cuponComprado->decrement('cantidad_compra');

    // Actualizar el estado a "Canjeado" si la cantidad disponible es 0
    if ($cuponComprado->cantidad_compra <= 0) {
        $cuponComprado->update(['estado' => 'Canjeado']);
    }

    return redirect()->route('canjear-cupon.index')->withSuccess('Cupón canjeado exitosamente.');
}

    
    
    
}
