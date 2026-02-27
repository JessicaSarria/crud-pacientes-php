<?php

class UserController {

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function login(){

        $input = json_decode(file_get_contents("php://input"), true);

        if(!$input){
            echo json_encode(["error"=>"Datos inválidos"]);
            return;
        }

        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = :u AND password = :p");
        $stmt->execute([
            "u"=>$input["username"],
            "p"=>$input["password"]
        ]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user){
            $_SESSION["user"] = $user["username"];
            echo json_encode(["mensaje"=>"Login correcto"]);
        }else{
            echo json_encode(["error"=>"Credenciales incorrectas"]);
        }
    }

    public function check(){
        echo json_encode(["ok"=>isset($_SESSION["user"])]);
    }

    public function logout(){
        session_destroy();
        echo json_encode(["mensaje"=>"Sesión cerrada"]);
    }
}