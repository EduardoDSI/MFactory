
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Actualizar Persona</h2>
        <form action="{{ route('persona.update', $persona->id) }}" method="post">
            @csrf
            @method('PUT')
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="{{ $persona->nombre }}" required>
            <!-- Otros campos -->
            <button type="submit" class="btn btn-primary">Actualizar Persona</button>
        </form>
    </div>
@endsection
