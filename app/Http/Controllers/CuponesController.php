<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cupon;
use Illuminate\Http\Request;

class CuponesController extends Controller
{
    public function index()
    {
        $cupones = Cupon::all();
        return view('cupones.index', compact('cupones'));
    }

    public function create()
    {
        return view('cupones.create');
    }

    public function store(Request $request)
    {
        $cupon = Cupon::create($request->all());
        return redirect()->route('cupones.index')->withSuccess('Cupon created');
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
        return redirect()->route('cupones.index')->withSuccess('Cupon updated');
    }

    public function destroy($id)
    {
        Cupon::destroy($id);
        return redirect()->route('cupones.index')->withSuccess('Cupon deleted');
    }
}
