<?php
session_name("Pract2_Recp_25_26");
session_start();

require "src/funciones_ctes.php";


if(isset($_POST["btnCerrarSesion"]))
{
    session_destroy();
    header("Location:index.php");
    exit;
}




if(isset($_SESSION["usuario"]))
{

    // Hay que pasar el control de seguridad.
    require "src/control_seguridad.php";

    // Te has logueado y según tipo te cargaré vista_normal
    // o vista_admin.
    if($datos_usu_log["tipo"] == "normal")
    {
        require "vistas/vista_normal.php";
    }
    else
    {
        require "vistas/vista_admin.php";
    }

    $conexion = null;
}
elseif(isset($_POST["btnRegistrar"]) || isset($_POST["btnGuardarCambios"]) || isset($_POST["btnBorrarDatos"]))
{
    require "vistas/vista_registro.php";
}
else
{
    require "vistas/vista_login.php";
}

?>