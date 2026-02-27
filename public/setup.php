<?php

require_once __DIR__ . '/../config/Database.php';

$db = new Database();
$conn = $db->connect();

/* TABLAS */

$conn->exec("
CREATE TABLE IF NOT EXISTS users(
id INTEGER PRIMARY KEY AUTOINCREMENT,
username TEXT,
password TEXT
);

CREATE TABLE IF NOT EXISTS departamentos(
id INTEGER PRIMARY KEY AUTOINCREMENT,
nombre TEXT
);

CREATE TABLE IF NOT EXISTS municipios(
id INTEGER PRIMARY KEY AUTOINCREMENT,
departamento_id INTEGER,
nombre TEXT
);

CREATE TABLE IF NOT EXISTS tipos_documento(
id INTEGER PRIMARY KEY AUTOINCREMENT,
nombre TEXT
);

CREATE TABLE IF NOT EXISTS genero(
id INTEGER PRIMARY KEY AUTOINCREMENT,
nombre TEXT
);

CREATE TABLE IF NOT EXISTS paciente(
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
");

/* SEEDERS */

// Admin
$conn->exec("INSERT INTO users(username,password) VALUES('admin','1234567890')");

// Departamentos
$conn->exec("INSERT INTO departamentos(nombre) VALUES
('Huila'),('Tolima'),('Cundinamarca'),('Antioquia'),('Valle')");

// Tipos documento
$conn->exec("INSERT INTO tipos_documento(nombre) VALUES('CC'),('TI')");

// Genero
$conn->exec("INSERT INTO genero(nombre) VALUES('Femenino'),('Masculino')");

// Pacientes demo
$conn->exec("INSERT INTO paciente
(tipo_documento_id,numero_documento,nombre1,apellido1,genero_id,departamento_id,municipio_id,correo)
VALUES
(1,'1001','Ana','Lopez',1,1,1,'ana@mail.com'),
(1,'1002','Luis','Perez',2,2,3,'luis@mail.com')
");

echo "Base y seeders creados";