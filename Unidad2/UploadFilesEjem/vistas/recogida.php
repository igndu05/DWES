<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sin errores</title>
</head>
<body>
    <h1>Sin errores</h1>
    <?php
    $numeroUnico = md5(uniqid(uniqid(uniqid(),true)));
    $ext=comprobarExtension($_FILES["foto"]["name"]);
    $nombreImg=$numeroUnico.".".$ext;
    @$var=move_uploaded_file($_FILES["foto"]["tmp_name"], "images/".$nombreImg);
    if (!$var) {
        echo "<p>No se ha podido mover la imagen a la carpeta destino</p>";
    }else{
        echo "<p>todo okay</p>";
        echo "<img src='images/$nombreImg' alt='Imagen subida del carajo'>";
    }
    ?>
</body>
</html>