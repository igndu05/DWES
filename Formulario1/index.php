<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de formulario</title>
</head>
<body>
    <h3>Rellena tu CV</h3>
    <form action="recogida.php" method="post" enctype="multipart/form-data">
    <label for="nombre">Nombre</label></br>
    <input type="text" name="nombre" id="nom" placeholder="Introduzca un nombre"/></br>

    <label for="apellidos">Apellidos</label></br>
    <input type="text" name="apellido" id="ape" placeholder="Introduzca sus apellidos"/></br>

    <label for="contraseña">Contraseña</label></br>
    <input type="password" name="contraseña" id="passwd" placeholder="Introduzca una contraseña"/></br>

    <label for="dni">DNI</label></br>
    <input type="text" name="dni" id="dni" placeholder="Introduzca un DNI"/></br></br>

    <label for="sexo">Sexo: </label></br>
    <input type="radio" name="sexo" id="hombre" value="hombre"/>
    <label for="hombre">Hombre</label></br>
    <input type="radio" name="sexo" id="mujer" value="hombre"/>
    <label for="mujer">Mujer</label></br></br>

    <label for="img">Incluir una imagen: </label>
    <input type="file" name="foto" id="img" accept="image/*"/></br></br>
    
    <label for="ciudad">Ciudad de nacimiento:</label>
    <select name="ciudadNac" id="ciudad">
        <option value="Malaga">Malaga</option>
        <option value="Cadiz" selected>Cadiz</option>
        <option value="Cordoba">Cordoba</option>
    </select></br></br>

    <label for="comentarios">Comentarios: </label>
    <textarea id="comentarios" name="comentarios" placeholder="Introduzca sus comentarios"></textarea></br></br>

    <input type="checkbox" id="sub" name="suscripcion"/>
    <label for="sub">Suscribirse al boletin de noticias.</label></br></br>



    <input type="submit" value="Guardar cambios" name="btnEnviar"/>
    <input type="reset" value="Borrar cambios" name="btnBorrar"/>
    </form>

    
</body>
</html>