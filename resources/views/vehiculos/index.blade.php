@extends('layout/template')
@section('title', 'Vehiculos')
@section('contenido')

<main>
    <div class="container py-5">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Lista de Vehículos</h2> 

                <form action="{{ route('vehiculos.index') }}" method="GET" class="mb-4">
                    <div class="row">
                    @if (session('success')) <div class="alert alert-success"> {{ session('success') }} </div> @endif
                        <div class="col-md-3">
                            <input type="text" name="marca" class="form-control" placeholder="Buscar Marca" value="{{ request('marca') }}">
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="color" class="form-control" placeholder="Buscar Color" value="{{ request('color') }}">
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="modelo" class="form-control" placeholder="Buscar Modelo" value="{{ request('modelo') }}">
                        </div>
                        <div class="col-md-3 d-flex">
                            <button type="submit" class="btn btn-primary me-2">Buscar</button>
                            <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Limpiar</a>
                        </div>
                    </div>
                </form>

                <a href="{{ url('vehiculos/create')}}" class="btn btn-primary btn-sm mb-3"><i class="fas fa-plus"></i> Nuevo registro</a>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Marca</th>
                            <th>Placa</th>
                            <th>Color</th>
                            <th>Modelo</th>
                            <th>Fecha de compra</th>
                            <th>¿Ha tenido accidente?</th>
                            <th>Acciones</th> 
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($vehiculos as $vehiculo)
                        <tr>
                            <td>{{ $vehiculo->marca }}</td>
                            <td>{{ $vehiculo->placa }}</td>
                            <td>{{ $vehiculo->color }}</td>
                            <td>{{ $vehiculo->modelo }}</td>
                            <td>{{ $vehiculo->fecha_compra }}</td>
                            <td>{{ $vehiculo->accidente ? 'Si' : 'No' }}</td>
                            <td> 
                                <div class="d-flex">
                                    <a href="{{ url('vehiculos/'.$vehiculo->id.'/edit') }}" class="btn btn-info btn-sm me-2">
                                        <i class="fas fa-edit"></i> Editar
                                    </a> 
                                    <form action="{{ url('vehiculos/' .$vehiculo->id) }}" method="post">
                                        @method("DELETE")
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

             
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <h5 class="mb-0">Paginador</h5> 
                    <nav aria-label="Page navigation example">
                        {{ $vehiculos->links('pagination::bootstrap-4') }} 
                    </nav>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
