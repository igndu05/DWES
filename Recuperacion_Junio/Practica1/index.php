<?php

// COPIA EL CODIGO
require 'src/funciones_ctes.php';

if (isset($_POST['btnReset']))
{
    /* Elimina todos los $_POST
    unset($_POST);
    */

    header("Location:index.php");
    exit;
    
}



if(isset($_POST["btnEnviar"])){
    // Comprobar errores

    $error_usuario = $_POST["usuario"] == "";
    $error_nombre = $_POST["nombre"] == "";
    $error_clave = $_POST["clave"] == "";
    $error_dni = $_POST["dni"] == "" || !dni_bien_escrito($_POST["dni"]) || !dni_valido($_POST["dni"]);
    $error_boletin = !isset($_POST["boletin"]);

    $error_form = $error_usuario || $error_nombre || $error_clave || $error_dni || $error_boletin;
}

if(isset($_POST["btnEnviar"]) && !$error_form)
{
    require "vistas/vista_respuesta.php";
}
else
{
    require "vistas/vista_formulario.php";
}
?>