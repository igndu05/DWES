
<h3>Listado de los libros</h3>
<div class="libros">
<?php
    foreach($array_libros as $tupla)
    {
        echo "<div class='libro'>";
        echo "<img src='Images/".$tupla["portada"]."' alt='Portada' title='Portada'><br>";
        echo $tupla["titulo"]." - ".$tupla["precio"]."€";
        echo "</div>";
    }

?>
</div>