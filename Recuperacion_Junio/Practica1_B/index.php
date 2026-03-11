<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segundo formulario</title>
</head>
<body>
    <h1>Segundo formulario</h1>
    <form action="post" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre"/>
        <br><br>

        <label for="nacido">Nacido en: </label>
        <select id="nacido" name="nacido">
            <option value="Malaga">Malaga</option>
            <option value="Cadiz">Cadiz</option>
            <option value="Granada">Granada</option>
        </select>
        <br><br>

        <p>Sexo:</p>
        <input type="radio" name="hombre" id="hombre"/>
        <label for="hombre">Hombre</label>
        <br>
        <input type="radio" name="mujer" id="mujer"/>
        <label for="mujer">Mujer</label>

        <p>Aficiones:</p>
        <input type="checkbox" name="deportes" id="deportes"/>
        <label for="deportes">Deportes</label>
        <input type="checkbox" name="lectura" id="lectura"/>
        <label for="lectura">Lectura</label>
        <input type="checkbox" name="otros" id="otros"/>
        <label for="otros">Otros</label>
        <br><br>

        <p>
            <label for="comentarios">Comentarios: </label>
            <textarea id="comentarios" name="comentarios" rows="4" cols="50"></textarea>
        </p>

        <br>

        <label for="foto">Incluir una foto (Archivo de tipo imagen max 500kb): </label>
        <input type="file" name="foto" id="foto" accept="image/*">
        <br><br>

        <input type="submit" value="Enviar" name="btnEnviar"/>
        <input type="reset" value="Borrar campos" name="btnBorrar"/>
        
    </form>
</body>
</html>