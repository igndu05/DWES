<?php
function buenos_separadores ($texto)
{
    return $texto[2] == "/" && $texto[5] == "/";
}

function buenos_numeros ($texto)
{
    return is_numeric(substr($texto, 0, 2)) && is_numeric(substr($texto, 3, 2)) && is_numeric(substr($texto, 6, 4));
}

function fecha_valida ($texto)
{
    return checkdate(substr($texto, 3, 2),substr($texto, 0, 2),substr($texto, 6, 4));
}

if(isset($_POST["btnCalcular"]))
{
    $error_fecha1 = $_POST["fecha1"] == "" || strlen($_POST["fecha1"]) != 10 || !buenos_separadores($_POST["fecha1"]) || !buenos_numeros($_POST["fecha1"]) || !fecha_valida($_POST["fecha1"]);
    $error_fecha1 = $_POST["fecha2"] == "" || strlen($_POST["fecha2"]) != 10 || !buenos_separadores($_POST["fecha2"]) || !buenos_numeros($_POST["fecha2"]) || !fecha_valida($_POST["fecha2"]);
    $error_formulario = $error_fecha1 || $error_fecha2;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Fechas</title>
    <style>
        .cuadrado{border: 3px solid black; padding:0.5em; margin-top:1em}
        .celeste{background-color:lightblue}
        .verdoso{background-color:lightgreen}
        .texto_centrado{text-align:center}
        .error{color:red}
    </style>
</head>
<body>
    <div class='cuadrado celeste'>
        <form action="fecha1.php" method="post">
        <h2 class='texto_centrado'>Fechas · Formulario</h2>
        <p>
            <label for="fecha1">Introduzca una fecha: (DD/MM/YYYY) </label>
            <input type="text" name="fecha1" id="fecha1" value="<?php if(isset($_POST["fecha1"])) echo $_POST["fecha1"];?>"></input>
            <?php
            if(isset($_POST["btnCalcular"]) && $error_fecha1)
            {
                if($_POST["fecha1"] == "")
                    echo "<span class='error'>* Campo vacio *</span>";
                else
                    echo "<span class='error'>* No has introducido una fecha valida *</span>";
            }
            ?>
        </p>
        <p>
            <label for="fecha2">Introduzca una fecha: (DD/MM/YYYY) </label>
            <input type="text" name="fecha2" id="fecha2" value="value="<?php if(isset($_POST["fecha2"])) echo $_POST["fecha2"];?>"></input>
            <?php
            if(isset($_POST["btnCalcular"]) && $error_fecha2)
            {
                if($_POST["fecha2"] == "")
                    echo "<span class='error'>* Campo vacio *</span>";
                else
                    echo "<span class='error'>* No has introducido una fecha valida *</span>";
            }
            ?>
        </p>
        <p>
            <button type="submit" name="btnCalcular">Calcular</button>
        </p>
        </form>
    </div>
    <?php
    if(isset($_POST["btnCalcular"])  && !$error_formulario)
    {
        $arr_fecha1 = explode("/", $_POST["fecha1"]);
        $arr_fecha2 = explode("/", $_POST["fecha2"]);

        $tiempo1 = mktime (0,0,0,$arr_fecha1[1], $arr_fecha1[0], $arr_fecha1[2]);
        $tiempo2 = mktime (0,0,0,$arr_fecha2[1], $arr_fecha2[0], $arr_fecha2[2]);
    
        $dif_segun = abs($tiempo1 - $tiempo2);
        $dias_pasados = floor($dif_segun / (60 * 60 * 24));

        echo "<div class='cuadrado verdoso'>";
        echo "<h2 class='texto_centrado'>Fechas · Respuesta</h2>";
        echo "<p>La diferencia en dias entre las dos fechas es: ".$dias_pasados."</p>";
        echo "</div>";

    }
    ?>
</body>
</html>