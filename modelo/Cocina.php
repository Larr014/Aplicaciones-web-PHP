<?php
class Cocina{
    private $nombre;
    private $marca;
    private $nPlatos;
    //Es un constructor
    function __construct($nombre,$marca,$nPlatos){
        $this->nombre = $nombre;
        $this->marca = $marca;
        $this->nPlatos = $nPlatos;
        
    }
    function getNombre(){
        return $this->nombre;
    }
    function getMarca(){
        return $this->marca;
    }
    function getNPlatos(){
        return $this->nPlatos;
    }
}

?>