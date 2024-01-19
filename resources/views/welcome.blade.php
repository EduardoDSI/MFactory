<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Proyecto Laravel</title>
    <!-- Incluye la hoja de estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="bg-light">

    <div class="container text-center my-4">
        <h1 class="mt-4">Lista de Tablas</h1>
    </div>

    <div class="container">
        <table class="table table-bordered table-striped mx-auto">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tabla</th>
                    <th>Link</th>
                </tr>
            </thead>
            <tbody>
                <!-- Filas de datos -->
                <tr>
                    <td>1</td>
                    <td>Persona</td>
                    <td><a href="{{ route('persona') }}">link</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Producto</td>
                    <td><a href="{{ route('producto') }}">link</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Inventario</td>
                    <td><a href="{{ route('inventario') }}">link</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Detalle Venta</td>
                    <td><a href="{{ route('detalleventa') }}">link</a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
