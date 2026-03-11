<?php
try
{
    @$conexion=mysqli_connect(SERVIDOR_BD, USUARIO_BD,CLAVE_BD,NOMBRE_BD);
    mysqli_set_charset($conexion,"utf8");
}
catch(Exception $e)
{
    session_destroy();
    die(error_page("Librería", "<h1>Librería</h1><p>Error no se ha podido conectar a la BD: ".$e->getMessage()."</p>"));
}

//Hago consulta para traerme libros y los guardo en un array
try
{
    $consulta="select * from libros";
    $result_libros=mysqli_query($conexion,$consulta);
    $array_libros=array();
    while($tupla=mysqli_fetch_assoc($result_libros))
        $array_libros[]=$tupla;

    mysqli_free_result($result_libros);

}
catch(Exception $e)
{
    mysqli_close($conexion);
    session_destroy();
    die(error_page("Librería", "<h1>Librería</h1><p>Error no se ha podido realizar la consulta: ".$e->getMessage()."</p>"));
}


if(isset($_POST["btnLogin"]))
{
    $error_usuario=$_POST["usuario"]=="";
    $error_clave=$_POST["clave"]=="";
    $error_form=$error_usuario||$error_clave;
    if(!$error_form)
    {
        try
        {
            $consulta="select id_usuario,tipo from usuarios where lector='".$_POST["usuario"]."' AND clave='".md5($_POST["clave"])."'";
            $result_usuario=mysqli_query($conexion,$consulta);
        }
        catch(Exception $e)
        {
            mysqli_close($conexion);
            session_destroy();
            die(error_page("Librería", "<h1>Librería</h1><p>Error no se ha podido realizar la consulta: ".$e->getMessage()."</p>"));
        }

        $tupla=mysqli_fetch_assoc($result_usuario);
        mysqli_free_result($result_usuario);
        if($tupla)
        {
            $_SESSION["id_usuario"]=$tupla["id_usuario"];
            $_SESSION["ultm_accion"]=time();
            mysqli_close($conexion);
            if($tupla["tipo"]=="normal")
                header("Location:index.php");
            else
                header("Location:admin/gest_libros.php");
            exit;
        }
        else
        {
            $error_usuario=true;
        }

    }
    
}

mysqli_close($conexion);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería</title>
    <style>
        .libros{display:flex;flex-flow:wrap ;}
        .libro{flex:0 0 30%; text-align: center;}
        .libro img{width:100%}
        .error{color:red}
        .mensaje{color:blue;font-size:1.25em}
    </style>
</head>
<body>
    <h1>Librería</h1>
    <form action="index.php" method="post">
        <p>
            <label for="usuario">Usuario: </label>
            <input type="text" name="usuario" id="usuario" value="<?php if(isset($_POST["usuario"])) echo $_POST["usuario"];?>">
            <?php
            if(isset($_POST["btnLogin"]) && $error_usuario)
            {
                if($_POST["usuario"]=="")
                    echo "<span class='error'> Campo Vacío</span>";
                else
                    echo "<span class='error'> Credenciales no válidas</span>";
            }
                
            ?>
        </p>
        <p>
            <label for="clave">Contraseña: </label>
            <input type="password" name="clave" id="clave">
            <?php
            if(isset($_POST["btnLogin"]) && $error_clave)
                echo "<span class='error'> Campo Vacío</span>";
            ?>
        </p>
        <p>
            <button type="submit" name="btnLogin">Entrar</button>
        </p>
    </form>

    <?php
    if(isset($_SESSION["seguridad"]))
    {
        echo "<p class='mensaje'>".$_SESSION["seguridad"]."</p>";
        session_destroy();
    }

    require "vistas/vista_libros.php";
    ?>
    
   
</body>
</html>