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

    // Te has logueado y según tipo te cargaré vista_normal
    // o vista_admin.
    require "vistas/vista_logueado.php";
}
elseif(isset($_POST["btnRegistrar"]))
{
    require "vistas/vista_registro.php";
}
else
{
    require "vistas/vista_login.php";
}

?>