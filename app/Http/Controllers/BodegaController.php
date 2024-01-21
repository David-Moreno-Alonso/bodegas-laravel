<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bodega;

class BodegaController extends Controller
{
    public function index()
    {
        $bodegas = Bodega::all();
        return view('bodegas.index', compact('bodegas'));
    }

    public function create()
    {
        return view('bodegas.create');
    }

    public function store(Request $request)
    {
        $bodega = Bodega::create($request->all());
        return redirect()->route('bodegas.index')->with('success', 'Bodega creada correctamente');
    }

    public function edit(Bodega $bodega)
    {
        return view('bodegas.edit', compact('bodega'));
    }

    public function update(Request $request, Bodega $bodega)
    {
        $bodega->update($request->all());
        return redirect()->route('bodegas.index')->with('success', 'Bodega actualizada correctamente');
    }

    public function destroy(Bodega $bodega)
    {
        $bodega->delete();
        return redirect()->route('bodegas.index')->with('success', 'Bodega eliminada correctamente');
    }

    public function show(Bodega $bodega)
    {
        return view('bodegas.show', compact('bodega'));
    }

}

