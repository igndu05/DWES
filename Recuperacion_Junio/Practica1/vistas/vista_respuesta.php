<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 1 - Recupera</title>
</head>
<body>
    <h1>Datos enviados</h1>

    <p><strong>Usuario:</strong> <?php echo $_POST["usuario"];?></p>
    <p><strong>Nombre:</strong> <?php echo $_POST["nombre"];?></p>
    <p><strong>Contraseña:</strong> *************</p>
    <p><strong>DNI:</strong> <?php echo $_POST["dni"];?></p>
    <p><strong>Sexo:</strong> <?php echo $_POST["sexo"]?></p>
    <p><strong>Subscripción:</strong> Sí</p>
</body>
</html>