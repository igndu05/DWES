<?php
if (isset($_POST["btnLogin"])) {
    $error_usuario = $_POST["usuario"] == "";
    $error_clave = $_POST["clave"] == "";
    $error_form = $error_usuario || $error_clave;

    if (!$error_form) {
        try {
            $conexion = new PDO("mysql:host=" . SERVIDOR_BD . ";dbname=" . NOMBRE_BD, USUARIO_BD, CLAVE_BD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        } catch (PDOException $e) {
            session_destroy();
            die(error_page("Práctica Rec 2", "<h1>Práctica Rec 2</h1><p>Error no se ha podido conectar a la BD: " . $e->getMessage() . "</p>"));
        }

        try {
            $consulta = "SELECT id_usuario FROM usuarios WHERE usuario=? AND clave=?";
            $sentencia = $conexion->prepare($consulta);
            $sentencia->execute([$_POST["usuario"], md5($_POST["clave"])]);
        } catch (PDOException $e) {
            session_destroy();
            $sentencia = null;
            $conexion = null;
            die(error_page("Práctica Rec 2", "<h1>Práctica Rec 2</h1><p>Error no se ha podido realizar la consulta: " . $e->getMessage() . "</p>"));
        }

        $datos = $sentencia->fetch(PDO::FETCH_ASSOC);
        $sentencia = null;
        $conexion = null;

        if($datos)
        {
            // Me logueo y salto a index
            $_SESSION["usuario"] = $datos["id_usuario"];
            $_SESSION["ultima_accion"] = time();
            header("Location:index.php");
            exit;
        }
        else
        {
            $error_usuario = true;       
        }
    }




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
        .mensaje {color:blue; font-size: 25px;}
    </style>
</head>

<body>
    <h1>Práctica Rec 2</h1>
    <form action="index.php" method="post">
        <p>
            <label for="usuario">Usuario: </label>
            <input type="text" name="usuario" id="usuario" value="<?php if(isset($_POST["usuario"])) echo $_POST["usuario"];?>"/>
            <?php
            if(isset($_POST["btnLogin"]) && $error_usuario)
            {
                if($_POST["usuario"] == "")
                    echo "<span class='error'>* Campo vacío *</span>";
                else
                    echo "<span class='error'>* Credenciales usuario/clave inválidas *</span>";
            }
            ?>
        </p>
        <p>
            <label for="clave">Contraseña: </label>
            <input type="password" name="clave" id="clave" />
            <?php
            if(isset($_POST["btnLogin"]) && $error_clave)
            {
                echo "<span class='error'>* Campo vacío *</span>";
            }
            ?>
        </p>
        <p>
            <button type="submit" name="btnLogin">Entrar</button>
            <button type="submit" name="btnRegistrar">Registrarse</button>
        </p>
    </form>

    <?php
        if(isset($_SESSION["seguridad"]))
        {
            echo "<p class='mensaje'>".$_SESSION["seguridad"]."</p>";
            session_destroy();
        }
            
    ?>
</body>
</html>