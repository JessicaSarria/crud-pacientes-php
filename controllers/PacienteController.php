<?php

require_once __DIR__ . '/../models/Paciente.php';

class PacienteController {

    private $paciente;

    public function __construct($db){
        $this->paciente = new Paciente($db);
    }

    private function checkAuth(){
        if(!isset($_SESSION["user"])){
            echo json_encode(["error"=>"No autorizado"]);
            exit;
        }
    }

    private function validarDatos($input){

        if(!isset($input["nombre1"]) || trim($input["nombre1"]) === ""){
            return "Nombre obligatorio";
        }

        if(!isset($input["correo"]) || !filter_var($input["correo"], FILTER_VALIDATE_EMAIL)){
            return "Correo inválido";
        }

        return null;
    }

    public function listar(){
        $this->checkAuth();
        echo json_encode($this->paciente->listar());
    }

    public function crear(){
        $this->checkAuth();

        $input = json_decode(file_get_contents("php://input"), true);
        if(!$input){ echo json_encode(["error"=>"Datos inválidos"]); return; }

        $error = $this->validarDatos($input);
        if($error){ echo json_encode(["error"=>$error]); return; }

        echo json_encode(
            $this->paciente->crear($input)
            ? ["mensaje"=>"Paciente creado correctamente"]
            : ["error"=>"No se pudo crear"]
        );
    }

    public function actualizar($id){
        $this->checkAuth();

        $input = json_decode(file_get_contents("php://input"), true);
        if(!$input){ echo json_encode(["error"=>"Datos inválidos"]); return; }

        $error = $this->validarDatos($input);
        if($error){ echo json_encode(["error"=>$error]); return; }

        echo json_encode(
            $this->paciente->actualizar($id,$input)
            ? ["mensaje"=>"Paciente actualizado correctamente"]
            : ["error"=>"No se pudo actualizar"]
        );
    }

    public function eliminar($id){
        $this->checkAuth();

        echo json_encode(
            $this->paciente->eliminar($id)
            ? ["mensaje"=>"Paciente eliminado correctamente"]
            : ["error"=>"No se pudo eliminar"]
        );
    }
}