<?php
if(isset($_POST["btnGenerar"]))
{
    $error_form = $_POST["num"] = "" || !is_integer($_POST["num"]) || $_POST["num"] < 1 || $_POST["num"] > 10;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 (Ficheros)</title>
</head>
<body>
    <h1>Ejercicio 2 de ficheros</h1>
    <form action="ej2.php" method="post">
        <p>
            <label for="num">Inserte un numero entre 1 y 10: </label>
            <input type="text" name="num" id="num" value="<?php if(isset($_POST["num"])) echo $_POST["num"];?>"/>
            <?php
                if(isset($_POST["btnGenerar"]) && $error_form)
                {
                    if($_POST["num"] == "")
                        echo "<span class='error'>* Campo vacio *</span>";
                    else
                        echo "<span class='error'>* Error: No has introducido un numero *</span>";
                }
            ?>
        </p>
        <p>
            <button type="submit" name="btnGenerar">Ver fichero</button>
        </p>
    </form>
    
    <?php
    if(isset($_POST["btnGenerar"]) && !$error_form)
    {
        $nombre_fichero = "tabla_".$_POST["num"].".txt";
        @$fd = fopen("Tablas/".$nombre_fichero, "r");
        if (!$fd) 
            die("<p>No se ha podido crear el fichero 'Tablas/".$nombre_fichero."'</p></body></html>");

        echo "<h3>Tabla del ".$_POST["num"]."</h3>";

        while ($linea = fgets($fd))
            echo "<p>".$linea."</p>";
        
        fclose($fd);
    }

        
    
    ?>
</body>
</html>