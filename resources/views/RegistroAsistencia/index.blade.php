<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Proyecto Laravel</title>
    <script src="https://kit.fontawesome.com/acc3eaf820.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-light">

    <div class="container text-center my-4">
        <h1 class="mt-4">Lista de Registro Asistencias</h1>
    </div>

    <div class="p-5 table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-primary text-white">
                <tr>
                    <th>ID</th>
                    <th>ID_Persona</th>
                    <th>FechaEntrada</th>
                    <th>FechaSalida</th>
                    <th><button type="button" class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registroAsistencias as $asistencia)
                <tr>
                    <td>{{ $asistencia->ID_RegistroAsistencia }}</td>
                    <td>{{ $asistencia->ID_Persona }}</td>
                    <td>{{ $asistencia->FechaEntrada }}</td>
                    <td>{{ $asistencia->FechaSalida }}</td>
                    <td>
                        <!-- Botón de Actualizar con ícono de lápiz -->
                        <button data-bs-toggle="modal" data-bs-target="#modaleditar" type="button" class="btn btn-warning btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>

                        <!-- Botón de Eliminar con ícono de basura -->
                        <button type="button" class="btn btn-danger btn-sm">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>

                    <div class="modal fade" id="modaleditar" tabindex="-1" aria-labelledby="modaleditarLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modaleditarLabel">Actualizar Persona</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="">
                                            <label for="id" class="col-form-label">ID</label>
                                            <input type="text" class="form-control" id="id">
                                        </div>
                                        <div class="">
                                            <label for="nombre" class="col-form-label">Nombre</label>
                                            <input type="text" class="form-control" id="nombre">
                                        </div>
                                        <div class="">
                                            <label for="apellido" class="col-form-label">Apellido</label>
                                            <input type="text" class="form-control" id="apellido">
                                        </div>
                                        <div class="">
                                            <label for="fechaNacimiento" class="col-form-label">FechaNacimiento</label>
                                            <input type="text" class="form-control" id="fechaNacimiento">
                                        </div>
                                        <div class="">
                                            <label for="telefono" class="col-form-label">Telefono</label>
                                            <input type="text" class="form-control" id="telefono">
                                        </div>
                                        <div class="">
                                            <label for="iD_Documento" class="col-form-label">ID_Tipo</label>
                                            <input type="text" class="form-control" id="iD_Documento">
                                        </div>
                                        
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Send message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>