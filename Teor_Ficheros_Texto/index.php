<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teoria de ficheros</title>
</head>
<body>
    <h1>Teoria de ficheros de texto</h1>
    <?php
    /*
        @$fd=fopen("prueba.txt", "r");

        if (!fd)
            die("<p>El fichero 'prueba.txt' no existe</p></body></html>");
    
        fclose($fd);
    */

        if(file_exists("prueba.txt"))
            $fd=fopen("prueba.txt","r");
        else
            die("<p>El fichero 'prueba.txt' no existe.</p></body></html");
    
        $linea=fgets($fd);
        echo "<p>".$linea."</p>";

        $linea=fgets($fd);
        echo "<p>".$linea."</p>";

        $linea=fgets($fd);
        echo "<p>".$linea."</p>";

        // Aunque no haya linea se queda al final y devuelve false
        $linea=fgets($fd);
        echo "<p>".$linea."</p>";

        while (!feof($fd))
        {
            $linea=fgets($fd);
            echo "<p>".$linea."</p>";
        }

        // Me voy al comienzo del fichero
        fseek($fd,0); 

        while ($linea = fgets($fd)) {
            echo "<p>".$linea."</p>";
        }

        fclose($fd);




        @$fd=fopen("prueba2.txt", "w");

        if (!$fd)
            die("<p>El fichero 'prueba2.txt' no existe</p></body></html>");
        
        // fputs(); ó fwrite();
        fputs($fd,"Mi primera linea".PHP_EOL);
        fwrite($fd,"Mi segunda linea".PHP_EOL);


        fclose($fd);


        @$fd=fopen("prueba2.txt", "a");

        if (!$fd)
            die("<p>El fichero 'prueba2.txt' no existe</p></body></html>");
        fputs($fd,"Mi tercera linea".PHP_EOL);

        fclose($fd);

        // unlink("prueba2.txt"); // Elimina un fichero
    
        echo "<h2>Lectura completa de un fichero</h2>";
        $todo = file_get_contents("prueba.txt");
        echo "<pre>".$todo."</pre>";

        $web = file_get_contents("https://www.google.es");
        echo $web;
    ?>
</body>
</html>