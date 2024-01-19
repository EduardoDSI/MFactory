<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::paginate();
        return view('producto.index', compact('productos'));
    }
    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->ID_Producto = $request->txtid;
        $producto->Nombre = $request->txtnombre;
        $producto->Precio = $request->txtPrecio;
        $producto->Stock = $request->txtStock;

        if ($producto->save()) {
            return back()->with("CORRECTO", "Producto registrada correctamente");
        } else {
            return back()->with("INCORRECTO", "Error al registrar Producto");
        }
    }
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);

        if ($producto) {
            $producto->Nombre = $request->txtnombre;
            $producto->Precio = $request->txtPrecio;
            $producto->Stock = $request->txtStock;

            if ($producto->save()) {
                return back()->with("CORRECTO", "Producto actualizada correctamente");
            } else {
                return back()->with("INCORRECTO", "Error al actualizar Producto");
            }
        } else {
            return back()->with("INCORRECTO", "Producto no encontrada");
        }
    }
    public function delete($id)
    {
        $producto = Producto::find($id);

        if ($producto) {
            if ($producto->delete()) {
                return back()->with("CORRECTO", "Producto eliminada correctamente");
            } else {
                return back()->with("INCORRECTO", "Error al eliminar Producto");
            }
        } else {
            return back()->with("INCORRECTO", "Producto no encontrada");
        }
    }
}
