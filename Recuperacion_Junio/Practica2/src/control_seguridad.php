<?php
    // comprobar que esta logueado en la bd
    try {
            $conexion = new PDO("mysql:host=" . SERVIDOR_BD . ";dbname=" . NOMBRE_BD, USUARIO_BD, CLAVE_BD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        } catch (PDOException $e) {
            session_destroy();
            die(error_page("Práctica Rec 2", "<h1>Práctica Rec 2</h1><p>Error no se ha podido conectar a la BD: " . $e->getMessage() . "</p>"));
        }

        try {
            $consulta = "SELECT * FROM usuarios WHERE id_usuario=?";
            $sentencia = $conexion->prepare($consulta);
            $sentencia->execute([$_SESSION["usuario"]]);
        } catch (PDOException $e) {
            session_destroy();
            $sentencia = null;
            $conexion = null;
            die(error_page("Práctica Rec 2", "<h1>Práctica Rec 2</h1><p>Error no se ha podido realizar la consulta: " . $e->getMessage() . "</p>"));
        }
    

    $datos_usu_log = $sentencia->fetch(PDO::FETCH_ASSOC);
    $sentencia = null;

    if(!$datos_usu_log)
    {
        session_unset(); //Borra todas las sesiones hasta el momento
        $_SESSION["seguridad"] = "Usted ya no se encuentra registrado en la BD.";
        header("Location:index.php");
        exit;
    }

    // DESCONEXION POR INACTIVIDAD
    if((time() - $_SESSION["ultima_accion"]) > TIEMPO_SESION * 60) 
    {
        session_unset(); //Borra todas las sesiones hasta el momento
        $_SESSION["seguridad"] = "Su tiempo de sesión ha expirado. Por favor vuelva a loguearse";
        header("Location:index.php");
        exit;
    }

    $_SESSION["ultima_accion"] = time();
?>