<?php

class ResultadoIndicador {
    var $id;
    var $resultado;
    var $fechacalculo;
    var $fkidindicador;

    public function __construct($id, $resultado, $fechacalculo, $fkidindicador) {
        $this->id = $id;
        $this->resultado = $resultado;
        $this->fechacalculo = $fechacalculo;
        $this->fkidindicador = $fkidindicador;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getResultado() {
        return $this->resultado;
    }

    public function setResultado($resultado) {
        $this->resultado = $resultado;
    }

    public function getFechaCalculo() {
        return $this->fechacalculo;
    }

    public function setFechaCalculo($fechacalculo) {
        $this->fechacalculo = $fechacalculo;
    }

    public function getFkIdIndicador() {
        return $this->fkidindicador;
    }

    public function setFkIdIndicador($fkidindicador) {
        $this->fkidindicador = $fkidindicador;
    }
}

?>
