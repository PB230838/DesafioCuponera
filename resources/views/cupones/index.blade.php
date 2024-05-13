@extends('layouts.mazer-admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cupones</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row my-2 justify-content-end">
        <div class="mx-auto">
            <a href="{{ route('admin.cupones.create') }}" class="btn btn-primary btn-sm">Nuevo Cupón</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Cupones</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Titulo</th>
                                    <th>Cantidad</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($cupones as $cupon)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $cupon->titulo }}</td>
                                        <td>{{ $cupon->cantidad_disponible <= 0 ? 'Agotados' : $cupon->cantidad_disponible }}</td>
                                        <td>{{ $cupon->fecha_inicio }}</td>
                                        <td>{{ $cupon->fecha_fin }}</td>
                                        <td style="color: {{ $cupon->estado === 'Inactivo' ? 'red' : 'green' }}">
                                            {{ $cupon->estado }}
                                        </td>
                                        <td>
                                            @if(auth()->user()->hasRole('ADMIN') && $cupon->empresa_id == auth()->user()->empresa_id)
                                                <a href="{{ route('admin.cupones.edit', $cupon->id) }}"
                                                    class="btn btn-primary btn-sm">Editar</a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No se encontraron cupones</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
