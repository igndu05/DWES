<?php
if (isset($_POST["btnContNuevo"])) {
    $error_usuario = $_POST["usuario"] == "";
    if (!$error_usuario) {

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
            $consulta = "INSERT INTO usuarios (usuario, nombre, clave, dni, sexo) VALUES (?,?,?,?,?)";
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
        $_SESSION["mensaje_accion"] = "Usted añadido correctamente";

        if ($_FILES["archivo"]["name"] != "") {
            $nombre_nuevo = "img_" . $id_usuario . "." . tiene_extension($_FILES["archivo"]["name"]);
            @$var = move_uploaded_file($_FILES["archivo"]["tmp_name"], "images/" . $nombre_nuevo);
            if ($var) {
                try {
                    $consulta = "UPDATE usuarios SET foto=? WHERE id_usuario=?";
                    $sentencia = $conexion->prepare($consulta);
                    $sentencia->execute([$nombre_nuevo, $id_usuario]);
                } catch (PDOException $e) {
                    $_SESSION["mensaje_accion"] = "Usted añadido correctamente, pero con la imagen por defecto porque no se ha podido actualizar la BD.";
                    unlink("images/" . $nombre_nuevo);
                }

                $sentencia = null;
            } else {
                $_SESSION["mensaje_accion"] = "Usted añadido correctamente, pero con la imagen por defecto porque no se ha podido mover la imagen a la carpeta destino.";
            }
        }


        header("Location:index.php");
        exit;
    }
}

try {
    $consulta = "SELECT * FROM usuarios where tipo='normal'";
    $sentencia = $conexion->prepare($consulta);
    $sentencia->execute();
} catch (PDOException $e) {
    session_destroy();
    $sentencia = null;
    $conexion = null;
    die(error_page("Práctica Rec 2", "<h1>Práctica Rec 2</h1><p>Error no se ha podido realizar la consulta: " . $e->getMessage() . "</p>"));
}

$datos_usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);
$sentencia = null;


if (isset($_POST["btnDetalles"])) {
    try {
        $consulta = "SELECT * FROM usuarios WHERE id_usuario=?";
        $sentencia = $conexion->prepare($consulta);
        $sentencia->execute([strtoupper($_POST["btnDetalles"])]);
    } catch (PDOException $e) {
        session_destroy();
        $sentencia = null;
        $conexion = null;
        die(error_page("Práctica Rec 2", "<h1>Práctica Rec 2</h1><p>Error no se ha podido realizar la consulta: " . $e->getMessage() . "</p>"));
    }

    $detalles_usuario = $sentencia->fetch(PDO::FETCH_ASSOC);
    $sentencia = null;
}

if (isset($_POST["btnConfirmar"])) {
    try {
        $consulta = "DELETE FROM usuarios WHERE id_usuario=?";
        $sentencia = $conexion->prepare($consulta);
        $sentencia->execute([$_POST["id_usuario"]]);
    } catch (PDOException $e) {
        session_destroy();
        $sentencia = null;
        $conexion = null;
        die(error_page("Práctica Rec 2", "<h1>Práctica Rec 2</h1><p>Error no se ha podido realizar la consulta: " . $e->getMessage() . "</p>"));
    }

    header("Location:index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 2 - Recuperación 25-26</title>
    <style>
        .enlace {
            border: none;
            background-color: white;
            color: blue;
            text-decoration: underline;
            cursor: pointer;
        }

        .error {
            color: red;
        }

        .mensaje {
            color: blue;
            font-size: 1.25rem;
        }

        table {
            width: 100%;
            border: 1px solid #000;
        }

        th,
        td {
            text-align: center;
            vertical-align: top;
            border: 1px solid #000;
            border-collapse: collapse;
        }

        img {
            width: 100px;
        }
    </style>
</head>

<body>
    <h1>Práctica Rec 2</h1>
    <form action="index.php" method="post">
        <p>
            Bienvenido <strong><?php echo $datos_usu_log["usuario"] ?></strong> -
            <button class="enlace" type="submit" name="btnCerrarSesion">Salir</button>
        </p>
    </form>

    <?php
    if (isset($_POST["btnNuevo"]) || isset($_POST["btnContNuevo"])) {
        require "vista_formulario_agregar.php";
    }

    if (isset($_POST["btnDetalles"])) {
        require "vista_detalles.php";
    }

    if (isset($_POST["btnBorrar"])) {
        echo "<h2>¿Estas seguro de que quieres eliminar al usuario con ID: ".$_POST["id_usuario"]."?</h2>";
        echo "<form action='index.php' method='post'><input type='hidden' name='id_usuario' value=".$_POST["id_usuario"]."><button type='submit' name='btnConfirmar'>Confirmar</button><button type='submit'>Atrás</button></form>";

        
    }

    if (isset($_SESSION["mensaje_accion"])) {
        echo "<p class='mensaje'>" . $_SESSION["mensaje_accion"] . "</p>";
    }
    ?>

    <h3>Listado de usuarios</h3>
    <table>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">Nombre</th>
                <th scope="col">
                    <form action="index.php" method="post"><button class="enlace" name="btnNuevo"
                            type="submit">Usuario+</button></form>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($datos_usuarios as $tupla) {
                ?>
                <tr>
                    <td><?php echo $tupla["id_usuario"]; ?></td>
                    <td><?php echo "<img src='images/" . $tupla["foto"] . "' alt='Imagen' title='Imagen'/>"; ?></td>
                    <td>
                        <form action="index.php" method="post"><button type="submit" name="btnDetalles" class="enlace"
                                value="<?php echo $tupla["id_usuario"]; ?>"><?php echo $tupla["nombre"]; ?></button></form>
                    </td>
                    <td><form action="index.php" method="post"><input type="hidden" name="id_usuario" value="<?php echo $tupla["id_usuario"]; ?>"/><button class="enlace" type="submit" name="btnBorrar">Borrar</button> - <button class="enlace" type="submit" name="btnEditar">Editar</button></form></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>