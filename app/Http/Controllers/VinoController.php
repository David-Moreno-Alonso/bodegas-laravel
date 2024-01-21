<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vino;
use App\Models\Bodega;
class VinoController extends Controller
{
    public function index()
    {
        $vinos = Vino::all();
        return view('vinos.index', compact('vinos'));
    }

    public function create()
    {
        $bodegas = Bodega::all();
        return view('vinos.create', compact('bodegas'));
    }

    public function store(Request $request)
    {
        $vino = Vino::create($request->all());
        return redirect()->route('vinos.index')->with('success', 'Vino creado correctamente');
    }

    public function edit(Vino $vino)
    {
        $bodegas = Bodega::all();
        return view('vinos.edit', compact('vino', 'bodegas'));
    }

    public function update(Request $request, Vino $vino)
    {
        $vino->update($request->all());
        return redirect()->route('vinos.index')->with('success', 'Vino actualizado correctamente');
    }

    public function destroy(Vino $vino)
    {
        $vino->delete();
        return redirect()->route('vinos.index')->with('success', 'Vino eliminado correctamente');
    }
}

