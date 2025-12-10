<?php

class Empleado {
    private $nombre;
    private $sueldo;

    public function __construct($nombre_nuevo, $sueldo_nuevo) {
        $this->nombre = $nombre_nuevo;
        $this->sueldo = $sueldo_nuevo;
    }

    public function get_nombre() {
        return $this->nombre;
    }

    public function get_sueldo() {
        return $this->sueldo;
    }

    public function set_nombre($nombre_nuevo){
        $this->nombre = $nombre_nuevo;
    }
    public function set_sueldo($sueldo_nuevo){
        $this->sueldo = $sueldo_nuevo;
    }

    public function imprimir() {

        if ($this->get_sueldo() > 3000){
            echo "<p><strong>Nombre: </strong>".$this->get_nombre()."";
            echo "<p><strong>Sueldo: </strong>".$this->get_sueldo()."";
            echo "<p><strong>DEBE PAGAR IMPUESTOS</strong></p>";
            echo "</br>";
        } else {
            echo "<p><strong>Nombre: </strong>".$this->get_nombre()."";
            echo "<p><strong>Sueldo: </strong>".$this->get_sueldo()."";
            echo "<p><strong>NO DEBE PAGAR IMPUESTOS</strong></p>";
            echo "</br>";
        }
        
    }
}

?>