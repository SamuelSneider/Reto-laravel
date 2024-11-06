@extends('layout/template')

@section('title', 'Editar vehiculo')

@section('contenido')

<main>
    <div class="container py-5">
        <div class="card" style="max-width: 800px; margin: auto;">
           <div class="card-body">
               <h2>Editar vehículo</h2>
             
               <form action="{{ url('vehiculos/'.$vehiculos->id) }}" method="post">
                   @method("PUT")
                   @csrf

                   <div class="mb-3 row">
                       <label for="marca" class="col-sm-3 col-form-label">Marca:</label>
                       <div class="col-sm-6">
                       <input type="text" class="form-control" name="marca" id="marca" value="{{ strtoupper($vehiculos->marca) }}" oninput="this.value = this.value.toUpperCase()" required>
                       </div>
                   </div>

                   <div class="mb-3 row">
                       <label for="placa" class="col-sm-3 col-form-label">Placa:</label>
                       <div class="col-sm-6">
                           <input type="text" class="form-control" name="placa" id="placa" value="{{ $vehiculos->placa }}" " oninput="this.value = this.value.toUpperCase()" required>  
                       </div>
                   </div>

                   <div class="mb-3 row">
                       <label for="color" class="col-sm-3 col-form-label">Color:</label>
                       <div class="col-sm-6">
                           <input type="text" class="form-control" name="color" id="color" value="{{ $vehiculos->color }}" oninput="this.value = this.value.toUpperCase()" required>
                       </div>
                   </div>

                   <div class="mb-3 row">
                       <label for="modelo" class="col-sm-3 col-form-label">Modelo:</label>
                       <div class="col-sm-6">
                           <input type="text" class="form-control" name="modelo" id="modelo" value="{{ $vehiculos->modelo }}" required>   
                       </div>
                   </div>

                   <div class="mb-3 row">
                       <label for="fecha_compra" class="col-sm-3 col-form-label">Fecha de compra:</label>
                       <div class="col-sm-6">
                           <input type="date" class="form-control" name="fecha_compra" id="fecha_compra" value="{{ $vehiculos->fecha_compra }}" max="{{ date('Y-m-d', strtotime('-1 day')) }}" required>
                       </div>
                   </div>

                   <div class="mb-3 row">
                       <label for="accidente" class="col-sm-3 col-form-label">¿Ha tenido accidente?</label>
                       <div class="col-sm-6">
                           <select class="form-control" name="accidente" id="accidente" required>
                               <option value="" disabled selected>Seleccione una opción</option>
                               <option value="1" {{ $vehiculos->accidente == 1 ? 'selected' : '' }}>Si</option>
                               <option value="0" {{ $vehiculos->accidente == 0 ? 'selected' : '' }}>No</option>
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
