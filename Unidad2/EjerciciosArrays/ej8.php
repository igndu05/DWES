<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
</head>
<body>
    <h1>Ejercicio 8</h1>

    <?php
        $array = array("Pedro","Ismael","Sonia","Clara","Susana","Alfonso","Teresa");
        
        echo "<p>El array de nombres tiene ".count($array)." elementos</p>";

        echo "<ul>";
        foreach ($array as $i => $valor) {
            echo "<li>Indice $i = $valor</li>";
        }
        echo "</ul>"
    ?>
</body>
</html>