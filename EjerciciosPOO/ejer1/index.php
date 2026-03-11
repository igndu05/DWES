<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 POO</title>
</head>
<body>
    <h1>Ejercicio 1 POO</h1>
    <?php
    require "fruta.php";
    $pera = new Fruta();

    $pera->set_color("verde");
    $pera->set_tamanyo("pequeña");
    
    echo "<h2>Caracteristicas de mi pera</h2>";
    echo "<p><strong>Color: </strong>".$pera->get_color()."";
    echo "<p><strong>Tamaño: </strong>".$pera->get_tamanyo()."";
    ?>
</body>
</html>