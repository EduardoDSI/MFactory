<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::paginate();
        return view('persona.index', compact('personas'));
    }
    public function store(Request $request)
    {
        $persona = new Persona();
        $persona->ID_Persona = $request->txtid;
        $persona->Nombre = $request->txtnombre;
        $persona->Apellido = $request->txtapellido;
        $persona->Fecha_nacimiento = $request->txtfecha;
        $persona->telefono = $request->txttelefono;

        if ($persona->save()) {
            return back()->with("CORRECTO", "Persona registrada correctamente");
        } else {
            return back()->with("INCORRECTO", "Error al registrar persona");
        }
    }
    public function update(Request $request, $id)
    {
        $persona = Persona::find($id);

        if ($persona) {
            $persona->Nombre = $request->txtnombre;
            $persona->Apellido = $request->txtapellido;
            $persona->Fecha_nacimiento = $request->txtfecha;
            $persona->telefono = $request->txttelefono;

            if ($persona->save()) {
                return back()->with("CORRECTO", "Persona actualizada correctamente");
            } else {
                return back()->with("INCORRECTO", "Error al actualizar persona");
            }
        } else {
            return back()->with("INCORRECTO", "Persona no encontrada");
        }
    }
    public function delete($id)
    {
        $persona = Persona::find($id);

        if ($persona) {
            if ($persona->delete()) {
                return back()->with("CORRECTO", "Persona eliminada correctamente");
            } else {
                return back()->with("INCORRECTO", "Error al eliminar persona");
            }
        } else {
            return back()->with("INCORRECTO", "Persona no encontrada");
        }
    }
}
