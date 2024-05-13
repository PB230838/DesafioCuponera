@extends('layouts.mazer-admin')

@section('heading')
    Cupones
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.cupones.index') }}">Cupones</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Compar Cupón</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row my-2 mx-2 card p-4">
        <form action="{{ route('guardar.compra', $cupon->id) }}" method="post">
            @csrf
            <div class="d-flex float-end">
                <button type="submit" class="btn btn-primary">Comprar</button>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="cantidad">Cantidad a comprar</label>
                        <input id="cantidad" name="cantidad" type="number" class="form-control" step="1"
                            placeholder="maximo {{ $cupon->cantidad_disponible }}" required/>
                    </div>
                </div>


            </div>
        </form>
    </div>
@endsection
