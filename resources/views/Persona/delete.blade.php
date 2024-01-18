@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Eliminar Persona</h2>
        <p>¿Estás seguro de que deseas eliminar a {{ $persona->nombre }}?</p>
        <form action="{{ route('persona.destroy', $persona->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar Persona</button>
        </form>
    </div>
@endsection
