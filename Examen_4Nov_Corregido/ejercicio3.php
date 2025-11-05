<?php
const SERVIDOR_BD = "localhost";
const USUARIO_BD = "jose";
const CLAVE_BD = "josefa";
const NOMBRE_BD = "bd_exam_colegio";

function error_page($title, $body)
{
    $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>' . $title . '</title>
        </head>
        <body>
            ' . $body . '
        </body>
        </html>';
    return $html;
}

try {
    @$conexion = mysqli_connect(SERVIDOR_BD, USUARIO_BD, CLAVE_BD, NOMBRE_BD);
    mysqli_set_charset($conexion, "utf8");
} catch (Exception $e) {
    die(error_page("Ejercicio 3", "<h1></h1><p>No se ha podido conectar con la BD: " . $e->getMessage() . "</p>"));
}

try {
    $consulta = "select * from alumnos";
    $result_alumnos = mysqli_query($conexion, $consulta);
} catch (Exception $e) {
    mysqli_close($conexion);
    die(error_page("Ejercicio 3", "<h1>Notas por asignatura de los alumnos</h1><p>No se ha podido realizar la consulta: " . $e->getMessage() . "</p>"));
}

if (mysqli_num_rows($result_alumnos) > 0) {
    try {
        $consulta = "select * from asignaturas";
        $result_asignaturas = mysqli_query($conexion, $consulta);
    } catch (Exception $e) {
        mysqli_free_result($result_alumnos);
        mysqli_close($conexion);
        die(error_page("Ejercicio 3", "<h1>Notas por asignatura de los alumnos</h1><p>No se ha podido realizar la consulta: " . $e->getMessage() . "</p>"));
    }

    if (mysqli_num_rows($result_asignaturas) > 0 && isset($_POST["asignatura"])) {
        try {
            $consulta = "select alumnos.nombre, notas.nota from alumnos , notas wehre alumnos.cod_alu = notas.cod_alu and notas.cod_asig =".$_POST["asignatura"]."";
            $result_asignaturas = mysqli_query($conexion, $consulta);
        } catch (Exception $e) {
            mysqli_free_result($result_alumnos);
            mysqli_close($conexion);
            die(error_page("Ejercicio 3", "<h1>Notas por asignatura de los alumnos</h1><p>No se ha podido realizar la consulta: " . $e->getMessage() . "</p>"));
        }
    }
}




mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Examen</title>
</head>

<body>
    <h1>Notas por asignatura de los alunmnos</h1>
    <?php
    if (!isset($result_asignaturas)) {
        echo "<p>No hay aún ningun alumno en la BD</p>";
    } elseif (mysqli_num_rows($result_asignaturas) <= 0) {
        mysqli_free_result($result_asignaturas);
        mysqli_free_result($result_alumnos);
        echo "<p>No hay ninguna asignatura en la BD</p>";
    } else {
        ?>
        <form action="ejercicio3.php" method="post">
            <p>
                <label for="asignatura">Seleccione una asignatura</label>
                <select name="asignatura" id="asignatura">
                    <?php
                    while ($tupla = mysqli_fetch_assoc($result_asignaturas)) {
                        if (isset($_POST["asignatura"]) && $_POST["asignatura"] == $tupla["cod_asig"]) {
                            echo "<option selected value'" . $tupla["cod_asig"] . "'>" . $tupla["denominacion"] . "</option>";
                            $nombre_asignatura_select = $tupla["denominacion"];
                        } else {
                            echo "<option value'" . $tupla["cod_asig"] . "'>" . $tupla["denominacion"] . "</option>";
                        }
                    }

                    mysqli_free_result($result_asignaturas)
                        ?>
                </select>
                <button type="submit" name="btnVerNotas">Ver notas</button>
            </p>
        </form>
        <?php
            if(isset($_POST["asignaturas"]))
            {
                echo "<h2>Nota de los alumnos en la asignatura de ".$nombre_asignatura_select."</h2>";
                echo "<table border='1'>";
                echo "<tr><th>Nombre</th><th>Nota</th></tr>";
                $ids_alumnos_calificados = [];
                while ($tupla = mysqli_fetch_assoc($result_notas)) {
                    echo "<tr>";
                    echo "<td>".$tupla["nombre"]."</td><td>".$tupla["nota"]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_free_result($result_notas);

                if(mysqli_num_rows($result_alumnos) != count($ids_alumnos_calificados))
                {
                    echo "<h3>Listado de los alumnos que aun le quedan la asignatura ".$nombre_asignatura_select." por calificar</h3>";
                    echo "<ol>";
                    while ($tupla=mysqli_fetch_assoc($result_alumnos)) {
                        if (!in_array($tupla["cod_alu"], $ids_alumnos_calificados))
                            echo "<li>".$tupla["nombre"]."</li>";
                    }
                    echo "</ol>";
                }
            }
    }

    ?>
</body>

</html>