<?php
require "src/funciones_ctes.php";

//Código para conectarme a una base de datos

try
{
    @$conexion=mysqli_connect(SERVIDOR_BD, USUARIO_BD,CLAVE_BD,NOMBRE_BD);
    mysqli_set_charset($conexion,"utf8");
}
catch(Exception $e)
{
    die(error_page("Práctica 8", "<h1>Práctica 8</h1><p>Error no se ha podido conectar a la BD: ".$e->getMessage()."</p>"));
}

//Realizo la consulta para mostrar usuarios
try
{
    $consulta="select id_usuario, nombre, foto from usuarios";
    $result_usuarios=mysqli_query($conexion, $consulta);
}
catch(Exception $e)
{
    mysqli_close($conexion);
    die(error_page("Práctica 8", "<h1>Práctica 8</h1><p>Error no se ha podido realizar la consulta: ".$e->getMessage()."</p>"));
}

if(isset($_POST["btnDetalles"]))
{
    try
    {
        $consulta="select * from usuarios where id_usuario=".$_POST["btnDetalles"];
        $result_detalle_usuario=mysqli_query($conexion, $consulta);
    }
    catch(Exception $e)
    {
        mysqli_close($conexion);
        die(error_page("Práctica 8", "<h1>Práctica 8</h1><p>Error no se ha podido realizar la consulta: ".$e->getMessage()."</p>"));
    }
}



mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 8</title>
    <style>
        table, td, th{border:1px solid black}
        table{border-collapse:collapse;text-align:center;width:90%;margin:0 auto}
        img{height:100px}
        .enlace{background:none; border:none; color:blue;text-decoration: underline;cursor:pointer}
    </style>
</head>
<body>
    <h1>Práctica 8</h1>
    <?php
    if(isset($_POST["btnDetalles"]))
    {
        require "vistas/vista_detalles.php";
    }    
    ?>
    <h3>Listado de los usuarios</h3>
    <table>
        <tr><th>#</th><th>Foto</th><th>Nombre</th><th>Usuarios+</th></tr>
        <?php
        while($tupla=mysqli_fetch_assoc($result_usuarios))
        {
            echo "<tr>";
            echo "<td>".$tupla["id_usuario"]."</td>";
            echo "<td><img src='Img/".$tupla["foto"]."' alt='Foto de perfil' title='Foto de Perfil'></td>";
            echo "<td>";
            echo "<form action='index.php' method='post'>";
            echo "<button class='enlace' type='submit' name='btnDetalles' value='".$tupla["id_usuario"]."'>".$tupla["nombre"]."</button>";
            echo "</form>";
            echo "</td>";
            echo "<td><form action='index.php' method='post'><button class='enlace' name='btnBorrar' value='".$tupla["id_usuario"]."'>Borrar</button> - <button class='enlace' value='".$tupla["id_usuario"]."' name='btnEditar'>Editar</button></form></td>";
            echo "</tr>";
        }

        mysqli_free_result($result_usuarios);
        ?>
    </table>

</body>
</html>