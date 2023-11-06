<?php 
class Literal{

    var $id, $descripcion, $fkidarticulo;

    function __construct($id, $descripcion, $fkidarticulo){
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->fkidarticulo = $fkidarticulo;
    }

    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id = $id;
    }

    function getDescripcion(){
        return $this->descripcion;
    }

    function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    function getFkidarticulo(){
        return $this->fkidarticulo;
    }

    function setFkidarticulo($fkidarticulo){
        $this->fkidarticulo = $fkidarticulo;
    }

}

?>