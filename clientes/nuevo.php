<?php
require_once __DIR__ . '/../includes/funciones.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    crearCliente($_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['direccion']);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../public/css/styles.css">
    <title>Nuevo Cliente</title>
</head>
<body>
    <div class="container">
        <h1>Agregar Cliente</h1>
        <form method="POST">
            <label>Nombre:</label><input type="text" name="nombre" required><br>
            <label>Correo:</label><input type="email" name="correo" required><br>
            <label>Teléfono:</label><input type="text" name="telefono" required><br>
            <label>Dirección:</label><textarea name="direccion" required></textarea><br>
            <button type="submit">Guardar</button>
        </form>
        <a href="index.php" class="button">Volver a la lista de clientes</a>
    </div>
</body>
</html>
