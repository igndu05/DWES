<?php
echo "<h2>Detalles del usuario con ID: " . $_POST["btnDetalles"] . "</h2>";
        if (!$detalles_usuario)
        {
            echo "<p class='error'>El usuario ya no se encuentra en la Base De Datos.</p>";
        }
        else
        { 
            echo "<p><strong>Usuario:</strong> ".$detalles_usuario["usuario"]."</p>";
            echo "<p><strong>Clave:</strong> ***********</p>";
            echo "<p><strong>Nombre:</strong> ".$detalles_usuario["nombre"]."</p>";
            echo "<p><strong>DNI:</strong> ".$detalles_usuario["dni"]."</p>";
            echo "<p><strong>Sexo:</strong> ".$detalles_usuario["sexo"]."</p>";
            echo "<img src='images/".$detalles_usuario["foto"]."' alt='Imagen' title='Imagen'/>";
        }
        echo "<form action='index.php' method='post'><button type='submit'>Atrás</button></form>";
?>