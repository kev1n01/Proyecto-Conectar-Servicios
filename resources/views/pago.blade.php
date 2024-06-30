<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Pago</title>
</head>
<body>
    <h1>Registrar Pago</h1>
    <form method="POST" action="{{ route('pagos.store') }}">
        @csrf
        <div>
            <label for="total">Total:</label>
            <input type="text" id="total" name="total" required>
        </div>
        <div>
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required>
        </div>
        <div>
            <label for="usuario_id">Usuario ID:</label>
            <input type="text" id="usuario_id" name="usuario_id" required>
        </div>
        <div>
            <label for="reserva_id">Reserva ID:</label>
            <input type="text" id="reserva_id" name="reserva_id" required>
        </div>
        <button type="submit">Registrar</button>
    </form>

    <h2>Pagos Existentes</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Total</th>
                <th>Fecha</th>
                <th>Usuario ID</th>
                <th>Reserva ID</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí irían los datos de pagos -->
        </tbody>
    </table>
</body>
</html>
