<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todosLosEmpleados= Empleado::all();
        return view ('empleados.listaEmpleados', compact('todosLosEmpleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('empleados.añadirEmpleado');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|string',
            'Apellido'=> 'required|string',
        ]);
        $empleado= new Empleado();
        $empleado->nombre = $request->input('Nombre');
        $empleado->apellido = $request->input('Apellido');
        $empleado->save();
        return redirect()->back()->with('success', 'Empleado añadido con éxito y registrada en la base de datos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        return  view('editarEmpleado');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        
        {
            $newEmpleado =Empleado::find($empleado->id);
            $newEmpleado->nombre= $request->nombre;
            $newEmpleado->apellido= $request->apellido;
            $newEmpleado->save();
            return redirect()->back()->with('success', 'Empleado editado con éxito y registrada en la base de datos');
        }
    
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        
        return redirect()->back()->with('success', 'Empleado eliminado con éxito');
    }
}

