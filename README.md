# 🏥 CRUD de Pacientes — API REST + Frontend

Aplicación web full-stack desarrollada en **PHP puro (MVC)** con base de datos **SQLite**, que permite gestionar pacientes mediante una **API REST** y una interfaz web interactiva.

Este proyecto fue construido como prueba técnica y optimizado para portafolio profesional, demostrando arquitectura, seguridad básica, validaciones y comunicación frontend-backend.

---

## 🚀 Funcionalidades

### 🔹 Backend (PHP)

* API REST para pacientes
* CRUD completo (crear, listar, actualizar, eliminar)
* Conexión a base de datos mediante **PDO**
* Protección contra inyección SQL (prepared statements)
* Validación de datos (correo, campos obligatorios)
* Sistema de autenticación con sesión
* Arquitectura MVC simple

### 🔹 Base de Datos

* Script de migración (`setup.php`)
* Seeders automáticos:

  * Departamentos
  * Municipios
  * Tipos de documento
  * Géneros
  * Usuario administrador
  * Pacientes de prueba

### 🔹 Frontend (HTML + JS)

* Login funcional
* Formulario para registrar pacientes
* Tabla dinámica con AJAX (Fetch API)
* Eliminación de pacientes en tiempo real
* Manejo de errores y mensajes al usuario
* Sin recargas de página

---

## 🗂️ Estructura del proyecto

```
config/          → conexión a base de datos
controllers/     → lógica de negocio y API
models/          → acceso a datos (PDO)
public/          → frontend y punto de entrada
database.db      → base SQLite
setup.php        → migraciones + seeders
```

---

## ⚙️ Instalación y ejecución

1. Clonar el repositorio

```bash
git clone TU_URL
cd crud-pacientes
```

2. Iniciar servidor PHP

```bash
php -S localhost:8000 -t public
```

3. Crear base de datos y seeders

Abrir en navegador:

```
http://localhost:8000/setup.php
```

4. Abrir la aplicación

```
http://localhost:8000/index.html
```

---

## 🔑 Credenciales de acceso

```
Usuario: admin
Contraseña: 1234567890
```

---

## 🧠 Tecnologías utilizadas

* PHP 8 (sin framework)
* SQLite
* PDO
* HTML5
* CSS básico
* JavaScript (Fetch API)
* Arquitectura MVC

---

## 📌 Buenas prácticas aplicadas

* Separación de responsabilidades (MVC)
* Prepared statements para seguridad
* Validación backend
* Manejo de sesiones
* API desacoplada del frontend
* Código modular y legible

---

## 👩‍💻 Autor

**Jessica Valeria Sarria Sánchez**

Proyecto desarrollado como prueba técnica y pieza de portafolio profesional.
