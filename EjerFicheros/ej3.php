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
    $errorTabla = false;
    $errorFila = false;
    if (isset($_POST["btnEnviar"])) {
        $tablaStr = trim($_POST["tabla"]);
        $filaStr = trim($_POST["fila"]);

        $errorTablaVacio = $tablaStr == "";
        $errorFilaVacio = $filaStr == "";

        $errorTablaNoNumeric = !is_numeric($tablaStr);
        $errorFilaNoNumeric = !is_numeric($filaStr);

        $tabla = !$errorTablaNoNumeric ? intval($tablaStr) : 0 ; // Para evitar warnings 
        $fila = !$errorFilaNoNumeric ? intval($filaStr) : 0 ; // Para evitar warnings 

        $errorTablaFueraRango = 1 > $tabla || 10 < $tabla;
        $errorFilaFueraRango = 1 > $fila || 10 < $fila;

        $errorTabla = $errorTablaVacio || $errorTablaNoNumeric || $errorTablaFueraRango;
        $errorFila = $errorFilaVacio || $errorFilaNoNumeric || $errorFilaFueraRango;
        
        $errorFormulario = $errorTabla || $errorFila ;
        if (!$errorFormulario) {
            $divResultado = crearDivResultado($tabla, $fila);
        }
    }

?>

<body>
    <h6>Tablas de multiplicar</h6>
    <div class="input">
        <p>
        <form action="ej3.php" method="post">
        <label for="tabla">Introduce la tabal a consultar: </label>
            <input type="text" name="tabla" id="tabla" value="<?php echo isset($_POST["btnEnviar"])? $_POST["tabla"] : ""; ?>">
            <?php
                if($errorTabla){
                    if ($errorTablaVacio) {
                        echo "<span class='error'>*Campo obligatorio*</span>";
                    } elseif ($errorTablaNoNumeric || $errorTablaFueraRango) {
                        echo "<span class='error'>*Introduzca un numero entre 1 y 10*</span>";
                    }
                }
            ?>
            </p>
            <p>
            <label for="fila">Introduce la fila a consultar: </label>
            <input type="text" name="fila" id="fila" value="<?php echo isset($_POST["btnEnviar"])? $_POST["fila"] : ""; ?>">
            <?php
                if($errorFila){
                    if ($errorFilaVacio) {
                        echo "<span class='error'>*Campo obligatorio*</span>";
                    } elseif ($errorFilaNoNumeric || $errorFilaFueraRango) {
                        echo "<span class='error'>*Introduzca un numero entre 1 y 10*</span>";
                    }
                }
            ?>
            </p>
            <p>
            <button type="submit" name="btnEnviar">Enviar</button>
        </form>
        </p>
    </div>

    <?php echo isset($_POST["btnEnviar"]) && !$errorFormulario ? $divResultado : ""?>
</body>

<?php 

function crearDivResultado($tabla, $fila){
    if (!file_exists("tablas/tabla_$tabla.txt")){
        return "<div class='result'><p>La tabal del $tabla no ha sido creada</p></div>";
    }else{
        $fileArr = file("tablas/tabla_$tabla.txt");
        $divResultado = "<div class='result'><p>";
        $divResultado .= $fileArr[$fila-1];
        $divResultado .="</p></div>";
        return $divResultado;
    }

    
}

?>

</html>