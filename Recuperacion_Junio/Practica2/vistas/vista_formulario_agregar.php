<h2>Agregar Nuevo Usuario</h2>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="usuario">Usuario:</label><br />
            <input type="text" name="usuario" id="usuario" placeholder="Usuario..." />
            <?php
            if (isset($_POST["btnContNuevo"]) && $error_usuario) {
                if ($_POST["usuario"] == "")
                    echo "<span class='error'>* Debe añadir un nombre de usuario *</span>";
                else
                    echo "<span class='error'>* El usuario está repetido en la BD *</span>";
            }
            ?>
        </p>

        <p>
            <label for="nombre">Nombre:</label><br />
            <input type="text" name="nombre" id="nombre" placeholder="Nombre..." />
            <?php
            if (isset($_POST["btnContNuevo"]) && $error_nombre) {
                echo "<span class='error'>* Debe añadir un nombre *</span>";
            }
            ?>
        </p>

        <p>
            <label for="clave">Contraseña:</label><br />
            <input type="password" name="clave" id="clave" placeholder="Contraseña..." />
            <?php
            if (isset($_POST["btnContNuevo"]) && $error_contraseña) {
                echo "<span class='error'>* Debe añadir una contraseña *</span>";
            }
            ?>
        </p>

        <p>
            <label for="dni">DNI:</label><br />
            <input type="text" name="dni" id="dni" placeholder="DNI..." />
            <?php
            if (isset($_POST["btnContNuevo"]) && $error_dni) {
                if ($_POST["dni"] == "")
                    echo "<span class='error'>* Debe añadir un DNI *</span>";
                elseif (!dni_bien_escrito($_POST["dni"]))
                    echo "<span class='error'>* Debe escribir un DNI correctamente *</span>";
                elseif (!dni_valido($_POST["dni"]))
                    echo "<span class='error'>* Debe escribir un DNI válido *</span>";
                else
                    echo "<span class='error'>* El DNI ya está registrado en la BD *</span>";
            }
            ?>
        </p>

        <p>
            <label for="sexo">Sexo:</label>
            <input type="radio" id="hombre" name="sexo" value="hombre" checked /><label for="hombre">Hombre</label>
            <input type="radio" id="mujer" name="sexo" value="mujer" /><label for="mujer">Mujer</label>
        </p>


        <p>
            <label for="archivo">Incluir mi foto (Máx. 500 KB)</label>
            <input type="file" name="archivo" id="archivo" />
            <?php
            if (isset($_POST["btnContNuevo"]) && $error_archivo) {
                if ($_FILES["archivo"]["error"]) {
                    echo "<span class='error'>* Error en la subida del fichero al servidor *</span>";
                } elseif (!tiene_extension($_FILES["archivo"]["name"])) {
                    echo "<span class='error'>* El archivo seleccionado no tiene extension *</span>";
                } elseif (!es_imagen($_FILES["archivo"]["tmp_name"], $_FILES["archivo"]["size"])) {
                    echo "<span class='error'>* No has seleccionado un archivo de tipo imagen *</span>";
                } else {
                    echo "<span class='error'>* El archivo imagen seleccionado sobrepasa los 500 KB *</span>";
                }
            }
            ?>
        </p>

        <p>
            <input type="checkbox" name="boletin" id="boletin" />
            <label for="boletin">Suscribirme al boletin de novedades</label>
            <?php
            if (isset($_POST["btnEnviar"]) && $error_boletin)
                echo "<span class='error'> Debes suscribirte al boletin</span>"
                    ?>
            </p>

            <p>
                <button type="submit" name="btnContNuevo">Guardar cambios</button>
                <button type="submit">Atrás</button>
            </p>
    </form>