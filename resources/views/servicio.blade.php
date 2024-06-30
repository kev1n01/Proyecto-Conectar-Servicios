<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Servicio</title>
</head>
<body>
    <h1>Crear Servicio</h1>
    <form method="POST" action="{{ route('servicios.store') }}">
        @csrf
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div>
            <label for="descripcion">Descripción:</label>
            <input type="text" id="descripcion" name="descripcion" required>
        </div>
        <div>
            <label for="precio">Precio:</label>
            <input type="text" id="precio" name="precio" required>
        </div>
        <button type="submit">Crear</button>
    </form>

    <h2>Servicios Existentes</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí irían los datos de servicios -->
        </tbody>
    </table>
</body>
</html>
