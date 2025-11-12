<?php
session_name("Practica 10");
session_start();

require "../src/funciones_ctes.php";

if (isset($_SESSION["id_usuario"]))
{
    require "../src/control_seguridad.php";
    if($datos_usu_log["tipo"] == "normal") {
        header("Location:../index.php");
        exit;
    }
    else {
        require "vistas/vista_home.php";
    }
    

    mysqli_close($conexion);
}
else
{
    header("Location:../index.php");
    exit;
}
?>
