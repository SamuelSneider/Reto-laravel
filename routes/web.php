<?php
use App\Http\Controllers\VehiculoController;
use Illuminate\Support\Facades\Route;
 
/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
| Aquí es donde puedes registrar las rutas web para tu aplicación.
| Las rutas se cargan a través de RouteServiceProvider y todas están
| asignadas al grupo de middleware "web".
| Puedes hacer algo grandioso aquí!
*/
 

 // Ruta para la página de inicio que ejecuta el método 'index' del controlador VehiculoController
Route::get('/', [VehiculoController::class, 'index']);

Route::post('/vehiculos/verificar-placa', [VehiculoController::class, 'verificarPlaca'])->
name('vehiculos.verificarPlaca');

Route::resource('/vehiculos', VehiculoController::class);


 
 