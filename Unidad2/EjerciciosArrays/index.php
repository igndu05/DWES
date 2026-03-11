<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 17</title>
</head>
<body>
    <h1>Ejercicio 17</h1>
    <?php
        $familias["Los Simpsons"]["Padre"] = "Homer";
        $familias["Los Simpsons"]["Madre"] = "Marge";
        $familias["Los Simpsons"]["Hijos"]["Hijo1"] = "Bart";
        $familias["Los Simpsons"]["Hijos"]["Hijo2"] = "Lisa";
        $familias["Los Simpsons"]["Hijos"]["Hijo3"] = "Maggie";
        $familias["Los Griffin"]["Padre"] = "Peter";
        $familias["Los Griffin"]["Madre"] = "Lois";
        $familias["Los Griffin"]["Hijos"]["Hijo1"] = "Chris";
        $familias["Los Griffin"]["Hijos"]["Hijo2"] = "Meg";
        $familias["Los Griffin"]["Hijos"]["Hijo3"] = "Stewie";

        echo "<ul>";
        foreach($familias as $familia => $valores)
        {
            echo "<li>";
            echo $familia;
            echo "<ul>";
            foreach($valores as $parentesco => $nombres)
            
                if(is_array($nombres)){
                    echo "<li>";
                    echo $parentesco. ":";
                    echo "<ul>";
                    foreach ($nombres as $n_hijo => $nombre) 
                        echo "<li>".$n_hijo.": ".$nombre."</li>";
                    
                    echo "</ul>";
                    echo "</li>";
                }
                else
                    echo "<li>".$parentesco.": ".$nombres."</li>";
            echo "</ul>";
            echo "</li>";
        }

        echo "</ul>"
    ?>
</body>
</html>