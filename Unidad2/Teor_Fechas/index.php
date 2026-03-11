<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teoria de fechas en PHP</title>
</head>
<body>
    <h1>Teoria de fechas</h1>

    <?php
    $tiempo = time();
    echo "<p>".$tiempo."</p>";

    $fechaMay = date("D M Y", $tiempo);
    echo "<p>Fecha con letras mayusculas: ".$fechaMay."</p>";
    $fechaMin = date("d m y");
    echo "<p>Fecha con letras minusculas: ".$fechaMin."</p>";
    

    //checkdate (mes, dia, año)
    if (checkdate(2,20,2025))
    {
        echo "<p>La fecha existe</p>";
    }
    else
    {
        echo "<p>La fecha NO existe</p>";
    }


    //mktime (hora, minutos, segundos, mes, dia, año)
    $segundos_Quiros=mktime(13,30,0,10,5,2005);
    $cumple = date("D d M Y H:i", $segundos_Quiros);
    echo "<p>Fecha cum: ".$cumple."</p>";
    

    //strtotime("m/d/a") ó strtotime("a/m/d")
    $segundos_pasados2 = strtotime("02/07/2006");
    echo "<p>".$segundos_pasados2."</p>";


    // valor absoluto de un numero
    echo "<p>".abs(-8)."</p>";

    // redondeo pabajo
    echo "<p>".floor(-8)."</p>";

    // redondeo parriba
    echo "<p>".ceil(-8)."</p>";
    ?>
</body>
</html>
