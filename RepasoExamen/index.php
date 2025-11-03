<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repaso examen</title>
</head>
<body>
    <?php
    // ARRAYS

    /*
    $array["CHIC"] = "Chicago";

        foreach ($array as $i => $valor) {
            echo "<p>El indice del array que contiene como valor $valor es $i</p>";
        }
    */

    // FICHEROS DE TEXTO (CHMOD777 EN LA CARPETA O CARPETAS)

    /*
    Usamos $_FILES["fichero"]["name|error|size"] y file_get_contents()
    */

    // BASES DE DATOS

    /*
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


    mysqli_set_charset("CONEXION", "QUERY")
    die() -> PA CERRAR EL PROGRAMA
    mysqli_close("conexion")
    mysqli_query("conexion", "consulta")
    while($tupla = mysqli_fetch_assoc($result_asig))
    |
    |
    |-> si aqui hacemos $tupla["nombre"] accedemos a los nombres de esa query.
    */
    ?>
</body>
</html>