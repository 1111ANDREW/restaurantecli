<?php
require_once __DIR__ .'/../config/database.php';

function sanitizeInput($input) {
    // Elimina espacios en blanco al principio y al final
    $input = trim($input);
    // Elimina barras invertidas
    $input = stripslashes($input);
    // Convierte caracteres especiales a entidades HTML
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    return $input;
}


function obtenerProductos(){
    global $colleccionProductos;
    return $colleccionProductos->find();
}
function crearProducto($nombre, $precio, $descripcion, $categoria){
    global $colleccionProductos;
    $resultado = $colleccionProductos->insertOne([
        'nombre' => sanitizeInput($nombre),
        'precio' => sanitizeInput($precio),
        'descripcion' => sanitizeInput($descripcion),
        'categoria' => sanitizeInput($categoria),
        'disponible' => true,
        // 'fechaNacimiento' => new MongoDB\BSON\UTCDateTime(strtotime($fechaNacimiento) * 1000),
    ]);
    return $resultado->getInsertedId();
}
function obtenerProductoPorId($id) {
    global $colleccionProductos;
    return $colleccionProductos->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
}
function actualizarProducto($id, $nombre, $precio, $descripcion, $categoria, $disponible) {
    global $colleccionProductos;
    $resultado = $colleccionProductos->updateOne(
        ['_id' => new MongoDB\BSON\ObjectId($id)],
        ['$set' => [
            'nombre' => sanitizeInput($nombre),
            'precio' => sanitizeInput($precio),
            'descripcion' => sanitizeInput($descripcion),
            'categoria' => sanitizeInput($categoria),
            'disponible' => $disponible,
            // 'fechaNacimiento' => new MongoDB\BSON\UTCDateTime(strtotime($fechaNacimiento) * 1000),
        ]]
    );
    return $resultado->getModifiedCount();
}
function eliminarProducto($id) {
    global $colleccionProductos;
    $resultado = $colleccionProductos->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    return $resultado->getDeletedCount();
}
?>
