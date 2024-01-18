<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Models\Persona;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::all();
        return view('persona.index', ['personas' => $personas]);
    }
    /* public function create()
    {
        return view('persona.create');
    } */

    public function store(Request $request)
    {
        $mysql = DB::insert("insert into persona(ID_Persona, Nombre, Apellido, Fecha_nacimiento,telefono,ID_Documento)values(?,?,?,?,?,?)", [
            $request->txtid,
            $request->txtnombre,
            $request->txtapellido,
            $request->txtfecha,
            $request->txttelefono,
            $request->txttipo
        ]);
        if ($mysql == true) {

            return back()->with("CORRECTO", "Persona registrada correctamente");
        } else {

            return back()->with("INCORRECTO", "ERRO al registrar");
        }
    }
    public function update(Request $request, $id)
    {
        $mysql = DB::update("update persona set Nombre=?, Apellido=?, Fecha_nacimiento=?, telefono=?, ID_Documento=? where ID_Persona=?", [
            $request->txtnombre,
            $request->txtapellido,
            $request->txtfecha,
            $request->txttelefono,
            $request->txttipo,
            $id
        ]);

        if ($mysql == true) {
            return back()->with("CORRECTO", "Persona actualizada correctamente");
        } else {
            return back()->with("INCORRECTO", "Error al actualizar persona");
        }
    }
    /* public function delete($id)
    {
        $mysql = DB::delete("delete from persona where ID_Persona=$id");

        if ($mysql == true) {
            return back()->with("CORRECTO", "Persona eliminada correctamente");
        } else {
            return back()->with("INCORRECTO", "Error al eliminar persona");
        }
    } */
    public function delete($id)
    {
        DB::beginTransaction();

        try {

            DB::table('personadireccion')->where('ID_Persona', $id)->delete();


            DB::table('persona')->where('ID_Persona', $id)->delete();

            DB::commit();

            return back()->with("CORRECTO", "Persona eliminada correctamente");
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with("INCORRECTO", "Error al eliminar persona: " . $e->getMessage());
        }
    }

    /* public function store(Request $request)
    {
        $persona = new Persona;
        $persona->Nombre = $request->input('txtnombre');
        $persona->Apellido = $request->input('txtapellido');
        $persona->Fecha_nacimiento = $request->input('txtfecha');
        $persona->telefono = $request->input('txttelefono');
        $persona->ID_Documento = $request->input('txttipo');
        $persona->save();

        return redirect()->route('persona.index');
    } */
    /* public function edit($id)
    {
        $persona = Persona::find($id);
        return view('persona.edit', ['persona' => $persona]);
    }

    public function update(Request $request, $id)
    {
        $persona = Persona::find($id);
        $persona->Nombre = $request->input('txtnombre');
        $persona->Apellido = $request->input('txtapellido');
        $persona->Fecha_nacimiento = $request->input('txtfecha');
        $persona->telefono = $request->input('txttelefono');
        $persona->ID_Documento = $request->input('txttipo');
        $persona->save();
        return redirect()->route('persona.index');
    }
    public function delete($id)
    {
        $persona = Persona::find($id);
        return view('persona.delete', ['persona' => $persona]);
    }

    public function destroy($id)
    {
        $persona = Persona::find($id);
        $persona->delete();
        return redirect()->route('persona.index');
    } */

}
