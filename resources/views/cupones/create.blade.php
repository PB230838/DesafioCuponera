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
                    <li class="breadcrumb-item active" aria-current="page">Crear Cupón</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row my-2 mx-2 card p-4">
        <form action="{{ route('admin.cupones.store') }}" method="post">
            @csrf
            <div class="d-flex float-end">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="titulo">Título</label>
                        <input id="titulo" name="titulo" type="text" class="form-control" placeholder="Título del cupón" />
                    </div>
                </div>
                @if(auth()->user()->hasRole('ADMIN'))
                    <!-- Mostrar listado de empresas -->
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="empresa">Empresa</label>
                            <select id="empresa" name="empresa_id" class="form-select">
                                @foreach($empresas as $empresa)
                                    <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @else
                    <!-- No mostrar listado de empresas -->
                    <input type="hidden" name="empresa_id" value="{{ auth()->user()->empresa_id }}">
                @endif
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label for="precio">Precio</label>
                        <input id="precio" name="precio" type="text" class="form-control" placeholder="Precio del cupón" />
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label for="cantidad_disponible">Cantidad Disponible</label>
                        <input id="cantidad_disponible" name="cantidad_disponible" type="number" class="form-control" placeholder="Cantidad disponible del cupón" />
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label for="fecha_inicio">Fecha de Inicio</label>
                        <input id="fecha_inicio" name="fecha_inicio" type="datetime-local" class="form-control" />
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label for="fecha_fin">Fecha de Fin</label>
                        <input id="fecha_fin" name="fecha_fin" type="datetime-local" class="form-control" />
                    </div>
                </div>
                @if(auth()->user()->hasRole('ADMIN'))
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="estado">Estado</label>
                            <select id="estado" name="estado" class="form-select">
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                            </select>
                        </div>
                    </div>
                @else
                    <input type="hidden" name="estado" value="inactivo">
                @endif
            </div>
        </form>
    </div>
@endsection
