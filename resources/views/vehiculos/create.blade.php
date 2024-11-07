@extends('layout/template')
@section('title', 'Registrar vehiculo')
@section('contenido')

<main>
    <div class="container py-5">
        <div class="card" style="max-width: 800px; margin: auto; background-color: #F3F4F6;">
            <div class="card-body">
                <h2 class="card-title">Registrar vehículo</h2>

                @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form action="{{ url('vehiculos') }}" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="marca" class="col-sm-3 col-form-label">Marca:</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" name="marca" id="marca" value="{{ old('marca') }}" oninput="this.value = this.value.toUpperCase()" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="placa" class="col-sm-3 col-form-label">Placa:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="placa" id="placa" value="{{ old('placa') }}" oninput="this.value = this.value.toUpperCase()" required>  
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="color" class="col-sm-3 col-form-label">Color:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="color" id="color" value="{{ old('color') }}" oninput="this.value = this.value.toUpperCase()"required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="modelo" class="col-sm-3 col-form-label">Modelo:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="modelo" id="modelo" value="{{ old('modelo') }}" required>   
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="fecha_compra" class="col-sm-3 col-form-label">Fecha de compra:</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" name="fecha_compra" id="fecha_compra" 
                            value="{{ old('fecha_compra') }}" max="{{ date('Y-m-d', strtotime('-1 day')) }}" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="accidente" class="col-sm-3 col-form-label">¿Ha tenido accidente?</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="accidente" id="accidente" required>
                                <option value="" disabled selected>Seleccione una opción</option>
                                <option value="1" {{ old('accidente') == '1' ? 'selected' : '' }}>Si</option>
                                <option value="0" {{ old('accidente') == '0' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ url('vehiculos') }}" class="btn btn-secondary">Regresar</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>        
            </div>
        </div>
    </div>
    
</main>

@endsection
