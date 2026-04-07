<?php
function dni_bien_escrito($texto) 
{
    $dni = strtoupper($texto);

    /*
    $longitud_buena = strlen($dni) == 9;
    $es_numero = is_numeric(substr($dni,0,8));
    $es_letra = substr($dni, -1) >= "A" && substr($dni, -1) <= "Z";
    */
    return strlen($dni) == 9 && is_numeric(substr($dni,0,8)) && substr($dni, -1) >= "A" && substr($dni, -1) <= "Z";
}

function LetraNIF ($dni) {
    return substr("TRWAGMYFPDXBNJZSQVHLCKE", $dni % 23, 1); 
}

function dni_valido ($texto) {
    $dni = strtoupper($texto);

    return LetraNIF(substr($dni,0,8)) == substr($dni, -1);
}

?>