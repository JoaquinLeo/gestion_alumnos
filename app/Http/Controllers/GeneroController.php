<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $generos = Genero::orderBy('id','ASC')->paginate(5);
        return view('generos.index', ['generos' => $generos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('generos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|min:3|max:100|unique:generos'
        ]);

        Genero::create($request->all());

        return redirect()
                ->route('generos.index')
                ->with('success','Genero registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genero $genero)
    {
        return view('generos.show',['genero'=>$genero]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genero $genero)
    {
        return view('generos.edit',['genero'=>$genero]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genero $genero)
    {

            $request->validate([
                'tipo' => 'required|min:3|max:100|unique:generos,tipo,'.$genero->id.',id'
            ]);

            $genero->fill($request->only([
                'tipo'
            ]));
    
            if($genero->isClean()){
                return back()->with('warning','Debe realizar al menos un cambio para actualizar');
            }

            $genero->update($request->all());

            return back()->with('success','Genero actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genero $genero)
    {
        $genero->delete();
        return back()->with('danger','Genero eliminado correctamente');
    }
}
