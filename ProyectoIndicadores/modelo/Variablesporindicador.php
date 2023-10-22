<?php 
class Variablesporindicador{

    var $dato, $fechadato, $fkemailusuario, $fkidindicador, $fkidvariable;
    
    function __construct($dato, $fechadato, $fkemailusuario, $fkidindicador, $fkidvariable){
        $this->dato = $dato;
        $this->fechadato = $fechadato;
        $this->fkemailusuario = $fkemailusuario;
        $this->fkidindicador = $fkidindicador;
        $this->fkidvariable = $fkidvariable;
    }

    function setDato($dato){
        $this->dato = $dato;
    }
    function getDato(){
        return $this->dato;
    }

    function setFechadato($fechadato){
        $this->fechadato = $fechadato;
    }
    function getFechadato(){
        return $this->fechadato;
    }

    function setFkemailusuario($fkemailusuario){
        $this->fkemailusuario = $fkemailusuario;
    }

    function getFkemailusuario(){
        return $this->fkemailusuario;
    }

    function setFkidindicador($fkidindicador){
        $this->fkidindicador = $fkidindicador;
    }

    function getFkidindicador(){
        return $this->fkidindicador;
    }

    function setFkidvariable($fkidvariable){
        $this->fkidvariable = $fkidvariable;
    }

    function getFkidvariable(){
        return $this->fkidvariable;
    }

    function toString(){
        return "Dato: " . $this->dato . 
        " Fechadato: " . $this->fechadato . 
        " Fkemailusuario: " . $this->fkemailusuario . 
        " Fkidindicador: " . $this->fkidindicador . 
        " Fkidvariable: " . $this->fkidvariable ;
    }
}
?>