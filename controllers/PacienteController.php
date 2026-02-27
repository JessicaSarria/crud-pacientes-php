<?php

require_once __DIR__ . '/../models/Paciente.php';

class PacienteController {

    private $paciente;

    public function __construct($db){
        $this->paciente = new Paciente($db);
    }

    public function listar(){
        $data = $this->paciente->listar();
        echo json_encode($data);
    }

    public function crear(){

        $input = json_decode(file_get_contents("php://input"), true);

        if(!$input){
            echo json_encode(["error"=>"Datos inválidos"]);
            return;
        }

        if($this->paciente->crear($input)){
            echo json_encode(["mensaje"=>"Paciente creado"]);
        }else{
            echo json_encode(["error"=>"No se pudo crear"]);
        }
    }

    public function actualizar($id){

        $input = json_decode(file_get_contents("php://input"), true);

        if(!$input){
            echo json_encode(["error"=>"Datos inválidos"]);
            return;
        }

        if($this->paciente->actualizar($id,$input)){
            echo json_encode(["mensaje"=>"Paciente actualizado"]);
        }else{
            echo json_encode(["error"=>"No se pudo actualizar"]);
        }
    }

    public function eliminar($id){

        if($this->paciente->eliminar($id)){
            echo json_encode(["mensaje"=>"Paciente eliminado"]);
        }else{
            echo json_encode(["error"=>"No se pudo eliminar"]);
        }
    }
}