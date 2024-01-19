<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetalleVenta;
class DetalleVentaController extends Controller
{
    public function index()
    {
        $detalleventas = DetalleVenta::paginate();
        return view('detalleventa.index', compact('detalleventas'));
    }
    public function store(Request $request)
    {
        $detalleventa = new DetalleVenta();
        $detalleventa->ID_DetalleVenta = $request->txtid;
        $detalleventa->ID_Producto = $request->txtID_Producto;
        $detalleventa->Cantidad = $request->txtCantidad;
        $detalleventa->Tipo = $request->txtTipo;
        $detalleventa->Precio_Unitario = $request->txtPrecio_Unitario;

        if ($detalleventa->save()) {
            return back()->with("CORRECTO", "DetalleVenta registrada correctamente");
        } else {
            return back()->with("INCORRECTO", "Error al registrar DetalleVenta");
        }
    }
    public function update(Request $request, $id)
    {
        $detalleventa = DetalleVenta::find($id);

        if ($detalleventa) {
            $detalleventa->Nombre = $request->txtnombre;
            $detalleventa->Apellido = $request->txtapellido;
            $detalleventa->Fecha_nacimiento = $request->txtfecha;
            $detalleventa->telefono = $request->txttelefono;

            if ($detalleventa->save()) {
                return back()->with("CORRECTO", "DetalleVenta actualizada correctamente");
            } else {
                return back()->with("INCORRECTO", "Error al actualizar DetalleVenta");
            }
        } else {
            return back()->with("INCORRECTO", "DetalleVenta no encontrada");
        }
    }
    public function delete($id)
    {
        $detalleventa = DetalleVenta::find($id);

        if ($detalleventa) {
            if ($detalleventa->delete()) {
                return back()->with("CORRECTO", "DetalleVenta eliminada correctamente");
            } else {
                return back()->with("INCORRECTO", "Error al eliminar DetalleVenta");
            }
        } else {
            return back()->with("INCORRECTO", "DetalleVenta no encontrada");
        }
    }
}
