<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 POO</title>
</head>
<body>
    <h1>Ejercicio 3 POO</h1>
    <?php
    require "fruta.php";
    $pera = new Fruta("verde", "pequeña");
    echo "<h2>Caracteristicas de mi pera</h2>";
    $pera->imprimir();

    $platano = new Fruta("amarillo", "mediano");
    echo "<h2>Caracteristicas de mi platano</h2>";
    $platano->imprimir();

    echo "<p>Frutas creadas hasta el momento: ".Fruta::cuantaFruta()."</p>";
    
    echo "<p>Destruimos el platano.........</p>";
    unset($platano);
    echo "<p>Frutas creadas hasta el momento: ".Fruta::cuantaFruta()."</p>";
    
    echo "<p>Destruimos la pera.........</p>";
    unset($pera);
    echo "<p>Frutas creadas hasta el momento: ".Fruta::cuantaFruta()."</p>";
    ?>
</body>
</html>