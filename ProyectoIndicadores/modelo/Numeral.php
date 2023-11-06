<?php

class Numeral{
    var $id, $descripcion, $fkidliteral;
  

    public function __construct($id, $descripcion, $fkidliteral) {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->fkidliteral = $fkidliteral;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getFkidliteral() {
        return $this->fkidliteral;
    }

    public function setFkidliteral($fkidliteral) {
        $this->fkidliteral = $fkidliteral;
    }
}

?>