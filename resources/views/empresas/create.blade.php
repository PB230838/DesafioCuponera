@extends('layouts.mazer-admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.empresas.index') }}">Empresas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Empresa</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row my-2 mx-2 card p-4">
        <form action="{{ route('admin.empresas.store') }}" method="post">
            @csrf
            <div class="d-flex float-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre de la empresa" />
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="correo">Correo</label>
                        <input id="correo" name="correo" type="email" class="form-control" placeholder="Correo de la empresa" />
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="telefono">Teléfono</label>
                        <input id="telefono" name="telefono" type="tel" class="form-control" placeholder="Teléfono de la empresa" />
                    </div>
                </div>
                <!-- Agrega aquí los demás campos de la empresa que necesites -->
            </div>
        </form>
    </div>
@endsection
