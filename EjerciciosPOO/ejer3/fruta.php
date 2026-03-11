<?php
class Fruta {
    private $color;
    private $tamanyo;
    private static $n_frutas;

    public function __construct($color_nuevo, $tamanyo_nuevo) {
        $this->color = $color_nuevo;
        $this->tamanyo = $tamanyo_nuevo;
        /*TODO lo que sea estatico lleva ::*/
        self::$n_frutas++;

    }

    public function __destruct(){
        self::$n_frutas--;
    }

    public static function cuantaFruta() {
        return self::$n_frutas;
    }

    public function imprimir(){
        echo "<p><strong>Color: </strong>".$this->get_color()."";
        echo "<p><strong>Tamaño: </strong>".$this->get_tamanyo()."";
    }

    public function get_color() {
        return $this->color;
    }

    public function get_tamanyo() {
        return $this->tamanyo;
    }

    public function set_color($color_nuevo){
        $this->color = $color_nuevo;
    }
    public function set_tamanyo($tamanyo_nuevo){
        $this->tamanyo = $tamanyo_nuevo;
    }
}


?>