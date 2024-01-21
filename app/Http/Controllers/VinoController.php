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

    public function create(Bodega $bodega)
    {
        return view('vinos.create', compact('bodega'));
    }


    public function store(Request $request, Bodega $bodega)
    {
        $vinoData = $request->all();
        $vinoData['bodega_id'] = $bodega->id; // Asigna el ID de la bodega al campo 'bodega_id'

        $vino = Vino::create($vinoData);

        return redirect()->route('bodegas.show', $bodega->id)->with('success', 'Vino creado correctamente');
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

    public function destroy(Bodega $bodega, Vino $vino)
    {
        $vino->delete();

        return redirect()->route('bodegas.show', $bodega->id)->with('success', 'Vino eliminado correctamente');
    }
}

