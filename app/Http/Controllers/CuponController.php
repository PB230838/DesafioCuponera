<?php

use App\Models\Cupon;
use Illuminate\Http\Request;

class CuponController extends Controller
{
    public function index()
    {
        $cupones = Cupon::all();
        return response()->json($cupones);
    }

    public function store(Request $request)
    {
        $cupon = Cupon::create($request->all());
        return response()->json($cupon, 201);
    }

    public function show($id)
    {
        $cupon = Cupon::findOrFail($id);
        return response()->json($cupon);
    }

    public function update(Request $request, $id)
    {
        $cupon = Cupon::findOrFail($id);
        $cupon->update($request->all());
        return response()->json($cupon, 200);
    }

    public function destroy($id)
    {
        Cupon::destroy($id);
        return response()->json(null, 204);
    }
}
