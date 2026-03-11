<?php
session_name("Examen2_24_25");
session_start();

require "../src/funciones_ctes.php";


if(isset($_SESSION["id_usuario"]))
{
    $salto="../index.php"; 
    require "../src/control_seguridad.php";

    if($datos_usu_log["tipo"]=="admin")
        require "../vistas/vista_admin.php";
    else
    {
        mysqli_close($conexion);
        header("Location".$salto);
        exit;
    }
}
else
{
    session_destroy();
    header("Location:../index.php");
    exit;

}