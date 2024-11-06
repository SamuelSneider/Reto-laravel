<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculos; 


class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $query = Vehiculos::query();
    
        if ($request->filled('marca')) {
            $query->where('marca', 'like', '%' . $request->input('marca') . '%');
        }
        if ($request->filled('color')) {
            $query->where('color', 'like', '%' . $request->input('color') . '%');
        }
        if ($request->filled('modelo')) {
            $query->where('modelo', 'like', '%' . $request->input('modelo') . '%');
        }
        
        $vehiculos = $query->paginate(8);
    
        return view('vehiculos.index', compact('vehiculos'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required',
            'placa' => 'required|unique:vehiculos',
            'color' => 'required',
            'modelo' => 'required|integer',
            'fecha_compra' => 'required|date',
            'accidente' => 'required|boolean|',  
        ]);

       $vehiculo= new Vehiculos();
       $vehiculo->marca = $request->input('marca');
       $vehiculo->placa = $request->input('placa');
       $vehiculo->color = $request->input('color');
       $vehiculo->modelo = $request->input('modelo');
       $vehiculo->fecha_compra = $request->input('fecha_compra');
       $vehiculo->accidente = $request->input('accidente') == '1';
       $vehiculo-> save();
       return redirect()->route('vehiculos.create')->with('success', 'El vehículo ha sido creado exitosamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vehiculos = Vehiculos::find($id);
        return view('vehiculos.edit', ['vehiculos' => $vehiculos] );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'marca' => 'required',
            'placa' => 'required|unique:vehiculos,placa,'.$id,
            'color' => 'required',
            'modelo' => 'required|integer',
            'fecha_compra' => 'required|date',
            'accidente' => 'required|boolean|',  
        ]);

       $vehiculo =  Vehiculos::find($id);
       $vehiculo->marca = $request->input('marca');
       $vehiculo->placa = $request->input('placa');
       $vehiculo->color = $request->input('color');
       $vehiculo->modelo = $request->input('modelo');
       $vehiculo->fecha_compra = $request->input('fecha_compra');
       $vehiculo->accidente = $request->input('accidente') == '1' ? 1 : 0;
       $vehiculo-> save();
       return redirect()->route('vehiculos.index')->with('success', 'Registro actualizado correctamente.');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $vehiculo = Vehiculos::findOrFail($id);
        $vehiculo->delete();
        return redirect()->route('vehiculos.index')->with('success', 'El vehículo ha sido eliminado correctamente.');        
    }

    public function verificarPlaca(Request $request)
{
    $placaExiste = Vehiculos::where('placa', $request->input('placa'))->exists();
    return response()->json(['existe' => $placaExiste]);
}

}
