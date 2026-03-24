<?php

function dni_bien_escrito($texto) 
{
    $dni = strtoupper($texto);

    /*
    $longitud_buena = strlen($dni) == 9;
    $es_numero = is_numeric(substr($dni,0,8));
    $es_letra = substr($dni, -1) >= "A" && substr($dni, -1) <= "Z";
    */
    return strlen($dni) == 9 && is_numeric(substr($dni,0,8)) && substr($dni, -1) >= "A" && substr($dni, -1) <= "Z";
}

function LetraNIF ($dni) {
    return substr("TRWAGMYFPDXBNJZSQVHLCKE", $dni % 23, 1); 
}

function dni_valido ($texto) {
    $dni = strtoupper($texto);

    return LetraNIF(substr($dni,0,8)) == substr($dni, -1);
}

if(isset($_POST["btnEnviar"])){
    // Comprobar errores

    $error_usuario = $_POST["usuario"] == "";
    $error_nombre = $_POST["nombre"] == "";
    $error_clave = $_POST["clave"] == "";
    $error_dni = $_POST["dni"] == "" || !dni_bien_escrito($_POST["dni"]) || !dni_valido($_POST["dni"]);
    $error_boletin = !isset($_POST["boletin"]);

    $error_form = $error_usuario || $error_nombre || $error_clave || $error_dni || $error_boletin;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 1 - Recuperacion</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Practica 1</h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" placeholder="Inserte un usuario..." value="<?php if(isset($_POST["usuario"])) echo $_POST["usuario"];?>"/>
        <?php
            if(isset($_POST["btnEnviar"]) && $error_usuario)
                echo "<span class='error'> Debes rellenar un usuario</span>"
        ?>
        <br><br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" placeholder="Inserte un nombre..." value="<?php if(isset($_POST["nombre"])) echo $_POST["nombre"];?>"/>
        <?php
            if(isset($_POST["btnEnviar"]) && $error_nombre)
                echo "<span class='error'> Debes rellenar un nombre</span>"
        ?>
        <br><br>

        <label for="clave">Contraseña:</label>
        <input type="password" name="clave" id="clave" placeholder="Inserte una contraseña..."/>
        <?php
            if(isset($_POST["btnEnviar"]) && $error_clave)
                echo "<span class='error'> Debes rellenar una contraseña</span>"
        ?>
        <br><br>

        <label for="dni">DNI:</label>
        <input type="text" name="dni" id="dni" placeholder="Inserte un dni..."/>
        <?php
            if(isset($_POST["btnEnviar"]) && $error_dni)
            {
                if($_POST["dni"] == "")
                    echo "<span class='error'> Debes rellenar un DNI</span>";
                elseif(!dni_bien_escrito($_POST["dni"]))
                    "<span class='error'>El DNI no está bien escrito</span>";
                else
                    "<span class='error'>El DNI no es válido</span>";
            }
        ?>
        <br><br>

        <label for="sexo">Sexo:</label><br>
        <input type="radio" <?php if(!isset($_POST["sexo"]) || (isset($_POST["sexo"]) && $_POST["sexo"] == "Hombre")) echo "checked";?> name="sexo" id="hombre" value="hombre"/><label for="hombre">Hombre</label>
        <br>
        <input type="radio" <?php if(!isset($_POST["sexo"]) || (isset($_POST["sexo"]) && $_POST["sexo"] == "Mujer")) echo "checked";?> name="sexo" id="mujer" value="mujer"/><label for="mujer">Mujer</label>
        <br><br>

        <label for="archivo">Incluir mi foto (Máx. 500KB): </label>
        <input type="file" name="archivo" id="archivo" accept="image/*">
        <br><br>

        <input <?php if(isset($_POST["boletin"])) echo "checked";?> type="checkbox" name="boletin" id="boletin"/>
        <label for="boletin">Suscribirme al boletin de novedades</label>
        <?php
            if(isset($_POST["btnEnviar"]) && $error_boletin)
                echo "<span class='error'> Debes suscribirte al boletin</span>"
        ?>
        <br><br>

        <button type="submit" name="btnEnviar">Enviar</button>
        <input type="reset" value="Borrar los datos introducidos"/>
    </form>
</body>
</html>