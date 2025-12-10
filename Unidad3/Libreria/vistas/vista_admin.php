<?php
try
{
    $consulta="select * from libros";
    $result_libros=mysqli_query($conexion,$consulta);
    $array_libros=array();
    while($tupla=mysqli_fetch_assoc($result_libros))
        $array_libros[]=$tupla;

    mysqli_free_result($result_libros);

}
catch(Exception $e)
{
    mysqli_close($conexion);
    session_destroy();
    die(error_page("Librería", "<h1>Librería</h1><p>Error no se ha podido realizar la consulta: ".$e->getMessage()."</p>"));
}

mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería</title>
    <style>
        .en_linea{display: inline;}
        .enlace{background:none;border:none;text-decoration: underline;color:blue;cursor:pointer}
        .libros{display:flex;flex-flow:wrap ;}
        .libro{flex:0 0 30%; text-align: center;}
        .libro img{width:100%}
        table,th,td{border:1px solid black}
        table{border-collapse:collapse; width:90%; margin:0 auto; text-align:center}
        th{background-color:#CCC}
    </style>
</head>
<body>
    <h1>Librería</h1>
    <div>
        Bienvenido <strong><?php echo $datos_usu_log["lector"];?></strong> - 
        <form action="../index.php" method="post" class="en_linea">
            <button type="submit" class="enlace" name="btnCerrarSesion">Salir</button>
        </form>
    </div>

    <h3>Listado de las usuarios</h3>
    <?php
        echo "<table>";
        echo "<tr><th>Ref</th><th>Título</th><th>Acción</th></tr>";
        foreach($array_libros as $libro)
        {
            echo "<tr>";
            echo "<td>".$libro["referencia"]."</td>";
            echo "<td>".$libro["titulo"]."</td>";
            echo "<td>Borrar - Editar</td>";    
            echo "</tr>";
        }
        echo "</table>";
    ?>
    <h3>Agregar un usuario Nuevo</h3>
</body>
</html>