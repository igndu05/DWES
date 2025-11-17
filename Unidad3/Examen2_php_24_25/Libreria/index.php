<?php
// Abrimos siempre session name y session start.
session_name("ExamenLibreria");
session_start();

// Require lo que hace es copiar y pegar por ti el codigo de un fichero,
// hacer hace exactamente lo mismo, SOLO ES PARA ORDENAR EL CODIGO.
require "src/funciones_ctes.php";

// Me conecto BD y me traigo los libros
try {
    @$conexion = mysqli_connect(SERVIDOR_BD, USUARIO_BD, CLAVE_BD, NOMBRE_BD);
    mysqli_set_charset($conexion, "utf8");
} catch (Exception $e) {
    session_destroy();
    die(error_page("ERROR","<h1>Mierdon de pagina (razon = ".$e -> getMessage().")</h1>"));
}

try {
    $consulta = "select * from libros";
    $result_libros = mysqli_query($conexion, $consulta);
} catch (Exception $e) {
    mysqli_close($conexion);
    session_destroy();
    die(error_page("ERROR","<h1>Mierdon de consulta (razon = ".$e -> getMessage().")</h1>"));
}



if (isset($_SESSION["id_usuario"])) 
{
    // Estoy logueado

} 
else
{
    // No estoy logueado
    require "vistas/vista_home.php";
}



mysqli_close($conexion);

?>
