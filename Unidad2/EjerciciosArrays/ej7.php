<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>
<body>
    <h1>Ejercicio 7</h1>

    <?php
        $array["MD"] = "Madrid";
        $array["BARC"] = "Barcelona";
        $array["LOND"] = "Londres";
        $array["NYC"] = "New York";
        $array["LA"] = "Los Angeles";
        $array["CHIC"] = "Chicago";

        foreach ($array as $i => $valor) {
            echo "<p>El indice del array que contiene como valor $valor es $i</p>";
        }
    ?>
</body>
</html>