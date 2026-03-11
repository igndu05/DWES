<?php
    const N_ANIOS = 100;
    const ARRAY_MES = array(1=> "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

    $anio_actual = date("Y");

    if(isset($_POST["btnCalcular"]))
    {
        $error_fecha1 = !checkdate ($_POST["mes1"], $_POST["dia1"], $_POST["anyo1"]);
        $error_fecha2 = !checkdate ($_POST["mes2"], $_POST["dia2"], $_POST["anyo2"]);
        $error_formulario = $error_fecha1 || $error_fecha2;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 Fechas</title>
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
        <form action="fecha2.php" method="post">
        <h2 class='texto_centrado'>Fechas · Formulario</h2>
        <p>
            <label for="fecha1">Introduzca una fecha: </label>
        </p>
        <p>
        
        <label for="dia1">Dia: </label>
        <select name="dia1" id="dia1">
        <?php
        for ($i=1; $i <= 31 ; $i++) 
        {
            if (isset($_POST["dia1"]) && $_POST["dia1"] == $i)
                echo "<option selected value='".$i."'>".sprintf("%02d", $i)."</option>";
            else
            echo "<option value='".$i."'>".sprintf("%02d", $i)."</option>";
        }
        ?>
        </select>

        <label for="mes1">Mes: </label>
        <select name="mes1" id="mes1">
        <?php
        for ($i=1; $i <= 12; $i++) 
        {
            if (isset($_POST["mes1"]) && $_POST["mes1"] == $i)
                echo "<option selected value='".$i."'>".$ARRAY_MES[$i]."</option>";
            else
            echo "<option value='".$i."'>".$ARRAY_MES[$i]."</option>";    
        }
        ?>
        </select>

        <label for="anyo1">Año: </label>
        <select name="anyo1" id="anyo1">
        <?php
        for ($i=$anio_actual - floor(N_ANIOS / 2); $i <= $anio_actual + floor(N_ANIOS / 2); $i++) 
        { 
            if (isset($_POST["anyo1"]) && $_POST["anyo1"] == $i)
                echo "<option selected value='".$i."'>".$i."</option>";   
            else
            echo "<option value='".$i."'>".$i."</option>";    
        }
        ?>
        </select>
        <?php
        if (isset($_POST["btnCalcular"]) && $error_fecha1)
        {
            echo "<span class='error'>* No has seleccionado una fecha valida</span>";
        }
        ?>
        
        </p>
        <p>
            <label for="fecha2">Introduzca otra fecha: </label>
        </p>
        <p>
        
        <label for="dia2">Dia: </label>
        <select name="dia2" id="dia2">
        <?php
        for ($i=1; $i <= 31 ; $i++) 
        { 
            if (isset($_POST["dia2"]) && $_POST["dia2"] == $i)
                echo "<option selected value='".$i."'>".sprintf("%02d", $i)."</option>";
            else
            echo "<option value='".$i."'>".sprintf("%02d", $i)."</option>";
        }
        ?>
        </select>

        <label for="mes2">Mes: </label>
        <select name="mes2" id="mes2">
        <?php
        for ($i=1; $i <= 12; $i++) 
        { 
            if (isset($_POST["mes2"]) && $_POST["mes2"] == $i)
                echo "<option selected value='".$i."'>".$ARRAY_MES[$i]."</option>";
            else
            echo "<option value='".$i."'>".$ARRAY_MES[$i]."</option>";    
        }
        ?>
        </select>

        <label for="anyo2">Año: </label>
        <select name="anyo2" id="anyo2">
        <?php
        for ($i=$anio_actual - floor(N_ANIOS / 2); $i <= $anio_actual + floor(N_ANIOS / 2); $i++) { 
            if (isset($_POST["anyo2"]) && $_POST["anyo2"] == $i)
                echo "<option selected value='".$i."'>".$i."</option>";   
            else
            echo "<option value='".$i."'>".$i."</option>";    
        }
        ?>
        </select>
        <?php
        if (isset($_POST["btnCalcular"]) && $error_fecha2)
        {
            echo "<span class='error'>* No has seleccionado una fecha valida</span>";
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
        

        echo "<div class='cuadrado verdoso'>";
        echo "<h2 class='texto_centrado'>Fechas · Respuesta</h2>";
        echo "<p>La diferencia en dias entre las dos fechas es: ".$dias_pasados."</p>";
        echo "</div>";

    }
    ?>
</body>
</html>