<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ficheros</title>
</head>

<?php 
    $errorFormulario = false;
    if (isset($_POST["btnEnviar"])) {
        $numStr = trim($_POST["num"]);
        $errorNumVacio = $numStr == "";
        $errorNumNoNumeric = !is_numeric($numStr);
        $num = !$errorNumNoNumeric ? intval($numStr) : 0 ; // Para evitar warnings 
        $errorNumFueraRango = 1 > $num || 10 < $num;
        $errorFormulario = $errorNumVacio || $errorNumNoNumeric || $errorNumFueraRango;
        if (!$errorFormulario) {
            $divResultado = crearDivResultado($num);
        }
    }

?>

<body>
    <h6>Tablas de multiplicar</h6>
    <div class="input">
        <p>
        <form action="ej1.php" method="post">
            <label for="num">Introduce un numero: </label>
            <input type="text" name="num" id="num" value="<?php echo isset($_POST["btnEnviar"])? $_POST["num"] : ""; ?>">
            <?php
                if($errorFormulario){
                    if ($errorNumVacio) {
                        echo "<span class='error'>*Campo obligatorio*</span>";
                    } elseif ($errorNumNoNumeric || $errorNumFueraRango) {
                        echo "<span class='error'>*Introduzca un numero entre 1 y 10*</span>";
                    }
                }
            ?>
            <br>
            <button type="submit" name="btnEnviar">Enviar</button>
        </form>
        </p>
    </div>

    <?php echo isset($_POST["btnEnviar"]) && !$errorFormulario ? $divResultado : ""?>
</body>

<?php 

function crearDivResultado($num){
    if (!file_exists("tablas/tabla_$num.txt")){
        $file = fopen("tablas/tabla_$num.txt", "w");
        for ($i=1; $i < 10; $i++) { 
            fwrite($file, "$num x $i = ".$num*$i . PHP_EOL);
        }
        fwrite($file, "$num x 10 = ".$num*10);
        fclose($file);
        return "<div class='result'><p>tabla creada correctamente</p></div>";
    }else{
        return "<div class='result'><p>la tabal ya existia</p></div>";
    }  
}

?>

</html>