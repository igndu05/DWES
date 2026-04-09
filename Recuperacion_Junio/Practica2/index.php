<?php
    if(isset($_POST["btnEntrar"]) || isset($_POST["btnRegistrarse"]))
    {
        $error_usuario = $_POST["usuario"] == "";
        $error_clave = $_POST["clave"] == "";

        $error_login = $error_usuario || $error_clave;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica Rec 2</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Práctica Rec 2</h1>
    <form action="index.php" method="post">
        <p>
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario"/>
            <?php
            if((isset($_POST["btnEntrar"]) && $error_usuario) || (isset($_POST["btnRegistrarse"]) && $error_usuario))
            {
                echo "<span class='error'>* Debe añadir un usuario *</span>";
            }
            ?>
        </p>
        <p>
            <label for="clave">Contraseña:</label>
            <input type="password" name="clave" id="clave"/>
            <?php
            if((isset($_POST["btnEntrar"]) && $error_clave) || (isset($_POST["btnRegistrarse"]) && $error_clave))
            {
                echo "<span class='error'>* Debe añadir una contraseña *</span>";
            }
            ?>
        </p>
        <p>
            <button type="submit" name="btnEntrar">Entrar</button>
            <button type="submit" name="btnRegistrarse">Registrarse</button>
        </p>
    </form>
</body>
</html>