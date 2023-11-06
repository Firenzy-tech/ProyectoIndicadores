<?php
class Paragrafo{
    var $id, $descripcion, $fkidarticulo;
   

    public function __construct($id, $descripcion, $fkidarticulo) {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->fkidarticulo = $fkidarticulo;
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

    public function getFkidarticulo() {
        return $this->fkidarticulo;
    }

    public function setFkidarticulo($fkidarticulo) {
        $this->fkidarticulo = $fkidarticulo;
    }
}

?>