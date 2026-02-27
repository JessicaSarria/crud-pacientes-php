<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../controllers/PacienteController.php';

header("Content-Type: application/json");

$db = new Database();
$conn = $db->connect();

$controller = new PacienteController($conn);

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];

// Extraer ID si viene /pacientes/1
$segments = explode('/', trim($path,'/'));
$id = $segments[1] ?? null;

if($method === 'GET' && $segments[0] === 'pacientes'){
    $controller->listar();
}
elseif($method === 'POST' && $segments[0] === 'pacientes'){
    $controller->crear();
}
elseif($method === 'PUT' && $segments[0] === 'pacientes' && $id){
    $controller->actualizar($id);
}
elseif($method === 'DELETE' && $segments[0] === 'pacientes' && $id){
    $controller->eliminar($id);
}
else{
    echo json_encode(["mensaje"=>"Ruta no encontrada"]);
}