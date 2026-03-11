<?php

    function error_page($title, $body)
    {
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>'.$title.'</title>
        </head>
        <body>
            '.$body.'
        </body>
        </html>';
        return $html;
    }

    const SERVIDOR_DB = "localhost";
    const USUARIO_DB = "jose";
    const CLAVE_DB = "josefa";
    const NOMBRE_DB = "bd_teoria";

    try {
        $conexion = mysqli_connect(SERVIDOR_DB, USUARIO_DB, CLAVE_DB, NOMBRE_DB);
        mysqli_set_charset($conexion, "utf8");
    } catch (Exception $e) {
        die(error_page("Bases de datos (Practica 1)","<h1>Practica 1 - BD</h1><p>Error no se ha podido conectar a la BD: ".$e->getMessage().""));
    }

    try {
        $consulta = "select * from t_asignaturas";
        $result_asig = mysqli_query($conexion, $consulta);
    } catch (Exception $e) {
        mysqli_close($conexion);
        die("<p>Error no se ha podido realizar la consulta: ".$e->getMessage()."</p></body></html>");
    }

    if(isset($_POST["asignatura"]))
    {
        try {
            $consulta = "SELECT t_alumnos.nombre, t_notas.nota FROM t_alumnos, t_notas WHERE t_alumnos.cod_alu = t_notas.cod_alu AND t_notas.cod_asig=".$_POST["asignatura"];
            $result_alumnos_notas = mysqli_query($conexion, $consulta);
        } catch (Exception $e) {
            mysqli_close($conexion);
            die("<p>Error no se ha podido realizar la consulta: ".$e->getMessage()."</p></body></html>");
        }
    }

    mysqli_close($conexion);
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bases de datos (Practica 1)</title>
    <style>
        table, tr, th, td {
            border: 1px solid black;
            padding: 10px;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <h1>Practica 1 - BD</h1>
    <?php
    if(mysqli_num_rows($result_asig) > 0)
    {

    
    ?>
    <form action="index.php" method="post">
        <p>
            <label for="asignatura">Elija una asignatura: </label>
            <select id="asignatura" name="asignatura">
            <?php
            while($tupla = mysqli_fetch_assoc($result_asig))
            {
                if(isset($_POST["asignatura"]) && $_POST["asignatura"] == $tupla["cod_asig"])
                {
                    echo "<option selected value='".$tupla["cod_asig"]."'>".$tupla["denominacion"]."</option>";
                    $nombre_asig = $tupla["denominacion"];
                }
                else
                    echo "<option value='".$tupla["cod_asig"]."'>".$tupla["denominacion"]."</option>";
            }

            mysqli_free_result($result_asig);
            ?>
            </select>
            <button type="submit" name="btnVerNotas">Ver notas</button>
        </p>
    </form>

    <?php
    if(isset($_POST["asignatura"])) // Si se ha hecho submit == Daria igual preguntar por boton que por asignaturas
    {
        echo "<h3>Nota de los alumnos en ".$nombre_asig."</h3>";
        echo "<table>";
        echo "<tr><th>Nombre</th><th>Nota</th></tr>";
        while($tupla=mysqli_fetch_assoc($result_alumnos_notas))
        {
            echo "<tr>";
            echo "<td>".$tupla["nombre"]."</td>";
            echo "<td>".$tupla["nota"]."</td>";
            echo "</tr>";
        }
        echo "</table>";

        mysqli_free_result($result_alumnos_notas);
    }

    }
    else
    {
        echo "<h3>La BD aún no tiene ninguna asignatura registrada</h3>";
    }
    ?>
</body>
</html>

