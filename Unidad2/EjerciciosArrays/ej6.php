<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
    <h1>Ejercicio 6</h1>

    <?php
        $array = array("Madrid", "Barcelona", "Londres", "New York", "Los Angeles", "Chicago");

        foreach ($array as $i => $valor) {
            echo "<p>La ciudad con el indidce $i tiene el nombre $valor</p>";
        }
    ?>
</body>
</html>