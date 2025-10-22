<?php

function comprobarExtension($name)
{
    $array = explode(".", $name);
    if (count($array) > 1) {
        $extension = end($array);
    }
    return $extension;
}

function myGetimagesize($foto)
{
    if ($foto["tmp_name"] == "") {
        return false;
    }
    return $foto["size"] > 0 ?  getimagesize($foto["tmp_name"]) : false;
}


if (isset($_POST["btnEnviar"])) {
    $FotoNoVacia = $_FILES["foto"]["name"] != "";
    $errorHaDadoFallo = $_FILES["foto"]["error"];
    $errorFotoMuyGrande = $_FILES["foto"]["size"] > 500 * 1024;
    $errorExtension = !comprobarExtension($_FILES["foto"]["name"]);
    $errorType = !myGetimagesize($_FILES["foto"]);

    $errorFormulario = $FotoNoVacia && (
        $errorHaDadoFallo ||
        $errorFotoMuyGrande ||
        $errorExtension ||
        $errorType);
}
if (isset($_POST["btnEnviar"]) && !$errorFormulario) {
    include "vistas/recogida.php";
} else {
    include "vistas/formNoReq.php";
}
