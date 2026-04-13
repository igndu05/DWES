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
        <?php
            if(isset($_POST["btnEnviar"]) && $error_archivo)
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
        <br><br>

        <input <?php if(isset($_POST["boletin"])) echo "checked";?> type="checkbox" name="boletin" id="boletin"/>
        <label for="boletin">Suscribirme al boletin de novedades</label>
        <?php
            if(isset($_POST["btnEnviar"]) && $error_boletin)
                echo "<span class='error'> Debes suscribirte al boletin</span>"
        ?>
        <br><br>

        <button type="submit" name="btnEnviar">Enviar</button>
        <button type="submit" name="btnReset">Borrar los datos introducidos</button>
    </form>
</body>
</html>