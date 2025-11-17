<?php
if (isset($_POST["btnLogin"])) {
    $error_usuario = $_POST["usuario"] == "";
    $error_clave = $_POST["clave"] == "";
    $error_form = $error_usuario || $error_clave;
    if (!$error_form) {
        try {
            $consulta = "select id_usuario, tipo from usuarios where lector = '".$_POST["usuario"]."' and clave = '".$_POST["clave"]."'";
            $result_usuario = mysqli_query($conexion, $consulta);
        } catch (Exception $e) {
            mysqli_close($conexion);
            session_destroy();
            die(error_page("ERROR", "<h1>Mierdon de consulta (razon = " . $e->getMessage() . ")</h1>"));
        }

        $tupla = mysqli_fetch_assoc($result_usuario);
        mysqli_free_result($result_usuario);

        if ($tupla) 
        {
            $_SESSION["id_usuario"] = $tupla["id_usuario"];
            $_SESSION["ultm_accion"] = time();
            mysqli_close($conexion);
        }
        else
        {
            $error_usuario = true;
        }

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria examen</title>
    <style>
        .libros {
            display: flex;
            flex-flow: wrap;
        }

        .libro {
            flex: 0 0 30%;
            display: flex;
            text-align: center;
        }

        .libro img {
            width: 100%
        }
        .error {color:red}
    </style>
</head>

<body>
    <h1>Libreria</h1>
    <form action="index.php" method="post">
        <p>
            <label for="usuario">Usuario: </label>
            <input type="text" name="usuario" id="usuario" value="<?php if(isset($_POST["usuario"])) echo $_POST["usuario"];?>"/>
            <?php
            if (isset($_POST["btnLogin"]) && $error_usuario)
            {
                echo "<span class='error'>* Campo Vacio *</span>";
            }
            ?>
        </p>
        <p>
            <label for="clave">Contraseña: </label>
            <input type="password" name="clave" id="clave" />
            <?php
            if (isset($_POST["btnLogin"]) && $error_clave)
            {
                echo "<span class='error'>* Campo Vacio *</span>";
            }
            ?>
        </p>
        <p>
            <button type="submit" name="btnLogin">Entrar</button>
        </p>
    </form>

    <h3>Listado de los libros:</h3>
    <div class="libros">
        <?php
        while ($tupla = mysqli_fetch_assoc($result_libros)) {
            echo "<div class='libro'>";
            echo "<img src='Images/" . $tupla["portada"] . "' alt='Portada' title='Portada'><br>";
            echo $tupla["titulo"] . " - " . $tupla["precio"] . "€";
            echo "</div>";
        }
        ?>
    </div>
</body>

</html>