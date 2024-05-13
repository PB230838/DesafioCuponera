<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CupoComprado;
use App\Models\Cupon;
use App\Models\Empresa;
use Illuminate\Http\Request;

class CuponesController extends Controller
{

      public function getEmpresasDisponibles()
        {
            return Empresa::all();
        }


    public function index()
    {
        $cupones = Cupon::all();
        return view('cupones.index', compact('cupones'));
    }

    public function create()
    {
        $empresas = $this->getEmpresasDisponibles();
        return view('cupones.create', compact('empresas'));
    }

    public function store(Request $request)
    {
        $cupon = Cupon::create($request->all());
        return redirect()->route('admin.cupones.index')->withSuccess('Cupon created');
    }

    public function show($id)
    {
        $cupon = Cupon::findOrFail($id);
        return view('cupones.show', compact('cupon'));
    }

    public function edit($id)
    {
        $cupon = Cupon::findOrFail($id);
        return view('cupones.edit', compact('cupon'));
    }

    public function update(Request $request, $id)
    {
        $cupon = Cupon::findOrFail($id);
        $cupon->update($request->all());
        return redirect()->route('admin.cupones.index')->withSuccess('Cupon updated');
    }

    public function destroy($id)
    {
        Cupon::destroy($id);
        return redirect()->route('cupones.index')->withSuccess('Cupon deleted');
    }

    public function comprarCupon(Cupon $cupon){

        return view("cupones.comprar", compact("cupon"));
    }

    public function guardarCompra(Request $request, Cupon $cupon){

        $codigo = "";
        for($i = 0; $i <= 6; $i++){
            $codigo .= rand(1, 9);
        }
        $fill = [
            "id_usuario" => auth()->user()->id,
            "codigo" => $codigo,
            "id_cupon" => $cupon->id,
            "cantidad_compra" => $request->cantidad,
        ];

        (new CupoComprado($fill))->save();
        $cupon->cantidad_disponible = $cupon->cantidad_disponible - $request->cantidad;
        $cupon->save();
        return redirect()->route('welcome')->withSuccess('Cupon comprado');
    }

}
