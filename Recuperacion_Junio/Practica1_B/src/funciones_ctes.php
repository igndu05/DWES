<?php
function tiene_extension ($nombre_archivo) {
    $extension = false;
    $array = explode(".", $nombre_archivo);
    if(count($array) > 1){
        // $extension = $array[count($array) - 1];
        $extension = end($array);
    }

    return $extension;
}

function es_imagen ($file, $size) {
    $es_imagen = false;

    if($size > 0) {
        $es_imagen = getimagesize($file);
    }

    return $es_imagen;
}
?>