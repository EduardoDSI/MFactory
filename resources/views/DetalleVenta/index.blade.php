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
        <h1 class="mt-4">Lista de detalleventas</h1>
    </div>


    <div class="p-5 table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-primary text-white">
                <tr>
                    <th>ID</th>
                    <th>ID_Producto</th>
                    <th>Cantidad</th>
                    <th>Tipo</th>
                    <th>Precio_Unitario</th>
                    <th>
                        <button data-bs-toggle="modal" data-bs-target="#modalcreate" type="button"
                            class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detalleventas as $detalleventa)
                <tr>
                    <td>{{ $detalleventa->ID_DetalleVenta }}</td>
                    <td>{{ $detalleventa->ID_Producto }}</td>
                    <td>{{ $detalleventa->Cantidad }}</td>
                    <td>{{ $detalleventa->Tipo }}</td>
                    <td>{{ $detalleventa->Precio_Unitario }}</td>
                    <td>
                        <!-- Botón de Actualizar con ícono de lápiz -->
                        <button data-bs-toggle="modal" data-bs-target="#modaleditar{{ $detalleventa->ID_DetalleVenta }}"
                            type="button" class="btn btn-warning btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>


                        <!-- Botón de Eliminar con ícono de basura -->
                        <button data-bs-toggle="modal" data-bs-target="#modaldelete{{ $detalleventa->ID_DetalleVenta }}"
                            type="button" class="btn btn-danger btn-sm">
                            <i class="fa-solid fa-trash"></i>
                        </button>


                    </td>
                </tr>


                <!-- Modal Editar detalleventa -->
                <div class="modal fade" id="modaleditar{{ $detalleventa->ID_DetalleVenta }}" tabindex="-1"
                    aria-labelledby="modaleditarLabel{{ $detalleventa->ID_DetalleVenta }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modaleditarLabel{{ $detalleventa->ID_DetalleVenta }}">
                                    Actualizar
                                    detalleventa</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form
                                    action="{{ route('detalleventa.update', ['id' => $detalleventa->ID_DetalleVenta]) }}"
                                    method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="id" class="col-form-label">ID</label>
                                        <input type="number" class="form-control" id="id" name="txtid"
                                            value="{{ $detalleventa->ID_DetalleVenta }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="ID_Producto" class="col-form-label">ID_Producto</label>
                                        <input type="number" class="form-control" id="ID_Producto" name="txtID_Producto"
                                            value="{{ $detalleventa->ID_Producto }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="Cantidad" class="col-form-label">Cantidad</label>
                                        <input type="number" class="form-control" id="Cantidad" name="txtCantidad"
                                            value="{{ $detalleventa->Cantidad }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="Tipo" class="col-form-label">Tipo</label>
                                        <input type="text" class="form-control" id="Tipo" name="txtfecha"
                                            value="{{ $detalleventa->Tipo }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="Precio_Unitario" class="col-form-label">Precio_Unitario</label>
                                        <input type="text" class="form-control" id="Precio_Unitario"
                                            name="txtPrecio_Unitario" value="{{ $detalleventa->Precio_Unitario }}">
                                    </div>
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


                <!-- Modal Eliminar detalleventa -->
                <div class="modal fade" id="modaldelete{{ $detalleventa->ID_DetalleVenta }}" tabindex="-1"
                    aria-labelledby="modaldeleteLabel{{ $detalleventa->ID_DetalleVenta }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modaldeleteLabel{{ $detalleventa->ID_DetalleVenta }}">
                                    Eliminar
                                    detalleventa</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>¿Estás seguro de que deseas eliminar a {{ $detalleventa->ID_Producto }} {{
                                    $detalleventa->Cantidad }}?</p>
                            </div>
                            <div class="modal-footer">
                                <form
                                    action="{{ route('detalleventa.delete', ['id' => $detalleventa->ID_DetalleVenta]) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
        {{ $detalleventas->links() }}
    </div>


    <!-- Modal Crear detalleventa -->
    <div class="modal fade" id="modalcreate" tabindex="-1" aria-labelledby="modalcreateLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalcreateLabel">Crear detalleventa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('detalleventa.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="id" class="col-form-label">ID</label>
                            <input type="number" class="form-control" id="id" name="txtid" required>
                        </div>
                        <div class="form-group">
                            <label for="ID_Producto" class="col-form-label">ID_Producto</label>
                            <input type="number" class="form-control" id="ID_Producto" name="txtID_Producto" required>
                        </div>
                        <div class="form-group">
                            <label for="Cantidad" class="col-form-label">Cantidad</label>
                            <input type="number" class="form-control" id="Cantidad" name="txtCantidad" required>
                        </div>
                        <div class="form-group">
                            <label for="Tipo" class="col-form-label">Tipo</label>
                            <input type="text" class="form-control" id="Tipo" name="txtfecha" required>
                        </div>
                        <div class="form-group">
                            <label for="Precio_Unitario" class="col-form-label">Teléfono</label>
                            <input type="text" class="form-control" id="Precio_Unitario" name="txtPrecio_Unitario"
                                required>
                        </div>
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