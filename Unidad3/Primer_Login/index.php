<?php
session_name("Practica 10");
session_start();

require "src/funciones_ctes.php";

if(isset($_POST["btnCerrarSesion"]))
{
    session_destroy();
    header("Location: index.php");
    exit;
}


if(isset($_SESSION["id_usuario"]))
{

    require "src/control_seguridad.php";
    //Si paso este control dispongo de $conexion para hacer cualquier consulta
    //y de $datos_usu_log que contiene los datos del usuario logueado


    //ES que estoy logueado
    if($datos_usu_log["tipo"] == "admin") {
        header("Location:admin/gest_admin.php");
        exit;
    }
    else {
        require "vistas/vista_home.php";
    }
    

    mysqli_close($conexion);
}
else
{
    require "vistas/vista_home.php";
}

?>