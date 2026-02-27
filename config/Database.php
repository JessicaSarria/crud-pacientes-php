<?php

class Database {

    private $dbPath = __DIR__ . '/../database.db';
    public $conn;

    public function connect() {

        try {
            $this->conn = new PDO("sqlite:" . $this->dbPath);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;

        } catch(PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }

    }
}