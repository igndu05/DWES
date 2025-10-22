<?php
if(isset($_POST["btnEnviar"]))
{
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pract - Recogida</title>
</head>
<body>
    <h1>Recogida de datos</h1>
    <p><strong>Nombre: </strong><?php echo $_POST["nombre"];?></p>
    <p><strong>Apellidos: </strong><?php echo $_POST["apellido"]?></p>
    <p><strong>Contraseña: </strong></p>
    <p><strong>DNI: </strong><?php echo $_POST["dni"]?></p>
    <p><strong>Sexo: </strong><?php if(isset($_POST["sexo"])){ echo $_POST["sexo"];}?></p>
    <p><strong>Nacido: </strong><?php echo $_POST["ciudadNac"];?></p>
    <p><strong>Comentarios: </strong><?php echo $_POST["comentarios"];?></p>
    <p><strong>Suscripción: </strong><?php if(isset($_POST["subs"])) echo "Si"; else echo "No";?></p>
</body>
</html>
<?php
}
else
{
    
}