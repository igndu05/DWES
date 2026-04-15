<?php
const SERVIDOR_BD = "localhost";
const NOMBRE_BD = "bd_rec_cv";
const USUARIO_BD = "jose";
const CLAVE_BD = "josefa";

const TIEMPO_SESION = 5; //MINUTOS
function error_page($title, $body)
{
    return '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>' . $title . '</title>
</head>
<body>
    ' . $body . '
</body>
</html>';
}

function dni_bien_escrito($texto) 
{
    $dni = strtoupper($texto);

    /*
    $longitud_buena = strlen($dni) == 9;
    $es_numero = is_numeric(substr($dni,0,8));
    $es_letra = substr($dni, -1) >= "A" && substr($dni, -1) <= "Z";
    */
    return strlen($dni) == 9 && is_numeric(substr($dni,0,8)) && substr($dni, -1) >= "A" && substr($dni, -1) <= "Z";
}

function LetraNIF ($dni) {
    return substr("TRWAGMYFPDXBNJZSQVHLCKE", $dni % 23, 1); 
}

function dni_valido ($texto) {
    $dni = strtoupper($texto);

    return LetraNIF(substr($dni,0,8)) == substr($dni, -1);
}

function tiene_extension ($nombre_archivo) {
    $extension = false;
    $array = explode(".", $nombre_archivo);
    if(count($array) > 1){
        // $extension = $array[count($array) - 1];
        $extension = end($array);
    }

    return $extension;
}

function es_imagen ($file, $size) {
    $es_imagen = false;

    if($size > 0) {
        $es_imagen = getimagesize($file);
    }

    return $es_imagen;
}
?>