<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 1 - Recupera</title>
    <style>
        img {
            height: 200px;
        }
    </style>
</head>
<body>
    <h1>Datos enviados</h1>

    <p><strong>Usuario:</strong> <?php echo $_POST["usuario"];?></p>
    <p><strong>Nombre:</strong> <?php echo $_POST["nombre"];?></p>
    <p><strong>Contraseña:</strong> *************</p>
    <p><strong>DNI:</strong> <?php echo $_POST["dni"];?></p>
    <p><strong>Sexo:</strong> <?php echo $_POST["sexo"]?></p>
    <p><strong>Subscripción:</strong> Sí</p>
    <h3>Información de la foto:</h3>
    <?php
    if ($_FILES["archivo"]["name"] != "")
    {
        $nombre_unico = uniqid("img_");
        $nombre_nuevo = $nombre_unico.".".tiene_extension($_FILES["archivo"]["name"]);
        @$var = move_uploaded_file($_FILES["archivo"]["tmp_name"], "./images/".$nombre_nuevo);
        
        if(!$var)
        {
            echo "<p>No se ha podido mover la imagen subida a la carpeta destino.</p>";
        }
        else
        {
            echo "<p><strong>Nombre: </strong>".$_FILES["archivo"]["name"]."</p>";
            echo "<p><strong>Tipo: </strong>".$_FILES["archivo"]["type"]."</p>";
            echo "<p><strong>Tamaño: </strong>".$_FILES["archivo"]["size"]." Bytes</p>";
            echo "<p><strong>Nombre temporal: </strong>".$_FILES["archivo"]["tmp_name"]."</p>";
            echo "<img src='images/".$nombre_nuevo."' alt='imagen'/>";
        }
    }
    else
    {
        echo "<p>No se ha seleccionado ninguna imagen.</p>";
    }
    ?>
</body>
</html>