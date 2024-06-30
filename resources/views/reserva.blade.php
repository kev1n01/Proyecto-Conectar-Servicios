<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Reserva</title>
</head>
<body>
    <h1>Crear Reserva</h1>
    <form method="POST" action="{{ route('reservas.store') }}">
        @csrf
        <div>
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required>
        </div>
        <div>
            <label for="hora">Hora:</label>
            <input type="time" id="hora" name="hora" required>
        </div>
        <div>
            <label for="usuario_id">Usuario ID:</label>
            <input type="text" id="usuario_id" name="usuario_id" required>
        </div>
        <div>
            <label for="proveedor_id">Proveedor ID:</label>
            <input type="text" id="proveedor_id" name="proveedor_id" required>
        </div>
        <button type="submit">Crear</button>
    </form>

    <h2>Reservas Existentes</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Usuario ID</th>
                <th>Proveedor ID</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí irían los datos de reservas -->
        </tbody>
    </table>
</body>
</html>
