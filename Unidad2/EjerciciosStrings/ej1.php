<?php
function es_todo_letras($texto)
{
    $todo_letras=true;
    for ($i=0; $i < strlen($texto); $i++) { 
        if(ord($texto[$i]) < ord("A") || ord($texto[$i]) > ord("z"))
        {
            $todo_letras=false;
            break;
        }
    }
    return $todo_letras;
}


if(isset($_POST["btnComparar"]))
{
    $texto1 = trim($_POST["texto1"]);
    $texto2 = trim($_POST["texto2"]);
    $l_texto1=strlen($texto1);
    $l_texto2=strlen($texto2);
    $error_texto1=$texto1=="" || $l_texto1 < 3 || !es_todo_letras($texto1);
    $error_texto2=$texto2=="" || $l_texto2 < 3 || !es_todo_letras($texto2);

    $error_formulario= $error_texto1 || $error_texto2;
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1</title>
    <style>
        .cuadrado{border: 3px solid black; padding:0.5em; margin-top:1em}
        .celeste{background-color:lightblue}
        .verdoso{background-color:lightgreen}
        .texto_centrado{text-align:center}
        .error{color:red}
    </style>
</head>
<body>
    <div class="cuadrado celeste">
        <form action="ej1.php" method="post">
            <h2 class="texto_centrado">Ripios · Formulario</h2>
            <p>Dime dos palabras y te diré si riman:</p>
            <p>
                <label for="texto1">Primera palabra: </label>
                <input type="text" name="texto1" id="texto1" value="<?php if(isset($_POST["texto1"])) echo $texto1?>"></input>
                <?php
                if(isset($_POST["btnComparar"]) && $error_texto1)
                {
                    if($texto1 == "")
                    {
                        echo "<span class='error'>*Campo vacio*</span>";
                    }
                    elseif($l_texto1 < 3)
                    {
                        echo "<span class='error'>*Debes teclear al menos 3 letras*</span>";
                    }
                    else
                    {
                        echo "<span class='error'>*Debes teclear solo letras permitidas*</span>";
                    }
                }
                ?>
                <label for="texto2">Segunda palabra: </label>
                <input type="text" name="texto2" id="texto2" value="<?php if(isset($_POST["texto2"])) echo $texto2?>"></input>
                <?php
                if(isset($_POST["btnComparar"]) && $error_texto2)
                {
                    if($texto2 == "")
                    {
                        echo "<span class='error'>*Campo vacio*</span>";
                    }
                    elseif($l_texto2 < 3)
                    {
                        echo "<span class='error'>*Debes teclear al menos 3 letras*</span>";
                    }
                    else
                    {
                        echo "<span class='error'>*Debes teclear solo letras permitidas*</span>";
                    }
                }
                ?>
            </p>
            <p>
                <button type="submit" name="btnComparar">Comparar</button>
            </p>       
        </form>
    </div>
    <?php
    if(isset($_POST["btnComparar"]) && !$error_formulario)
    {
        $m_texto1=strtoupper($texto1);
        $m_texto2=strtoupper($texto2);

        $respuesta="no riman.";
        if($m_texto1[$l_texto1 - 1] == $m_texto2[$l_texto2 - 1] && $m_texto1[$l_texto1 - 2] == $m_texto2[$l_texto2 - 2])
        {
            $respuesta="riman un poco.";
            if($m_texto1[$l_texto1 - 3] == $m_texto2[$l_texto2 - 3])
            {
                $respuesta="riman.";
            }
        }

        echo "<div class='cuadrado verdoso'>";
        echo "<h2 class='texto_centrado'>Ripios · Respuesta</h2>";
        echo "<p>Las palabras <strong>".$texto1."</strong> y <strong>".$texto2."</strong>".$respuesta."</p>";
        echo "</div>";
    }
    ?>
</body>
</html>