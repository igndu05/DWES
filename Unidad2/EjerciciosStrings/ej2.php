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

function es_todo_numeros($texto)
{
    $todo_numeros=true;
    for ($i=0; $i < strlen($texto); $i++) { 
        if(is_numeric($texto[$i]))
        {
            $todo_numeros=false;
            break;
        }
    }
    return $todo_numeros;
}

function es_pal_cap($texto, $l_texto)
{
    $i = 0;
    $j = $l_texto -1;
    while($i < $j)
    {
        if ($texto[$i] != $texto[$j])
        {
            $pal_cap= false;
            break;
        }
        $i++;
        $j--;
    }
    return $pal_cap;
}


if(isset($_POST["btnComprobar"]))
{
    $texto1 = trim($_POST["texto1"]);
   
    $l_texto1=strlen($texto1);
    
    

    $error_formulario= $error_texto1 =="" || $l_texto1 < 3 || (!es_todo_letras($texto1) && !es_todo_numeros($texto1));
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
            <h2 class="texto_centrado">Palindromo/Capicua · Formulario</h2>
            <p>Dime dos palabras y te diré si es un palindromo o un numero capicua:</p>
            <p>
                <label for="texto1">Introduzca texto o numero: </label>
                <input type="text" name="texto1" id="texto1" value="<?php if(isset($_POST["texto1"])) echo $texto1?>"></input>
                <?php
                if(isset($_POST["btnComprobar"]) && $error_texto1)
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
            </p>
            <p>
                <button type="submit" name="btnComprobar">Comprobar</button>
            </p>       
        </form>
    </div>
    <?php
    if(isset($_POST["btnComparar"]) && !$error_formulario)
    {
        $m_texto1=strtoupper($texto1);
        
        $pal_cap = es_pal_cap($m_texto1, $l_texto1);
        

        echo "<div class='cuadrado verdoso'>";
        echo "<h2 class='texto_centrado'>Ripios · Respuesta</h2>";
        if($pal_cap)
        {
            if(is_numeric($m_texto1))
            {
                echo "<p>El numero <strong>".$texto1."</strong> es capicuo.</p>";
            }
            else
            {
                echo "<p>El numero <strong>".$texto1."</strong> es un palindromo.</p>";
            }
        }
        else
        {
            if(is_numeric($m_texto1))
            {
                echo "<p>El numero <strong>".$texto1."</strong> NO es capicuo.</p>";
            }
            else
            {
                echo "<p>El numero <strong>".$texto1."</strong> NO es un palindromo.</p>";
            }
        }
        echo "</div>";
    }
    ?>
</body>
</html>