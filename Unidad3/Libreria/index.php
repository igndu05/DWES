<?php
session_name("Examen2_24_25");
session_start();


if(isset($_POST["btnCerrarSesion"]))
{
    session_destroy();
    header("Location:index.php");
    exit;
}


require "src/funciones_ctes.php";


if(isset($_SESSION["id_usuario"]))
{
    //Estoy logueado
    //Tengo que pasar control de seguridad
    $salto="index.php"; 
    require "src/control_seguridad.php";

    if($datos_usu_log["tipo"]=="normal")
        require "vistas/vista_normal.php";
    else
    {
        mysqli_close($conexion);
        header("Location:admin/gest_libros.php");
        exit;
    }
}
else
{
    //No logueado
    require "vistas/vista_home.php";
}
?>