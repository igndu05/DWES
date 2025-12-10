<?php

class Uva extends Fruta {
    private $semilla;

    public function __construct($color, $tamanyo, $tiene_semilla){
        $this->semilla = $tiene_semilla;
        parent::__construct($color, $tamanyo);
    }

    public function tieneSemilla(){
        return $this->semilla;
    }

    public function imprimir() {

        if ($this->tieneSemilla()){
            echo "<p><strong>Color: </strong>".parent::get_color()."";
            echo "<p><strong>Tamaño: </strong>".parent::get_tamanyo()."";
            echo "<p><strong>Tiene semilla</strong></p>";
        } else {
            echo "<p><strong>Color: </strong>".parent::get_color()."";
            echo "<p><strong>Tamaño: </strong>".parent::get_tamanyo()."";
            echo "<p><strong>No tiene semilla</strong></p>";
        }
        
    }
    

}


?>