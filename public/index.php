<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../controllers/PacienteController.php';
require_once __DIR__ . '/../controllers/UserController.php';

header("Content-Type: application/json");

if(session_status() === PHP_SESSION_NONE){
    session_start();
}

$db = new Database();
$conn = $db->connect();

$pacienteController = new PacienteController($conn);
$userController = new UserController($conn);

$method = $_SERVER['REQUEST_METHOD'];

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', trim($uri,'/'));

$route = end($segments);   // 🔥 clave
$id = $segments[count($segments)-1] ?? null;

/* ===== AUTH ===== */

if($method === 'POST' && $route === 'login'){
    $userController->login();
}
elseif($method === 'GET' && $route === 'logout'){
    $userController->logout();
}
elseif($method === 'GET' && $route === 'check'){
    $userController->check();
}

/* ===== PACIENTES ===== */

elseif($method === 'GET' && $route === 'pacientes'){
    $pacienteController->listar();
}
elseif($method === 'POST' && $route === 'pacientes'){
    $pacienteController->crear();
}
elseif($method === 'PUT' && strpos($uri,'pacientes')!==false){
    $id = basename($uri);
    $pacienteController->actualizar($id);
}
elseif($method === 'DELETE' && strpos($uri,'pacientes')!==false){
    $id = basename($uri);
    $pacienteController->eliminar($id);
}
else{
    echo json_encode(["mensaje"=>"Ruta no encontrada"]);
}