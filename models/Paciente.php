<?php

class Paciente {

    private $conn;
    private $table = "paciente";

    public function __construct($db){
        $this->conn = $db;
    }

    public function listar(){

        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear($data){

        $query = "INSERT INTO paciente
        (tipo_documento_id,numero_documento,nombre1,nombre2,apellido1,apellido2,genero_id,departamento_id,municipio_id,correo)
        VALUES
        (:tipo_documento_id,:numero_documento,:nombre1,:nombre2,:apellido1,:apellido2,:genero_id,:departamento_id,:municipio_id,:correo)";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute($data);
    }

    public function actualizar($id, $data){

        $query = "UPDATE paciente SET
            tipo_documento_id = :tipo_documento_id,
            numero_documento = :numero_documento,
            nombre1 = :nombre1,
            nombre2 = :nombre2,
            apellido1 = :apellido1,
            apellido2 = :apellido2,
            genero_id = :genero_id,
            departamento_id = :departamento_id,
            municipio_id = :municipio_id,
            correo = :correo
        WHERE id = :id";

        $data['id'] = $id;
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($data);
    }

    public function eliminar($id){
        $query = "DELETE FROM paciente WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute(['id'=>$id]);
    }
}