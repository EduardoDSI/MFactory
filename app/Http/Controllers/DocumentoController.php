<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Persona;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function index()
    {
        $documentos = Documento::paginate();
        return view('documento.index', compact('documentos'));
    }
}
