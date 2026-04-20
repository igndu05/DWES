<?php

if (isset($_POST["btnGuardarCambios"])) {
    $error_usuario = $_POST["usuario"] == "";
    if (!$error_usuario) {
        try {
            $conexion = new PDO("mysql:host=" . SERVIDOR_BD . ";dbname=" . NOMBRE_BD, USUARIO_BD, CLAVE_BD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        } catch (PDOException $e) {
            session_destroy();
            die(error_page("Práctica Rec 2", "<h1>Práctica Rec 2</h1><p>Error no se ha podido conectar a la BD: " . $e->getMessage() . "</p>"));
        }

        try {
            $consulta = "SELECT usuario FROM usuarios WHERE usuario=?";
            $sentencia = $conexion->prepare($consulta);
            $sentencia->execute([$_POST["usuario"]]);
        } catch (PDOException $e) {
            session_destroy();
            $sentencia = null;
            $conexion = null;
            die(error_page("Práctica Rec 2", "<h1>Práctica Rec 2</h1><p>Error no se ha podido realizar la consulta: " . $e->getMessage() . "</p>"));
        }

        //RowCount devuelve el numero de tuplas obtenidas.
        $error_usuario = $sentencia->rowCount() > 0;
        $sentencia = null;
    }

    $error_nombre = $_POST["nombre"] == "";
    $error_contraseña = $_POST["clave"] == "";
    $error_dni = $_POST["dni"] == "" || !dni_bien_escrito($_POST["dni"]) || !dni_valido($_POST["dni"]);

    if (!$error_dni) {
        if (!isset($conexion)) {
            try {
                $conexion = new PDO("mysql:host=" . SERVIDOR_BD . ";dbname=" . NOMBRE_BD, USUARIO_BD, CLAVE_BD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            } catch (PDOException $e) {
                session_destroy();
                die(error_page("Práctica Rec 2", "<h1>Práctica Rec 2</h1><p>Error no se ha podido conectar a la BD: " . $e->getMessage() . "</p>"));
            }
        }

        try {
            $consulta = "SELECT dni FROM usuarios WHERE dni=?";
            $sentencia = $conexion->prepare($consulta);
            $sentencia->execute([strtoupper($_POST["dni"])]);
        } catch (PDOException $e) {
            session_destroy();
            $sentencia = null;
            $conexion = null;
            die(error_page("Práctica Rec 2", "<h1>Práctica Rec 2</h1><p>Error no se ha podido realizar la consulta: " . $e->getMessage() . "</p>"));
        }

        //RowCount devuelve el numero de tuplas obtenidas.
        $error_dni = $sentencia->rowCount() > 0;
        $sentencia = null;
    }
    $error_boletin = !isset($_POST["boletin"]);
    $error_archivo = $_FILES["archivo"]["name"] != "" && ($_FILES["archivo"]["error"] || !tiene_extension($_FILES["archivo"]["name"]) || !es_imagen($_FILES["archivo"]["tmp_name"], $_FILES["archivo"]["size"]) || $_FILES["archivo"]["size"] > 1024 * 500);

    $error_form = $error_usuario || $error_nombre || $error_contraseña || $error_dni || $error_boletin || $error_archivo;


    if (!$error_form) {
        try {
            $consulta = "INSERT INTO usuarios (usuario, nombre, clave, dni, sexo) VALUES (?,?,?,?,?,?,?,?)";
            $sentencia = $conexion->prepare($consulta);
            $sentencia->execute([$_POST["usuario"], $_POST["nombre"], md5($_POST["clave"]), strtoupper($_POST["dni"]), $_POST["sexo"]]);
        } catch (PDOException $e) {
            session_destroy();
            $sentencia = null;
            $conexion = null;
            die(error_page("Práctica Rec 2", "<h1>Práctica Rec 2</h1><p>Error no se ha podido realizar la inserción: " . $e->getMessage() . "</p>"));
        }

        $sentencia = null;
        $id_usuario = $conexion->lastInsertId();
        $_SESSION["registro"] = "Usted se ha registrado correctamente";

        if ($_FILES["archivo"]["name"] != "") {
            $nombre_nuevo = "img_" . $id_usuario . "." . tiene_extension($_FILES["archivo"]["name"]);
            @$var = move_uploaded_file($_FILES["archivo"]["tmp_name"], "images/" . $nombre_nuevo);
            if ($var) {
                try {
                    $consulta = "UPDATE usuarios SET foto=? WHERE id_usuario=?";
                    $sentencia = $conexion->prepare($consulta);
                    $sentencia->execute([$nombre_nuevo, $id_usuario]);
                } catch (PDOException $e) {
                    $_SESSION["registro"] = "Usted se ha resgitrado correctamente, pero con la imagen por defecto porque no se ha podido actualizar la BD.";
                    unlink("images/".$nombre_nuevo);
                }

                $sentencia = null;
            } else {
                $_SESSION["registro"] = "Usted se ha resgitrado correctamente, pero con la imagen por defecto porque no se ha podido mover la imagen a la carpeta destino.";
            }
        }


        $conexion = null;
        $_SESSION["usuario"] = $id_usuario;
        $_SESSION["ultima_accion"] = time();
        header("Location:index.php");
        exit;
    }

    if (!isset($conexion)) {
        $conexion = null;
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
    <title>Practica Rec 2</title>
    <style>
        .error {
            color: red
        }
    </style>
</head>

<body>
    <h1>Práctica Rec 2</h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="usuario">Usuario:</label><br />
            <input type="text" name="usuario" id="usuario" placeholder="Usuario..." />
            <?php
            if (isset($_POST["btnGuardarCambios"]) && $error_usuario) {
                if ($_POST["usuario"] == "")
                    echo "<span class='error'>* Debe añadir un nombre de usuario *</span>";
                else
                    echo "<span class='error'>* El usuario está repetido en la BD *</span>";
            }
            ?>
        </p>

        <p>
            <label for="nombre">Nombre:</label><br />
            <input type="text" name="nombre" id="nombre" placeholder="Nombre..." />
            <?php
            if (isset($_POST["btnGuardarCambios"]) && $error_nombre) {
                echo "<span class='error'>* Debe añadir un nombre *</span>";
            }
            ?>
        </p>

        <p>
            <label for="clave">Contraseña:</label><br />
            <input type="password" name="clave" id="clave" placeholder="Contraseña..." />
            <?php
            if (isset($_POST["btnGuardarCambios"]) && $error_contraseña) {
                echo "<span class='error'>* Debe añadir una contraseña *</span>";
            }
            ?>
        </p>

        <p>
            <label for="dni">DNI:</label><br />
            <input type="text" name="dni" id="dni" placeholder="DNI..." />
            <?php
            if (isset($_POST["btnGuardarCambios"]) && $error_dni) {
                if ($_POST["dni"] == "")
                    echo "<span class='error'>* Debe añadir un DNI *</span>";
                elseif (!dni_bien_escrito($_POST["dni"]))
                    echo "<span class='error'>* Debe escribir un DNI correctamente *</span>";
                elseif (!dni_valido($_POST["dni"]))
                    echo "<span class='error'>* Debe escribir un DNI válido *</span>";
                else
                    echo "<span class='error'>* El DNI ya está registrado en la BD *</span>";
            }
            ?>
        </p>

        <p>
            <label for="sexo">Sexo:</label>
            <input type="radio" id="hombre" name="sexo" value="hombre" checked /><label for="hombre">Hombre</label>
            <input type="radio" id="mujer" name="sexo" value="mujer" /><label for="mujer">Mujer</label>
        </p>


        <p>
            <label for="archivo">Incluir mi foto (Máx. 500 KB)</label>
            <input type="file" name="archivo" id="archivo" />
            <?php
            if (isset($_POST["btnGuardarCambios"]) && $error_archivo) {
                if ($_FILES["archivo"]["error"]) {
                    echo "<span class='error'>* Error en la subida del fichero al servidor *</span>";
                } elseif (!tiene_extension($_FILES["archivo"]["name"])) {
                    echo "<span class='error'>* El archivo seleccionado no tiene extension *</span>";
                } elseif (!es_imagen($_FILES["archivo"]["tmp_name"], $_FILES["archivo"]["size"])) {
                    echo "<span class='error'>* No has seleccionado un archivo de tipo imagen *</span>";
                } else {
                    echo "<span class='error'>* El archivo imagen seleccionado sobrepasa los 500 KB *</span>";
                }
            }
            ?>
        </p>

        <p>
            <input type="checkbox" name="boletin" id="boletin" />
            <label for="boletin">Suscribirme al boletin de novedades</label>
            <?php
            if (isset($_POST["btnEnviar"]) && $error_boletin)
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