<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carreras = Carrera::orderBy('id','ASC')->paginate(5);
        return view('carreras.index', ['carreras' => $carreras]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('carreras.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:100|unique:carreras'
        ]);

        Carrera::create($request->all());

        return redirect()
                ->route('carreras.index')
                ->with('success','Carrera registrada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Carrera $carrera)
    {
        return view('carreras.show',['carrera'=>$carrera]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carrera $carrera)
    {
        return view('carreras.edit',['carrera'=>$carrera]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carrera $carrera)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:100|unique:carreras,nombre,'.$carrera->id.',id'
        ]);

        $carrera->fill($request->only([
            'nombre'
        ]));

        if($carrera->isClean()){
            return back()->with('warning','Debe realizar al menos un cambio para actualizar');
        }

        $carrera->update($request->all());

        return back()->with('success','Carrera actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carrera $carrera)
    {
        //
    }
}
