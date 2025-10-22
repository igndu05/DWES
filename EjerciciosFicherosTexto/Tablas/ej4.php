<?php
if(isset($_POST["btnContar"])) {
    // Errores
    $error_form = $_FILES["fichero"]["name"] != "" || $_FILES["fichero"]["error"] || $_FILES["fichero"]["size"] > 2500 *1024 || $_FILES["fichero"]["type"] != "text/plain";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficheros de texto - Ejercicio 4</title>
</head>
<body>
    <h1>Ejercicio 4</h1>
    <form action="ej4.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="fichero">Seleccione un fichero de texto para contar sus palabras (Máximo 2.5 MB)</label>
            <input type="file" name="fichero" id="fichero" accept=".txt">
            <?php
            if(isset($_POST["btnContar"]) && $error_form)
            {
                if($_FILES["fichero"]["name"] == "")
                    echo "<span class='error'>* Debes seleccionar un fichero *</span>";
                elseif($_FILES["fichero"]["error"])
                    echo "<span class='error'>* Error en la subida del archivo al servidor *</span>";
                elseif ($_FILES["fichero"]["size"] > 2500 *1024) 
                    echo "<span class='error'>* Error, has seleccionado un archivo mayor a 2.5 MBs *</span>";
                else 
                    echo "<span class='error'>* Error, no has seleccionado un archivo de tipo texto *</span>";
 
            }
            ?>
        </p>
        <p>
            <button type="submit" name="btnContar">Contar palabras</button>
        </p>
    </form>
    <?php
    if(isset($_POST["btnContar"]) && !$error_form)
    {
        $contenido_fichero = file_get_contents($_FILES["fichero"]["tmp_name"]);
        $palabras = str_word_count($contenido_fichero);

        echo "<h3>El numero de palabras que contiene el archivo seleccionado es de: ".$palabras."</h3>";
    }
    ?>
</body>
</html>