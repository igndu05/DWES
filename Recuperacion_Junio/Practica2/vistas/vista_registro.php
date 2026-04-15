<?php

if (isset($_POST["btnGuardarCambios"])){
    $error_usuario = $_POST["usuario"] == "";
    $error_nombre = $_POST["nombre"] == "";
    $error_contraseña = $_POST["clave"] == "";
    $error_dni = $_POST["dni"] == "" || !dni_bien_escrito($_POST["dni"]) || !dni_valido($_POST["dni"]);
    $error_boletin = !isset($_POST["boletin"]);
    $error_archivo = $_FILES["archivo"]["name"] != "" && ($_FILES["archivo"]["error"] || !tiene_extension($_FILES["archivo"]["name"]) || !es_imagen($_FILES["archivo"]["tmp_name"], $_FILES["archivo"]["size"]) || $_FILES["archivo"]["size"] > 1024*500);

    $error_form = $error_usuario || $error_nombre || $error_contraseña || $error_dni || $error_boletin || $error_archivo;


    if (!$error_form){
        try {
            $conexion = new PDO("mysql:host=" . SERVIDOR_BD . ";dbname=" . NOMBRE_BD, USUARIO_BD, CLAVE_BD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        } catch (PDOException $e) {
            session_destroy();
            die(error_page("Práctica Rec 2", "<h1>Práctica Rec 2</h1><p>Error no se ha podido conectar a la BD: " . $e->getMessage() . "</p>"));
        }

        try {
            $consulta = "INSERT INTO usuarios (usuario, clave, nombre, dni, sexo, foto, subscripcion, tipo) VALUES (?,?,?,?,?,?,?,?)";
            $sentencia = $conexion->prepare($consulta);
            $sentencia->execute([$_POST["usuario"], md5($_POST["clave"]), $_POST["nombre"], $_POST["dni"], $_POST["sexo"], $_FILES["archivo"]["name"]]);
        } catch (PDOException $e) {
            session_destroy();
            $sentencia = null;
            $conexion = null;
            die(error_page("Práctica Rec 2", "<h1>Práctica Rec 2</h1><p>Error no se ha podido realizar la inserción: " . $e->getMessage() . "</p>"));
        }
    }
}

if (isset($_POST["btnBorrarDatos"])) {
    unset($_POST);
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 2 - Recuperación 25-26</title>
    <style>
        .error {color:red}
    </style>
</head>
<body>
    <h1>Práctica Rec 2</h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="usuario">Usuario:</label><br/>
            <input type="text" name="usuario" id="usuario" placeholder="Usuario..."/>
            <?php
            if (isset($_POST["btnGuardarCambios"]) && $error_usuario)
            {
                echo "<span class='error'>* Debe añadir un nombre de usuario *</span>";
            }
            ?>
        </p>
        
        <p>
            <label for="nombre">Nombre:</label><br/>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre..."/>
            <?php
            if (isset($_POST["btnGuardarCambios"]) && $error_nombre)
            {
                echo "<span class='error'>* Debe añadir un nombre *</span>";
            }
            ?>
        </p>
        
        <p>
            <label for="clave">Contraseña:</label><br/>
            <input type="password" name="clave" id="clave" placeholder="Contraseña..."/>
            <?php
            if (isset($_POST["btnGuardarCambios"]) && $error_contraseña)
            {
                echo "<span class='error'>* Debe añadir una contraseña *</span>";
            }
            ?>
        </p>
        
        <p>
            <label for="dni">DNI:</label><br/>
            <input type="text" name="dni" id="dni" placeholder="DNI..."/>
            <?php
            if (isset($_POST["btnGuardarCambios"]) && $error_dni)
            {
                if ($_POST["dni"] == "")
                    echo "<span class='error'>* Debe añadir un DNI *</span>";
                elseif (!dni_bien_escrito($_POST["dni"]))
                    echo "<span class='error'>* Debe escribir un DNI correctamente *</span>";
                elseif (!dni_valido($_POST["dni"]))
                    echo "<span class='error'>* Debe escribir un DNI válido *</span>";

            }
            ?>
        </p>
        
        <p>
            <label for="sexo">Sexo:</label>
            <input type="radio" id="hombre" name="sexo" value="hombre" checked/><label for="hombre">Hombre</label>
            <input type="radio" id="mujer" name="sexo" value="mujer"/><label for="mujer">Mujer</label>
        </p>
        
        
        <p>
            <label for="archivo">Incluir mi foto (Máx. 500 KB)</label>
            <input type="file" name="archivo" id="archivo"/>
            <?php
            if (isset($_POST["btnGuardarCambios"]) && $error_archivo)
            {
                if($_FILES["archivo"]["error"]) {
                    echo "<span class='error'>* Error en la subida del fichero al servidor *</span>";
                }
                elseif(!tiene_extension($_FILES["archivo"]["name"])) {
                    echo "<span class='error'>* El archivo seleccionado no tiene extension *</span>";
                }
                elseif(!es_imagen($_FILES["archivo"]["tmp_name"], $_FILES["archivo"]["size"])) {
                    echo "<span class='error'>* No has seleccionado un archivo de tipo imagen *</span>";
                }
                else {
                    echo "<span class='error'>* El archivo imagen seleccionado sobrepasa los 500 KB *</span>";
                }
            }
            ?>
        </p>

        <p>
            <input type="checkbox" name="boletin" id="boletin"/>
            <label for="boletin">Suscribirme al boletin de novedades</label>
            <?php
            if(isset($_POST["btnEnviar"]) && $error_boletin)
                echo "<span class='error'> Debes suscribirte al boletin</span>"
            ?>
        </p>
       
        <p>
            <button type="submit" name="btnGuardarCambios">Guardar cambios</button>
            <button type="submit" name="btnBorrarDatos">Borrar los datos introducidos</button>
        </p>

    </form>
</body>
</html>