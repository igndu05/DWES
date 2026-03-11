<?php
require "src/funciones_ctes.php";

function comprobarExtension($name)
{
    $extension = false;
    $array = explode(".", $name); // como el split de java
    if (count($array) > 1) {
        $extension = end($array);
    }
    return $extension;
}

if(isset($_POST["btnEnviar"]))
{
    //Compruebo errores del formulario
    $error_nombre=$_POST["nombre"]=="" || strlen($_POST["nombre"])>15;
    $error_apellidos=$_POST["apellidos"]=="" || strlen($_POST["apellidos"])>40;
    $error_clave=$_POST["clave"]=="" || strlen($_POST["clave"])>15;
    $error_dni=strlen($_POST["dni"])!=9;
    $error_sexo=!isset($_POST["sexo"]);
    $error_comentarios=$_POST["comentarios"]=="";
    $error_subs=!isset($_POST["subs"]);
    $error_foto=$_FILES["foto"]["name"] != "" && ($_FILES["foto"]["error"] || !tiene_extension($_FILES["foto"]["name"]) || $_FILES["foto"]["size"] > 500*1024 || !exif_imagetype($_FILES["foto"]["tmp_name"]));

    $error_formulario=$error_nombre||$error_apellidos||$error_clave||$error_dni||$error_sexo||$error_comentarios||$error_subs||$error_foto;

    
}

if(isset($_POST["btnEnviar"]) && !$error_formulario)
{
    require "vistas/vista_recogida.php";
}
else
{
    require "vistas/vista_formulario.php";

}
?>