<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categoria.index', ['categorias' => $categorias]);
    }
    public function create()
    {
        return view('categoria.create');
    }
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id); // Obtener la categoria por su ID
        return view('categoria.edit', compact('categoria'));
    }
    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        // Lógica para validar y actualizar la categoria en la base de datos
        // Ejemplo: $categoria->update($request->all());

        return redirect()->route('categoria.index')->with('success', 'categoria actualizada exitosamente.');
    }
    public function store(Request $request)
    {


        return redirect()->route('categoria.index')->with('success', 'categoria creada exitosamente.');
    }
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categoria.index')->with('success', 'categoria eliminada exitosamente.');
    }
}
