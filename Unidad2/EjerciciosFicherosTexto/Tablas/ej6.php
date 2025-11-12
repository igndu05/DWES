<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficheros de texto - Ejercicio 6</title>
    <style>
        table, td, th{border:1px solid black}
        table{border-collapse: collapse; width: 90%; margin: 0 auto; text-align: center;}
    </style>
</head>
<body>
    <h1>Ejercicio 6</h1>
    <?php
    @$fd = fopen("http://dwese.icarosproject.com/PHP/datos_ficheros.txt", "r");
    if(!$fd)
        die("<h3> No se ha podido abrir el fichero <em>'http://dwese.icarosproject.com/PHP/datos_ficheros.txt'</em></h3></body></html>");
    
    $linea = fgets($fd);
    $datos_primera_linea = explode("\t", $linea);
    ?>
    <form action="ejer6.php" method="post">
        <p>
            <label for="pais">Seleccione un pais</label>
            <select name="pais" id="pais">
            <?php
            while($linea = fgets($fd))
            {
                $datos_linea = explode("\t", $linea);
                $datos_primera_columna = explode(",", $datos_linea[0]);

                echo "<option value='".end($datos_primera_columna)."'>".end($datos_primera_columna)."</option>";
            }
            fclose($fd);

            ?>
            </select>
        </p>
        <p>
            <button type="submit" name="btnBuscar">btnBuscar</button>
        </p>
    </form>
    <?php
    if (isset($_POST["btnBuscar"])) {
        $n_col = count($datos_primera_linea);
        echo "<h1>PIB per capita de ".$_POST["pais"]."</h1>";
        echo "<table>";
        echo "<tr>";
        for ($i=0; $i < $n_col; $i++) { 
            echo "<th>".$datos_a_mostrar[$i]."</th>";
        }
        echo "</tr>";
        echo "<tr>";
        echo "</tr>";
        echo "</table>";
    }
    ?>
</body>
</html>