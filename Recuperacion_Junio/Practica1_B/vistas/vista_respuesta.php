<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 1_B</title>
</head>
<body>
    <h2>Formulario enviado correctamente</h2>
    <p><strong>Nombre:</strong> <?php echo $_POST["nombre"];?></p>
    <p><strong>Ciudad de nacimiento:</strong> <?php echo $_POST["nacido"];?></p>
    <p><strong>Sexo:</strong> <?php echo $_POST["sexo"];?></p>

    <p>LAS AFICIONES VAN AQUI COMO UNA OL CON LIs</p>

    <p><strong>Comentarios:</strong><br>
    <?php echo $_POST["comentarios"];?>
    </p>
</body>
</html>