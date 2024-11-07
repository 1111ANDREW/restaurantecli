<?php
require_once __DIR__ . '/../includes/funciones.php';
$cliente = obtenerClientePorId($_GET['id']);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    actualizarCliente($_GET['id'], $_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['direccion']);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="../public/css/styles.css">
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
</head>
<body>
<div class="container">
    <h1 align= "center">EDITAR CLIENTE</h1>
    <form method="POST">
        <label>Nombre:</label><input type="text" name="nombre" value="<?php $cliente['nombre'] ?>" required><br>
        <label>Correo:</label><input type="email" name="correo" value="<?php $cliente['correo'] ?>" required><br>
        <label>Teléfono:</label><input type="text" name="telefono" value="<?php $cliente['telefono'] ?>" required><br>
        <label>Dirección:</label><input type="text" name="direccion" value="<?php $cliente['direccion'] ?>" required><br>
        <button type="submit">Guardar</button>
    </form>
    <a href="index.php" class="button">Volver a la lista de clientes</a>
</div>
</body>
</html>
