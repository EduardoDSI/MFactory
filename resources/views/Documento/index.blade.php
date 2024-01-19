{{-- Directiva de herencia de plantilla --}}
@extends('templates.plantilla')
{{-- Directiva para personalización de lo definido en nuestra plantilla --}}
@section('titulo', 'Pagina principal de documentos')

{{-- En caso querramos definir código debemos utilizar la directiva section y endsection --}}
@section('contenido')
    <h1>En esta pagina veré todos los documentos</h1>
    
    <table>
        <thead>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Categoria</th>
        </thead>
        <tbody>
            @foreach ($documentos as $documento)
                <tr>
                    <td>{{ $documento->Nombre }}</td>
                    <td>{{ $documento->descripcion }}</td>
                    <td>{{ $documento->categoria }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $documentos->links() }}
@endsection