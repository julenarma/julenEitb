<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
Use App\Models\Proyectos;


Use Illuminate\Support\Facades\DB;

class ProyectosController extends Controller
{

    public function index()
    {
         return Proyectos::all();
        
    }

    public function show(Proyectos $proyecto)
    {
        return $proyecto;
    }

    public function store(Request $request)
    {
        $proyecto = Proyectos::create($request->all());

        return response()->json($proyecto, 201);
    }

    public function update(Request $request, Proyectos $proyecto)
    {
        $proyecto->update($request->all());

        return response()->json($proyecto, 200);
    }

    public function delete(Proyectos $proyecto)
    {
        $proyecto->delete();

        return response()->json(null, 204);
    }
 
  
}
