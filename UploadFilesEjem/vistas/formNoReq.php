<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teoria subir ficheros</title>
</head>
<body>
    <h1>Teoria subir ficheros</h1>
    <form action="indexNoReq.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="foto">Subir imagen con extension (>500Kb)</label>
            <input type="file" name="foto" id="foto" accept="image/*">
            <?php
            if(isset($_POST["btnEnviar"])){
                echo $errorFotoVacia ? "<spam>no ha seleccionado un archivo</spam><br>" : "";
                echo $errorHaDadoFallo ? "<spam>ha ocurrido un error en el servidor</spam><br>" : "";
                echo $errorFotoMuyGrande ? "<spam>el archivo seleccionado es demasiado grande</spam><br>" : "";
                echo $errorExtension ? "<spam>el archivo no posee una extension</spam><br>" : "";
                echo $errorType ? "<spam>el archivo no es una imagen</spam><br>" : "";
            }
            ?>
        </p>
        <p>
            <button type="submit" name="btnEnviar">Enviar</button>
        </p>
    </form>
</body>
</html>