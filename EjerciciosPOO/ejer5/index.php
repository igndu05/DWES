<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5
         POO</title>
</head>
<body>
    <h1>Ejercicio 5 POO</h1>
    <?php
    require "empleado.php";

    $empleado1 = new Empleado("Ignacio", 2500);
    echo "<h3>EMPLEADO 1:</h3>";
    $empleado1 ->imprimir();

    $empleado2 = new Empleado("Julen", 4500);
    echo "<h3>EMPLEADO 2:</h3>";
    $empleado2 ->imprimir();
    
    ?>
</body>
</html>