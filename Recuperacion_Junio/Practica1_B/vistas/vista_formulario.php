<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segundo formulario</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <h1>Segundo formulario</h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php if(isset($_POST["nombre"])) echo $_POST["nombre"];?>"/>
        <?php
        if (isset($_POST["btnEnviar"]) && $error_nombre)
            echo "<span class='error'>* Campo obligatorio *</span>";
        ?>
        <br><br>

        <label for="nacido">Nacido en: </label>
        <select id="nacido" name="nacido">
            <option value="Malaga" <?php if(isset($_POST["btnEnviar"]) && $_POST["nacido"] == "Malaga") echo "selected";?>>Malaga</option>
            <option value="Cadiz" <?php if(isset($_POST["btnEnviar"]) && $_POST["nacido"] == "Cadiz") echo "selected";?>>Cadiz</option>
            <option value="Granada" <?php if(isset($_POST["btnEnviar"]) && $_POST["nacido"] == "Granada") echo "selected";?>>Granada</option>
        </select>
        <br><br>

        <label for="sexo">Sexo:</label>
        <input type="radio" name="sexo" id="hombre" value="hombre" <?php if($_POST["sexo"] == "hombre") echo "checked";?>/><label for="hombre">Hombre</label>
        <input type="radio" name="sexo" id="mujer" value="mujer" <?php if($_POST["sexo"] == "mujer") echo "checked";?>/><label for="mujer">Mujer</label>
        <?php
        if (isset($_POST["btnEnviar"]) && $error_sexo)
            echo "<span class='error'>* Campo obligatorio *</span>";
        ?>
        <p>
            <label for="aficiones">Aficiones:</label>
            <input type="checkbox" name="deportes" id="deportes" />
            <label for="deportes">Deportes</label>
            <input type="checkbox" name="lectura" id="lectura" />
            <label for="lectura">Lectura</label>
            <input type="checkbox" name="otros" id="otros" />
            <label for="otros">Otros</label>
        </p>

        <p>
            <label for="comentarios">Comentarios: </label>
            <textarea id="comentarios" name="comentarios"><?php if(isset($_POST["comentarios"])) echo $_POST["comentarios"];?></textarea>
            <?php
            if (isset($_POST["btnEnviar"]) && $error_comentarios)
                echo "<span class='error'>* Campo obligatorio *</span>";
            ?>
        <p></p>
        </p>

        <button type="submit" name="btnEnviar">Enviar</button>
        <button type="submit" name="btnReset">Borrar Campos</button>

    </form>
</body>

</html>