<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        table{
            margin: auto;
            border-collapse: collapse;
            border: 1px solid black;
        }
        td,th{
            padding: 2px 5px;
        }
        th{
            background-color: rgb(255, 221, 182)
        }
    </style>
    <title>Ficheros</title>
</head>
<body>
        <?php
        $doc = explode("\n", file_get_contents("http://dwese.icarosproject.com/PHP/datos_ficheros.txt"));
        $errorFormulario = count($doc) < 1;
        if ($errorFormulario) {
            echo "soy hay";
        }
        $cabecera = getDatos($doc[0]);
        $paises;
        for ($i=1; $i < count($doc); $i++) {
            $k = getIniPais($doc[$i]);
            $v = getDatos($doc[$i]);
            $paises[$k] = $v;
        }

        if (isset($_POST["btnEnviar"])) {
            if (!$errorFormulario) {
                $divResult = getDivResult($cabecera, $paises[$_POST["paises"]]);
            }
        }
        ?>

    <h6>PIB per capita UE</h6>
    <div class="input">
        <form action="ej6.php" method="post">
        <p>
            <label for="pais">Selecione un pais: </label>
            <?php 
                echo getSelectPaises($paises);
            ?>
        </p>
        <p>
            <button type="submit" name="btnEnviar">Comprobar</button>
        </p>
        </form>
    </div>

    <?php echo isset($_POST["btnEnviar"]) && !$errorFormulario ? $divResult : "fallo"?>
    

    <?php
        function getDatos($fila){
            $fila = explode("\t",$fila);
            array_splice($fila, 0,1);
            return $fila;
        }

        function getIniPais($fila){
            $fila = explode("\t",$fila);
            $header = explode(",",$fila[0]);
            $ini = end($header);
            return $ini;
        }

        function getSelectPaises($paises){
            $select = "<select name='paises' id='paises'>";

            $selected = "";
            foreach ($paises as $k => $v) {
                $selected = isset($_POST["paises"]) && $_POST["paises"] == $k ? "selected" : "";
                $select .= "<option value='$k' $selected>$k</option>";
            }
            $select .= "</select>";
            return $select;
        }

        function getDivResult($cabecera, $pais){
            
            $divResult = "<table border='1px'><tr><th>año</th>";
            foreach ($cabecera as $k => $v) {
                $divResult .= "<th>$v</th>";
            }
            $divResult .= "</tr><tr><th>".$_POST['paises']."</th>";
            foreach ($pais as $k => $v) {
                $divResult .= "<td>$v</td>";
            }
            $divResult .= "</tr></table>";
            return $divResult;

        }

        
    ?>
    </body>
</html>