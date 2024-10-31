<?php
require_once __DIR__ . '/../config/database.php';

$productosCollection = $db->productos;

function obtenerProductos() {
    global $productosCollection;
    return $productosCollection->find();
}

function crearProducto($nombre, $descripcion, $precio, $stock) {
    global $productosCollection;
    $resultado = $productosCollection->insertOne([
        'nombre' => sanitizeInput($nombre),
        'descripcion' => sanitizeInput($descripcion),
        'precio' => sanitizeInput($precio),
        'stock' => sanitizeInput($stock),
    ]);
    return $resultado->getInsertedId();
}

function obtenerProductoPorId($id) {
    global $productosCollection;
    return $productosCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
}

function actualizarProducto($id, $nombre, $descripcion, $precio, $stock) {
    global $productosCollection;
    $productosCollection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectId($id)],
        ['$set' => [
            'nombre' => sanitizeInput($nombre),
            'descripcion' => sanitizeInput($descripcion),
            'precio' => sanitizeInput($precio),
            'stock' => sanitizeInput($stock),
        ]]
    );
}

function eliminarProducto($id) {
    global $productosCollection;
    $productosCollection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
}
?>
