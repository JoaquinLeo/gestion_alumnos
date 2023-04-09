<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use App\Models\Genero;
use App\Models\Carrera;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::orderBy('id','ASC')->paginate(5);
        return view('alumnos.index',['alumnos' =>$alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $generos = Genero::all();
        $carreras = Carrera::all();
        return view('alumnos.create',['generos'=>$generos],['carreras'=>$carreras]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|min:3|max:100',
            'apellidos' => 'required|min:3|max:100',
            'direccion' => 'required|min:3|max:100',
            'telefono' => 'required|min:3|max:100|unique:alumnos',
            'email' => 'required|min:3|max:100|unique:alumnos',
            'fecha_nac' => 'required', 
            /* 'id_carrera' => 'required',
            'id_genero' => 'required' */
        ]);

        Alumno::create($request->all());

        return redirect()
                ->route('alumnos.index')
                ->with('success','Alumno registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        return view('alumnos.show',['alumno'=>$alumno]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        $generos = Genero::all();
        $carreras = Carrera::all();
        return view('alumnos.edit',['alumno'=>$alumno],['carreras'=>$carreras,'generos'=>$generos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno)
    {

        $request->validate([
            'nombres' => 'required|min:3|max:100',
            'apellidos' => 'required|min:3|max:100',
            'direccion' => 'required|min:3|max:100',
            'telefono' => 'required|min:3|max:100|unique:alumnos,telefono,'.$alumno->id.',id',
            'email' => 'required|min:3|max:100|unique:alumnos,email,'.$alumno->id.',id',
            'fecha_nac' => 'required'
        ]);

        $alumno->fill($request->only([
            'nombres',
            'apellidos',
            'direccion',
            'telefono',
            'email',
            'fecha_nac', 
            'id_carrera',
            'id_genero' 
        ]));

        if($alumno->isClean()){
            return back()->with('warning','Debe realizar al menos un cambio para actualizar');
        }

        $alumno->update($request->all());

        return back()->with('success','Alumno actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return back()->with('danger','Alumno eliminado correctamente');
    }
}
