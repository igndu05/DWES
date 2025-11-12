<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9</title>
</head>
<body>
    <h1>Ejercicio 9</h1>

    <?php
        $lenguajes_cliente = array("HTML", "CSS", "JavaScript", "React");
        $lenguajes_servidor = array("Python", "PHP", "Java", "Node.js");

        $lenguajes = array_merge($lenguajes_cliente, $lenguajes_servidor);

        echo "<table>";
        foreach ($lenguajes as $i => $valor) {
            
        }
        echo "</table>";
    ?>
</body>
</html>