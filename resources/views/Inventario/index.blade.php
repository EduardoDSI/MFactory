<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Proyecto Laravel</title>
    <script src="https://kit.fontawesome.com/acc3eaf820.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-light">

    <div class="container text-center my-4">
        <h1 class="mt-4">Lista de inventarios</h1>
    </div>

    <div class="p-5 table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-primary text-white">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha_nacimiento</th>
                    <th>Telefono</th>
                    <!-- <th>ID_Documento</th> -->
                    <th>
                        <button data-bs-toggle="modal" data-bs-target="#modalcreate" type="button"
                            class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventarios as $inventario)
                <tr>
                    <td>{{ $inventario->ID_inventario }}</td>
                    <td>{{ $inventario->Nombre }}</td>
                    <td>{{ $inventario->Apellido }}</td>
                    <td>{{ $inventario->Fecha_nacimiento }}</td>
                    <td>{{ $inventario->telefono }}</td>
                    <!-- <td>{{ $inventario->ID_Documento }}</td> -->
                    <td>
                        <!-- Botón de Actualizar con ícono de lápiz -->
                        <button data-bs-toggle="modal" data-bs-target="#modaleditar{{ $inventario->ID_inventario }}"
                            type="button" class="btn btn-warning btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>

                        <!-- Botón de Eliminar con ícono de basura -->
                        <button data-bs-toggle="modal" data-bs-target="#modaldelete{{ $inventario->ID_inventario }}"
                            type="button" class="btn btn-danger btn-sm">
                            <i class="fa-solid fa-trash"></i>
                        </button>

                    </td>
                </tr>

                <!-- Modal Editar inventario -->
                <div class="modal fade" id="modaleditar{{ $inventario->ID_inventario }}" tabindex="-1"
                    aria-labelledby="modaleditarLabel{{ $inventario->ID_inventario }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modaleditarLabel{{ $inventario->ID_inventario }}">Actualizar
                                    inventario</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('inventario.update', ['id' => $inventario->ID_inventario]) }}"
                                    method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="id" class="col-form-label">ID</label>
                                        <input type="number" class="form-control" id="id" name="txtid"
                                            value="{{ $inventario->ID_inventario }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre" class="col-form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="txtnombre"
                                            value="{{ $inventario->Nombre }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="apellido" class="col-form-label">Apellido</label>
                                        <input type="text" class="form-control" id="apellido" name="txtapellido"
                                            value="{{ $inventario->Apellido }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="fechaNacimiento" class="col-form-label">FechaNacimiento</label>
                                        <input type="date" class="form-control" id="fechaNacimiento" name="txtfecha"
                                            value="{{ $inventario->Fecha_nacimiento }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="telefono" class="col-form-label">Telefono</label>
                                        <input type="text" class="form-control" id="telefono" name="txttelefono"
                                            value="{{ $inventario->telefono }}">
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="iD_Documento" class="col-form-label">ID_Tipo</label>
                                        <input type="number" class="form-control" id="iD_Documento" name="txttipo"
                                            value="{{ $inventario->ID_Documento }}">
                                    </div> -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Eliminar inventario -->
                <div class="modal fade" id="modaldelete{{ $inventario->ID_inventario }}" tabindex="-1"
                    aria-labelledby="modaldeleteLabel{{ $inventario->ID_inventario }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modaldeleteLabel{{ $inventario->ID_inventario }}">Eliminar
                                    inventario</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>¿Estás seguro de que deseas eliminar a {{ $inventario->Nombre }} {{ $inventario->Apellido }}?</p>
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('inventario.delete', ['id' => $inventario->ID_inventario]) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
        {{ $inventarios->links() }}
    </div>

    <!-- Modal Crear inventario -->
    <div class="modal fade" id="modalcreate" tabindex="-1" aria-labelledby="modalcreateLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalcreateLabel">Crear inventario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('inventario.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="id" class="col-form-label">ID</label>
                            <input type="number" class="form-control" id="id" name="txtid" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre" class="col-form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="txtnombre" required>
                        </div>
                        <div class="form-group">
                            <label for="apellido" class="col-form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="txtapellido" required>
                        </div>
                        <div class="form-group">
                            <label for="fechaNacimiento" class="col-form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fechaNacimiento" name="txtfecha" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono" class="col-form-label">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="txttelefono" required>
                        </div>
                        <!-- <div class="form-group">
                            <label for="iD_Documento" class="col-form-label">ID Tipo</label>
                            <input type="number" class="form-control" id="iD_Documento" name="txttipo" required>
                        </div> -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
