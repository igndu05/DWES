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
    <title>Ejercicio 1 (Ficheros)</title>
</head>
<body>
    <h1>Ejercicio 1 de ficheros</h1>
    <form action="ej1.php" method="post">
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
            <button type="submit" name="btnGenerar">Generar</button>
        </p>
    </form>
    
    <?php
    if(isset($_POST["btnGenerar"]) && !$error_form)
    {
        $nombre_fichero = "tabla_".$_POST["num"].".txt";
        if(!file_exists("Tablas/".$nombre_fichero))
        {
            @$fd = fopen("Tablas/".$nombre_fichero, "w");
            if (!$fd) {
                die("<p>No se ha podido crear el fichero 'Tablas/".$nombre_fichero."'</p></body></html>");
            }

            for ($i=1; $i <= 10; $i++) { 
               $linea = $i. " x ".$_POST["num"]." = ".($_POST["num"]*$i).PHP_EOL;
                fputs($fd, $linea);
            }
            fclose($fd);
        }

        echo "<h3>Fichero generado con éxito</h3>";
    }
    ?>
</body>
</html>