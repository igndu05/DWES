<?php

require __DIR__ . '/Slim/autoload.php';

$app= new \Slim\App;

const NOMBRE_BD = "bd_tienda";
const SERVIDOR_BD="localhost";
const USUARIO_BD="jose";
const CLAVE_BD="josefa";

function obtener_productos() {
    try {
        $conexion = new PDO("mysql:host=".SERVIDOR_BD.";dbname=".NOMBRE_BD,USUARIO_BD,CLAVE_BD)
    } catch(PDOException $e){
        $respuesta["error_bd"] = "Error no se ha podido conectar con la BD: ".$e-getMessage();
        return $respuesta;
    }
}



$app->get("/productos", function(){
    
    echo json_encode(obtener_productos());
});

// Una vez creado servicios los pongo a disposición
$app->run();
?>