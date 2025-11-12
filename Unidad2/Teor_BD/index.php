<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teoria BD</title>
</head>
<body>
    <h1>Teoria BD</h1>
    <?php
    const SERVIDOR_DB = "localhost";
    const USUARIO_DB = "jose";
    const CLAVE_DB = "josefa";
    const NOMBRE_DB = "bd_teoria";

    try {
        $conexion = mysqli_connect(SERVIDOR_DB, USUARIO_DB, CLAVE_DB, NOMBRE_DB);
        mysqli_set_charset($conexion, "utf8");
    } catch (Exception $e) {
        die("<p>Error no se ha podido conectar a la BD: ".$e->getMessage()."</p></body></html>");
    }
    
    echo "<h2>Conexion realizada con exito</h2>";
    
    try {
        $consulta = "select * from t_alumnos";
        $resultado = mysqli_query($conexion, $consulta);
    } catch (Exception $e) {
        mysqli_close($conexion);
        die("<p>Error no se ha podido realizar la consulta: ".$e->getMessage()."</p></body></html>");
    }
    
    echo "<h2>Consulta realizada con exito</h2>";

    mysqli_close($conexion);
    ?>
</body>
</html>