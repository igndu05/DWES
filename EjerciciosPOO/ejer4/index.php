<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 POO</title>
</head>
<body>
    <h1>Ejercicio 4 POO</h1>
    <?php
    require "fruta.php";
    require "uva.php";

    $pera = new Fruta("verde", "pequeña");
    echo "<h2>Caracteristicas de mi pera</h2>";
    $pera->imprimir();

    $uva1 = new Uva("negra", "pequeña", true);
    echo "<h2>Caracteristicas de mi uva1</h2>";
    $uva1->imprimir();

    $uva2 = new Uva("negra", "pequeña", false);
    echo "<h2>Caracteristicas de mi uva2</h2>";
    $uva2->imprimir();

    
    ?>
</body>
</html>