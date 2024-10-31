<?php
require_once __DIR__ .'/../config/database.php';

function obtenerClientes() {
    global $tasksCollection;
    return $tasksCollection->find();
}

function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

function crearCliente($nombre, $correo, $telefono, $direccion) {
    global $tasksCollection;
    $resultado = $tasksCollection->insertOne([
        'nombre' => sanitizeInput($nombre),
        'correo' => sanitizeInput($correo),
        'telefono' => sanitizeInput($telefono),
        'direccion' => sanitizeInput($direccion),
    ]);
    return $resultado->getInsertedId();
}

function obtenerClientePorId($id) {
    global $tasksCollection;
    return $tasksCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
}

function actualizarCliente($id, $nombre, $correo, $telefono, $direccion) {
    global $tasksCollection;
    $tasksCollection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectId($id)],
        ['$set' => [
            'nombre' => sanitizeInput($nombre),
            'correo' => sanitizeInput($correo),
            'telefono' => sanitizeInput($telefono),
            'direccion' => sanitizeInput($direccion),
        ]]
    );
}

function eliminarCliente($id) {
    global $tasksCollection;
    $tasksCollection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
}
?>
