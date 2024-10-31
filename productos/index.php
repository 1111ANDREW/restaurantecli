<?php
require_once 'funciones.php';
$clientes = obtenerClientes();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
</head>
<body>
    <h1>Clientes</h1>
    <a href="nuevo.php">Añadir Cliente</a>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?= $cliente['nombre'] ?></td>
                <td><?= $cliente['correo'] ?></td>
                <td><?= $cliente['telefono'] ?></td>
                <td><?= $cliente['direccion'] ?></td>
                <td>
                    <a href="editar.php?id=<?= $cliente['_id'] ?>">Editar</a>
                    <a href="eliminar.php?id=<?= $cliente['_id'] ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
