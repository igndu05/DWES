<?php
try {
    $conexion = new PDO("mysql:host=" . SERVIDOR_BD . ";dbname=" . NOMBRE_BD, USUARIO_BD, CLAVE_BD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
} catch (PDOException $e) {
    session_destroy();
    die(error_page("Práctica Rec 2", "<h1>Práctica Rec 2</h1><p>Error no se ha podido conectar a la BD: " . $e->getMessage() . "</p>"));
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
    <h3>Listado de usuarios</h3>
    <table>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Usuario+</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($datos_usuarios as $tupla) {
                ?>
                <tr>
                    <td><?php echo $tupla["id_usuario"]; ?></td>
                    <td><?php echo "<img src='images/" . $tupla["foto"] . "' alt='imagen'/>"; ?></td>
                    <td><?php echo $tupla["nombre"]; ?></td>
                    <td><button class="enlace">Borrar</button> - <button class="enlace">Editar</button></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>