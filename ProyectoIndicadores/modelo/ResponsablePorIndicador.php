<?php
class ResponsablePorIndicador{
    var $fkidresponsable;
    var $fkidindicador;
    var $fechaasignacion;

    public function __construct($fkidresponsable, $fkidindicador){
        $this->fkidresponsable = $fkidresponsable;
        $this->fkidindicador = $fkidindicador;
        $this->fechaasignacion = date("Y-m-d");
    }

    public function getFkidresponsable(){
        return $this->fkidresponsable;
    }

    public function setFkidresponsable($fkidresponsable){
        $this->fkidresponsable = $fkidresponsable;
    }

    public function getFkidindicador(){
        return $this->fkidindicador;
    }

    public function setFkidindicador($fkidindicador){
        $this->fkidindicador = $fkidindicador;
    }

    public function getFechaasignacion(){
        return $this->fechaasignacion;
    }

    public function setFechaasignacion($fechaasignacion){
        $this->fechaasignacion = $fechaasignacion;
    }
}
?>
