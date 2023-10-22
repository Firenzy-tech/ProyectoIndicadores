<?php 
class Actor{
    var $fkidtipoactor, $nombre, $id

    function __construct($fkidtipoactor, $nombre,$id){
        $this->fkidtipoactor = $fkidtipoactor;
        $this->nombre = $nombre;
        $this->id = $id;
    }

    function setFkidtipoactor($fkidtipoactor){
        $this->fkidtipoactor = $fkidtipoactor;
    }
    
    function getFkidtipoactor(){
        return $this->fkidtipoactor;
    }

    function setNombre($nombre){
        $this->nombre = $nombre;
    }

    function getNombre(){
        return $this->nombre;
    }

    function setId($id){
        $this->id = $id;
    }

    function getId(){
        return $this->id;
    }
}
?>