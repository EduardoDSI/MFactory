<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistroAsistencia;

class RegistroAsistenciaController extends Controller
{
    public function index()
    {
        $registroAsistencias = RegistroAsistencia::all();
        return view('registroAsistencia.index', ['registroAsistencias' => $registroAsistencias]);
    }
    public function create()
    {
        return view('registroAsistencia.create');
    }
    public function edit($id)
    {
        $registroAsistencia = RegistroAsistencia::findOrFail($id); // Obtener la registroAsistencia por su ID
        return view('registroAsistencia.edit', compact('registroAsistencia'));
    }
    public function update(Request $request, $id)
    {
        $registroAsistencia = RegistroAsistencia::findOrFail($id);
        // Lógica para validar y actualizar la registroAsistencia en la base de datos
        // Ejemplo: $registroAsistencia->update($request->all());

        return redirect()->route('registroAsistencia.index')->with('success', 'registroAsistencia actualizada exitosamente.');
    }
    public function store(Request $request)
    {


        return redirect()->route('registroAsistencia.index')->with('success', 'registroAsistencia creada exitosamente.');
    }
    public function destroy($id)
    {
        $registroAsistencia = RegistroAsistencia::findOrFail($id);
        $registroAsistencia->delete();

        return redirect()->route('registroAsistencia.index')->with('success', 'registroAsistencia eliminada exitosamente.');
    }
}
