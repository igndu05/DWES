<?php
if(isset($_POST["btnCalcular"]))
{
    $error_fecha1 = $_POST["fecha1"] == "";
    $error_fecha1 = $_POST["fecha2"] == "";
    $error_formulario = $error_fecha1 || $error_fecha2;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 Fechas</title>
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
        <form action="fecha3.php" method="post">
        <h2 class='texto_centrado'>Fechas · Formulario</h2>
        <p>
            <label for="fecha1">Introduzca una fecha: (DD/MM/YYYY) </label>
            <input type="date" name="fecha1" id="fecha1" value="<?php if(isset($_POST["fecha1"])) echo $_POST["fecha1"];?>"></input>
            <?php
            if(isset($_POST["btnCalcular"]) && $error_fecha1)
            {
                echo "<span class='error'>* Debes seleccionar una fecha *</span>";
            }
            ?>
        </p>
        <p>
            <label for="fecha2">Introduzca una fecha: (DD/MM/YYYY) </label>
            <input type="date" name="fecha2" id="fecha2" value="value="<?php if(isset($_POST["fecha2"])) echo $_POST["fecha2"];?>"></input>
            <?php
            if(isset($_POST["btnCalcular"]) && $error_fecha2)
            {
                echo "<span class='error'>* Debes seleccionar una fecha *</span>";
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
        $tiempo1 = strtotime($_POST["fecha1"]);
        $tiempo2 = strtotime($_POST["fecha2"]);
    
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