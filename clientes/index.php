<?php
    require_once __DIR__ .'/../includes/funciones.php';
    $clientes = obtenerClientes();
    if (isset($_GET['accion']) && $_GET['accion'] === 'eliminar' && isset($_GET['id'])) {
        $count = eliminarCliente($_GET['id']);
        $mensaje = $count > 0 ? "Cliente eliminado con éxito." : "No se pudo eliminar el cliente.";
        header("Location: index.php?mensaje=$mensaje");
        exit;
    }
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>  
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
    <div class="container">
        <h1 align= "center"> CLIENTES <h1>

        <?php if (isset($mensaje)): ?>
            <div class="<?php echo $count > 0 ? 'success' : 'error'; ?>">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>

        <!--<input type= "submit"class="buton" href="nuevo.php">Agregar Nuevo cliente</input>-->
        <!--<button  type= "submit"class="buton" href="nuevo.php">Agregar Nuevo cliente </button>-->

        <a href="nuevo.php" class="button">Agregar Nuevo cliente</a>

        <h2>Lista de clientes</h2>
        <table>
            <tr>
                <th>nombre</th>
                <th>correo</th>
                <th>telefono</th>
                <th>direccion</th>
                <th>acciones</th>
            </tr>
            <?php foreach ($clientes as $c): ?>
            <tr>
                <td><?php echo htmlspecialchars($c['nombre']); ?></td>
                <td><?php echo htmlspecialchars($c['correo']); ?></td>
                <td><?php echo htmlspecialchars($c['telefono']); ?></td>
                <td><?php echo htmlspecialchars($c['direccion']); ?></td>
                <td class="actions">
                    <a href="editar.php?id=<?php echo $c['_id']; ?>" class="button">Editar</a>
                    <a href="index.php?accion=eliminar&id=<?php echo $c['_id']; ?>" class="button" onclick="return confirm('¿Estás seguro de que quieres eliminar a este cliente?');">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>