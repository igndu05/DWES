<?php

function comprobarExtension($name)
{
    $extension = false;
    $array = explode(".", $name); // como el split de java
    if (count($array) > 1) {
        $extension = end($array);
    }
    return $extension;
}

function myGetimagesize($foto){
    return $foto["size"] > 0 ?  getimagesize($foto["tmp_name"]) : false;
}


if (isset($_POST["btnEnviar"])) {
    $errorFotoVacia = $_FILES["foto"]["name"] == "";
    $errorHaDadoFallo = $_FILES["foto"]["error"];
    $errorFotoMuyGrande = $_FILES["foto"]["size"] > 500 * 1024;
    $errorExtension = !comprobarExtension($_FILES["foto"]["name"]);
    $errorType = !myGetimagesize($_FILES["foto"]);

    $errorFormulario = $errorFotoVacia ||
        $errorHaDadoFallo ||
        $errorFotoMuyGrande ||
        $errorExtension ||
        $errorType;
}
if (isset($_POST["btnEnviar"]) && !$errorFormulario) {
    include "vistas/recogida.php";
} else {
    include "vistas/form.php";
}
