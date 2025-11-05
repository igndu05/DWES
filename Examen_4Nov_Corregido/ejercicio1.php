<?php
if(isset($_POST["btnPasar"]))
{
    $error_form = $_POST["contenido"] == "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Examen</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Pasar el contenido de un TextArea a <em>"Ficheros/resultado.txt"</em></h1>
    <form action="ejercicio1.php" method="post">
        <p>
            <textarea placeholder="Teclee al menos una linea" name="contenido"><?php if(isset($_POST["contenido"])) echo $_POST["contenido"]?></textarea>
            <?php
            if(isset($_POST["btnPasar"]) && $error_form)
                echo "<span class='error'>* Debes teclear al menos una linea *</span>"
            ?>
        </p>
        <p>
            <button type="submit" name="btnPasar">Pasar a Fichero</button>
            <button type="submit" name="btnBorrar">Borrar Textarea</button>
        </p>
    </form>

    <?php
    if(isset($_POST["btnPasar"]) && !$error_form)
    {
        @$fd = fopen("Ficheros/resultado.txt", "w");
        if (!$fd) {
            die("<p>No se ha podido crear el fichero <em>'Ficheros/resultado.txt'</em></p></body></html>");
        }

        $lineas_textarea = explode("\n", $_POST["contenido"]);

        for ($i=0; $i < count($lineas_textarea); $i++) { 
            fputs($fd, $lineas_textarea[$i]);
        }

        fclose($fd);

        echo "<h3>Fichero generado con éxito (<a href='Ficheros/resultado.txt'>Descargar fichero</a>)</h3>";
        echo "<h3>Estas son las lineas con su contenido: </h3>";
        echo "<ol>";
        
        $lineas_textarea = explode("\n", $_POST["contenido"]);

        for ($i=0; $i < count($lineas_textarea); $i++) { 
            fputs($fd, $lineas_textarea[$i].PHP_EOL);
            echo "<li>".$lineas_textarea[$i]."</li>";
        }

        echo "</ol>";
        fclose($fd);
    }
    ?>
</body>
</html>