<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficheros de texto - Ejercicio 5</title>
    <style>
        table, td, th{border:1px solid black}
        table{border-collapse: collapse; width: 90%; margin: 0 auto; text-align: center;}
    </style>
</head>
<body>
    <h1>Ejercicio 5</h1>
    <?php
    @$fd = fopen("http://dwese.icarosproject.com/PHP/datos_ficheros.txt", "r");
    if(!$fd)
        die("<h3> No se ha podido abrir el fichero <em>'http://dwese.icarosproject.com/PHP/datos_ficheros.txt'</em></h3></body></html>");
    
    echo "<table>";
    echo "<caption>PIB per cápita de los paises de la UE</caption>";
    $linea = fgets($fd);
    $datos_linea = explode("\t", $linea);
    $n_columnas = count($datos_linea);
    echo "<tr>";
    for ($i=0; $i < $n_columnas; $i++) { 
        echo "<th>".$datos_linea[$i]."</th>";
    }
    echo "</tr>";

    while ($linea = fgets($fd)) {
        $datos_linea = explode("\t", $linea);
        echo "<tr>";
        echo "<th>".$datos_linea[0]."</th>";
        for ($i=0; $i < $n_columnas; $i++) {
            if(isset($datos_linea[$i])) 
                echo "<td>".$datos_linea[$i]."</td>";
            else
                echo "<td></td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    fclose($fd);
    ?>
</body>
</html>