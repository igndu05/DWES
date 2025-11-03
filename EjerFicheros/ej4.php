<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficheros</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php
    $errorFormulario = false;
    if (isset($_POST["btnEnviar"])) {
        $file = $_FILES["archivo"];

        $errorFileVacio = trim($file["name"]) == "";
        $errorFileFallo = $file["error"];
        $errorFileNoTexto = !comprobarExtension($file);
        $errorFileMuyGrande = $file["size"] > 2.5 * 1024 * 1024;

        $errorFormulario = $errorFileVacio || $errorFileFallo || $errorFileNoTexto || $errorFileMuyGrande;

        if (!$errorFormulario) {
            $divResultado = getDivResult($file);
        }
    }
?>
<body>
    <h6>Contador de palabras</h6>
    <div class="input">
        <form action="ej4.php" method="post" enctype="multipart/form-data">
            
        <p>
            <label for="archivo">Seleccione un archivo (.txt, max 2.5MiB): </label>
            <input type="file" name="archivo" id="archivo" accept=".txt">
            <?php if ($errorFormulario) {
                if ($errorFileVacio) {
                    echo "<span class='error'>*Campo obligatorio*</span>";
                }elseif ($errorFileFallo) {
                    echo "<span class='error'>*hubo un error interno, pruebe otra vez*</span>";
                }elseif ($errorFileNoTexto) {
                    echo "<span class='error'>*el archivo debe tener extension .txt*</span>";
                }elseif ($errorFileMuyGrande) {
                    echo "<span class='error'>*El archivo no puede pesar mas de 2.5MB*</span>";
                }
            }?>
        </p>
        <p>
            <button type="submit" name="btnEnviar">Contar Palabras</button>
        </p>
    </form>
    </div>
    <?php 
        echo isset($_POST["btnEnviar"]) && !$errorFormulario? $divResultado : "";
    ?>
    
</body>

<?php
    function comprobarExtension($file){
        $nombre = explode(".", $file["name"]);
        $extension = end($nombre);
        return $extension == "txt";
    }

    function getDivResult($file){

        $fileContent = file_get_contents($file["tmp_name"]);
        $fileContent = preg_split("/\s+/", $fileContent);

        return "<div class='result'><p> el archivo tiene ".count($fileContent)." palabras</p></div>";
    }
?>
</html>