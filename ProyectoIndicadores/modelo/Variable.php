<?php 
class Variable{

    var $id, $fechacreacion, $fkemailusuario;

    function __construct($id, $fechacreacion, $fkemailusuario, ){
        $this->id = $id;
        $this->fechacreacion = $fechacreacion;
        $this->fkemailusuario = $fkemailusuario;
   
    }

    function setId($id){
        $this->id = $id;
    }

    function getId(){
        return $this->id;
    }

    function setFechacreacion($fechacreacion){
        $this->fechacreacion = $fechacreacion;
    }

    function getFechacreacion(){
        return $this->fechacreacion;
    }

    function setFkemailusuario($fkemailusuario){
        $this->fkemailusuario = $fkemailusuario;
    }

    function getFkemailusuario(){
        return $this->fkemailusuario;
    }

    function toString(){
        return "Id: " . $this->id . 
        " Fechacreacion: " . $this->fechacreacion . 
        " Fkemailusuario: " . $this->fkemailusuario ;
    }
}



?>

