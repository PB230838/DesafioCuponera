@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @if(session('codigo'))
            <div class="alert alert-success mt-3" role="alert">
                Código de cupón: {{ session('codigo') }}
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
        


            @forelse ($cupones as $cupon)
                <div class="col-6">
                    <div class="card">
                        <h5 class="card-header">{{ $cupon->titulo }} ({{$cupon->cantidad_disponible}} disponibles)</h5>
                        <div class="card-body">
                            <h5 class="card-title">${{ $cupon->precio }}</h5>
                            <p class="card-text">{{ $cupon->empresa->nombre }}</p>
                            <a href="{{route("comprar", $cupon->id)}}" class="btn btn-primary">Comprar</a>
                        </div>
                    </div>
                </div>
            @empty
                <h1>NO HAY CUPONES</h1>
            @endforelse

        </div>
    </div>
@endsection
