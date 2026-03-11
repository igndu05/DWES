<?php
if (isset($_POST["btnGenerar"])) {
    $error_num1 = $_POST["num"] = "" || !is_integer($_POST["num"]) || $_POST["num"] < 1 || $_POST["num"] > 10;
    $error_num2 = $_POST["num"] = "" || !is_integer($_POST["num"]) || $_POST["num"] < 1 || $_POST["num"] > 10;
    $error_form = $error_num1 || $error_num2;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 (Ficheros)</title>
</head>

<body>
    <h1>Ejercicio 3 de ficheros</h1>
    <form action="ej3.php" method="post">
        <p>
            <label for="num1">Introduzca una tabla (Numero entre 1 y 10 ambos inclusive): </label>
            <input type="text" name="num1" id="num1" value="<?php if (isset($_POST["num1"]))
                echo $_POST["num1"]; ?>" />
            <?php
            if (isset($_POST["btnGenerar"]) && $error_form) {
                if ($_POST["num1"] == "")
                    echo "<span class='error'>* Campo vacio *</span>";
                else
                    echo "<span class='error'>* Error: No has introducido un numero *</span>";
            }
            ?>
        </p>
        <p>
            <label for="num2">Introduzca una fila (Numero entre 1 y 10 ambos inclusive): </label>
            <input type="text" name="num2" id="num2" value="<?php if (isset($_POST["num2"]))
                echo $_POST["num2"]; ?>" />
            <?php
            if (isset($_POST["btnGenerar"]) && $error_form) {
                if ($_POST["num2"] == "")
                    echo "<span class='error'>* Campo vacio *</span>";
                else
                    echo "<span class='error'>* Error: No has introducido un numero *</span>";
            }
            ?>
        </p>
        <p>
            <button type="submit" name="btnGenerar">Ver linea</button>
        </p>
    </form>

    <?php
    if (isset($_POST["btnGenerar"]) && !$error_form) {
        $nombre_fichero = "tabla_" . $_POST["num"] . ".txt";
        @$fd = fopen("Tablas/" . $nombre_fichero, "r");
        if (!$fd)
            die("<p>No se ha podido crear el fichero 'Tablas/" . $nombre_fichero . "'</p></body></html>");

        $cont = 0;
        while ($linea = fgets($fd)) {
            $cont++;
            if ($cont == $_POST["num2"]) {
                break;
            }
        }

        fclose($fd);
        echo "<h2>La fila " . $_POST["num2"] . " de la tabla " . $_POST["num1"] . " es:</h2>";
        echo "<p>" . $linea . "</p>";
    }



    ?>
</body>

</html>