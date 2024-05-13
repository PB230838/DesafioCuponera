@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Canjear Cupón</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @foreach ($cuponesComprados as $cupon)
            <div class="card my-2">
                <div class="card-body">
                    <h5 class="card-title">{{ $cupon->codigo }}</h5>
                    <p class="card-text">Cantidad Disponible: {{ $cupon->cantidad_compra }}</p>
                    <p class="card-text">Fecha de Compra: {{ $cupon->formatted_created_at }}</p>
                    <form action="{{ route('canjear-cupon.canjearCupon', $cupon->id) }}" method="POST">
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
