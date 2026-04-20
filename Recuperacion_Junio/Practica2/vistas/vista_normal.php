<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 2 - Recuperación 25-26</title>
    <style>
        .enlace {
            border: none;
            background-color: none;
            color: blue;
            text-decoration: underline;
            cursor: pointer;
        }
        .mensaje {
            color: blue;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <h1>Práctica Rec 2</h1>
    <form action="index.php" method="post">
    <p>
        Bienvenido <strong><?php echo $datos_usu_log["usuario"]?></strong> a la página principal. Usted está logueado -
        <button class="enlace" type="submit" name="btnCerrarSesion">Salir</button>
    </p>
    </form>
    <?php
    if (isset($_SESSION["registro"]))
        echo "<p class='mensaje'>".$_SESSION["registro"]."</p>";
        unset($_SESSION["registro"]);
    ?>
</body>
</html>