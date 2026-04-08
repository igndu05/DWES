<?php

if (isset($_POST['btnReset']))
{
    /* Elimina todos los $_POST
    unset($_POST);
    */

    header("Location:index.php");
    exit;
    
}


if (isset($_POST["btnEnviar"])) {
    $error_nombre = $_POST["nombre"] == "";
    $error_sexo = !isset($_POST["sexo"]);
    $error_comentarios = $_POST["comentarios"] == "";


    $error_form = $error_nombre || $error_comentarios || $error_sexo;
}



if (isset($_POST["btnEnviar"]) && !$error_form) 
{
    require "vistas/vista_respuesta.php";
}
else
{
    require "vistas/vista_formulario.php";
}
?>

