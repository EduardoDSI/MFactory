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
        <h1 class="mt-4">Lista de productos</h1>
    </div>


    <div class="p-5 table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-primary text-white">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>

                    <th>
                        <button data-bs-toggle="modal" data-bs-target="#modalcreate" type="button"
                            class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->ID_Producto }}</td>
                    <td>{{ $producto->Nombre }}</td>
                    <td>{{ $producto->Precio }}</td>
                    <td>{{ $producto->Stock }}</td>
                    <td>
                        <!-- Botón de Actualizar con ícono de lápiz -->
                        <button data-bs-toggle="modal" data-bs-target="#modaleditar{{ $producto->ID_Producto }}"
                            type="button" class="btn btn-warning btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>


                        <!-- Botón de Eliminar con ícono de basura -->
                        <button data-bs-toggle="modal" data-bs-target="#modaldelete{{ $producto->ID_Producto }}"
                            type="button" class="btn btn-danger btn-sm">
                            <i class="fa-solid fa-trash"></i>
                        </button>


                    </td>
                </tr>


                <!-- Modal Editar producto -->
                <div class="modal fade" id="modaleditar{{ $producto->ID_Producto }}" tabindex="-1"
                    aria-labelledby="modaleditarLabel{{ $producto->ID_Producto }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modaleditarLabel{{ $producto->ID_Producto }}">
                                    Actualizar
                                    producto</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('producto.update', ['id' => $producto->ID_Producto]) }}"
                                    method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="id" class="col-form-label">ID</label>
                                        <input type="number" class="form-control" id="id" name="txtid"
                                            value="{{ $producto->ID_Producto }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre" class="col-form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="txtnombre"
                                            value="{{ $producto->Nombre }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="Precio" class="col-form-label">Precio</label>
                                        <input type="number" class="form-control" id="Precio" name="txtPrecio"
                                            value="{{ $producto->Precio }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="Stock " class="col-form-label">Stock </label>
                                        <input type="number" class="form-control" id="Stock " name="txtStock"
                                            value="{{ $producto->Stock }}">
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


                <!-- Modal Eliminar producto -->
                <div class="modal fade" id="modaldelete{{ $producto->ID_Producto }}" tabindex="-1"
                    aria-labelledby="modaldeleteLabel{{ $producto->ID_Producto }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modaldeleteLabel{{ $producto->ID_Producto }}">Eliminar
                                    producto</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>¿Estás seguro de que deseas eliminar a {{ $producto->Nombre }} {{ $producto->Precio
                                    }}?</p>
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('producto.delete', ['id' => $producto->ID_Producto]) }}"
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
        {{ $productos->links() }}
    </div>


    <!-- Modal Crear producto -->
    <div class="modal fade" id="modalcreate" tabindex="-1" aria-labelledby="modalcreateLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalcreateLabel">Crear producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('producto.store') }}" method="post">
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
                            <label for="Precio" class="col-form-label">Precio</label>
                            <input type="text" class="form-control" id="Precio" name="txtPrecio" required>
                        </div>
                        <div class="form-group">
                            <label for="Stock " class="col-form-label">Stock </label>
                            <input type="number" class="form-control" id="Stock " name="txtStock" required>
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