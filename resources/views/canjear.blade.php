@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Canjear Cupón</h1>
        @foreach ($cuponesComprados as $cupon)
            <div class="card my-2">
                <div class="card-body">
                    <h5 class="card-title">{{ $cupon->codigo }}</h5>
                    <p class="card-text">Cantidad Comprada: {{ $cupon->cantidad_compra }}</p>
                    <form action="{{ route('canjear-cupon.canjear', $cupon->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="codigo" class="form-label">Ingrese el código del cupón:</label>
                            <input type="text" class="form-control" id="codigo" name="codigo">
                        </div>
                        <button type="submit" class="btn btn-primary">Canjear</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
