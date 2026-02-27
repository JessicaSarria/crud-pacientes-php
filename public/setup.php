<?php

require_once __DIR__ . '/../config/Database.php';

$db = new Database();
$conn = $db->connect();

$sql = "

CREATE TABLE IF NOT EXISTS departamentos (
id INTEGER PRIMARY KEY AUTOINCREMENT,
nombre TEXT
);

CREATE TABLE IF NOT EXISTS municipios (
id INTEGER PRIMARY KEY AUTOINCREMENT,
departamento_id INTEGER,
nombre TEXT
);

CREATE TABLE IF NOT EXISTS tipos_documento (
id INTEGER PRIMARY KEY AUTOINCREMENT,
nombre TEXT
);

CREATE TABLE IF NOT EXISTS genero (
id INTEGER PRIMARY KEY AUTOINCREMENT,
nombre TEXT
);

CREATE TABLE IF NOT EXISTS paciente (
id INTEGER PRIMARY KEY AUTOINCREMENT,
tipo_documento_id INTEGER,
numero_documento TEXT,
nombre1 TEXT,
nombre2 TEXT,
apellido1 TEXT,
apellido2 TEXT,
genero_id INTEGER,
departamento_id INTEGER,
municipio_id INTEGER,
correo TEXT
);

";

$conn->exec($sql);

echo "Base creada correctamente";