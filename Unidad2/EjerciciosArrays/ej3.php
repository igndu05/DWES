<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
    <h1>Ejercicio 3</h1>

    <?php
        $array['Enero'] = 9;
        $array['Febrero'] = 12;
        $array['Marzo'] = 0;
        $array['Abril'] = 17;

        echo "<p>";
        foreach ($array as $i => $valor){
            if ($valor == 0) {
                echo "No se vio ninguna pelicula en el mes de $i</br>";
            } else {
                echo "En el mes de $i se vieron $valor"." peliculas</br>";
            }
        }
        echo "</p>";
    ?>
</body>
</html>