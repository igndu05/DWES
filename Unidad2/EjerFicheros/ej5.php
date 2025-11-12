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
    <h6>PIB per capita UE</h6>
    <?php
        $doc = explode("\n", file_get_contents("http://dwese.icarosproject.com/PHP/datos_ficheros.txt"));
        $divResult = "<table border='1px'>";

        // headers
        $divResult .= "<tr>";
        $fila = explode("\t",$doc[0]);
        foreach ($fila as $k => $v) {
            $divResult .= "<th>$v</th>";
        }
        $divResult .= "</tr>";
        
        // datos
        for ($i=1; $i < count($doc); $i++) {
            $divResult .= "<tr>";
            $fila = explode("\t",$doc[$i]);
            $flagPrimCol = true;
            foreach ($fila as $k => $v) {
                $divResult .= $flagPrimCol? "<th>$v</th>" : "<td>$v</td>";
                $flagPrimCol = false;
            }
            $divResult .= "</tr>";

        }
        $divResult .= "</table>";
        
        echo $divResult
        
    ?>
    </body>
</html>