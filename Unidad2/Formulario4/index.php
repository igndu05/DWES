<?php
if(isset($_POST["btnEnviar"]))
{
    $error_nombre = $_POST["nombre"] == "";
    $error_sexo = !isset($_POST["sexo"]);

    $error_formulario=$error_nombre || $error_sexo;
}





if(isset($_POST["btnEnviar"]) && !$error_formulario)
{
?>
    
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario4 - Recogida</title>
    <style>
        .error{color:red}
    </style>
</head>
<body>
    <h1>Estos son los datos enviados</h1>
    <p><strong>Nombre: </strong><?php ?></p>
    <p><strong>Nacido en: </strong><?php ?></p>
    <p><strong>Sexo: </strong><?php ?></p>
    <p><strong>Nombre: </strong><?php ?></p>
    <?php
    if(isset($_POST["aficiones"]))
    {

    }
    ?>
</body>
</html>

<?php
}
else
{
?>
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario4 - Formulario</title>
    <style>
        .error {color:red};
    </style>
</head>
<body>
    <h1>Esta es mi super pagina</h1>
    <form action="index.php" method="post">
        <p>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" value="<?php if(isset($_POST["nombre"])) echo $_POST["nombre"]?>"/>
        <?php
        if(isset($_POST["btnEnviar"]) && $error_nombre){
            echo "<span class='error'>* Campo Obligatorio *</span>";
        }
        ?>
        </p>
        <p>
            <label for="nacido">Nacido en: </label>
            <select name="nacido" id="nacido">
                <option value="Granada" <?php if(isset($_POST["nacido"]) && $_POST["nacido"] == "Granada") echo "selected";?>>Granada</option>
                <option value="Malaga" <?php if(!isset($_POST["nacido"]) && $_POST["nacido"] == "Malaga") echo "selected";?>>Malaga</option>
                <option value="Almeria" <?php if(isset($_POST["nacido"]) && $_POST["nacido"] == "Almeria") echo "selected";?>>Almeria</option>
            </select>
        </p>
        <p>
            <label>Sexo: </label>
            <label for="hombre">Hombre </label>
            <input type="radio" name="sexo" id="hombre" value="hombre" <?php if (isset($_POST["sexo"]) && $_POST["sexo"] == "hombre") echo "checked";?>/>
            <label for="mujer">Mujer </label>
            <input type="radio" name="sexo" id="mujer" value="mujer" <?php if (isset($_POST["sexo"]) && $_POST["sexo"] == "mujer") echo "checked";?>/>
        <?php
        if(isset($_POST["btnEnviar"]) && $error_sexo){
            echo "<span class='error'>* Campo Obligatorio *</span>";
        }
        ?>
        </p>
        <p>
            <label>Aficiones</label>
            <label for="deportes">Deportes </label>
            <input type="checkbox" name="aficiones[]" id="deportes" value="deportes">
            <label for="lectura">Lectura </label>
            <input type="checkbox" name="aficiones[]" id="lectura" value="lectura">
            <label for="otros">Otros </label>
            <input type="checkbox" name="aficiones[]" id="otros" value="otros">
        </p>
        <!-- Cuando ponemos [] en name se convierte en un array -->
        <p>
            <label for="comentarios">Comentarios: </label>
            <textarea name="comentarios" id="comentarios" cols="40" rows="5"><?php ?></textarea>
        </p>
        <p>
            <button type="submit" name="btnEnviar">Enviar</button>
        </p>
    </form>
</body>
</html>

<?php
}
?>