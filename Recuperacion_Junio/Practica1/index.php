<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario CV</title>
</head>
<body>
    <h1>Practica 1</h1>
    <form action="post" enctype="multipart/form-data">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" placeholder="Inserte un usuario..."/>
        <br><br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" placeholder="Inserte un nombre..."/>
        <br><br>

        <label for="usuario">Contraseña:</label>
        <input type="password" name="contraseña" id="contraseña" placeholder="Inserte una contraseña..."/>
        <br><br>

        <label for="dni">DNI:</label>
        <input type="text" name="dni" id="dni" placeholder="Inserte un dni..."/>
        <br><br>

        <label for="sexo">Sexo:</label><br><br>
        <input type="radio" name="sexo" id="hombre" value="hombre"/><label for="hombre">Hombre</label>
        <br><br>
        <input type="radio" name="sexo" id="mujer" value="mujer"/><label for="mujer">Mujer</label>
        <br><br>

        <label for="imagen">Incluir mi foto (Máx: 500 kb): </label>
        <input type="file" name="imagen" id="imagen" accept="image/*">
        <br><br>

        <input type="checkbox" name="boletin" id="boletin"/>
        <label for="boletin">Suscribirme al boletin de novedades</label>
        <br><br>

        <input type="submit" value="Guardar cambios" name="btnEnviar"/>
        <input type="reset" value="Borrar cambios" name="btnBorrar"/>
    </form>
</body>
</html>