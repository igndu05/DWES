<?php
session_name("Examen2_25_26");
session_start();

require "src/funciones_ctes.php";

//Aquí pondría el código para cerrar la Sesión


if(isset($_SESSION["logueado"]))
{
   
    require "src/control_seguridad.php";
    /// Acabo de pasar el control de seguridad y ahora tengo que cargar las vistas oportunas

}
else
{
    //NO estoy logueado y cargo la vista home
    require "vistas/vista_home.php";
}


?>