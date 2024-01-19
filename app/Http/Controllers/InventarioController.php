<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventario;

class InventarioController extends Controller
{
    public function index()
    {
        $inventarios = Inventario::paginate();
        return view('inventario.index', compact('inventarios'));
    }
    public function store(Request $request)
    {
        $inventario = new Inventario();
        $inventario->ID_Inventario = $request->txtid;
        $inventario->ID_Producto = $request->txtID_Producto;
        $inventario->StockActual = $request->txtStockActual;
        $inventario->FechaInventario = $request->txtFechaInventario;

        if ($inventario->save()) {
            return back()->with("CORRECTO", "Inventario registrada correctamente");
        } else {
            return back()->with("INCORRECTO", "Error al registrar Inventario");
        }
    }
    public function update(Request $request, $id)
    {
        $inventario = Inventario::find($id);

        if ($inventario) {
            $inventario->ID_Producto = $request->txtID_Producto;
            $inventario->StockActual = $request->txtStockActual;
            $inventario->FechaInventario = $request->txtFechaInventario;

            if ($inventario->save()) {
                return back()->with("CORRECTO", "Inventario actualizada correctamente");
            } else {
                return back()->with("INCORRECTO", "Error al actualizar Inventario");
            }
        } else {
            return back()->with("INCORRECTO", "Inventario no encontrada");
        }
    }
    public function delete($id)
    {
        $inventario = Inventario::find($id);

        if ($inventario) {
            if ($inventario->delete()) {
                return back()->with("CORRECTO", "Inventario eliminada correctamente");
            } else {
                return back()->with("INCORRECTO", "Error al eliminar Inventario");
            }
        } else {
            return back()->with("INCORRECTO", "Inventario no encontrada");
        }
    }
}
