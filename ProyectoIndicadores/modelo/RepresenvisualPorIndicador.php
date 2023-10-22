<?php 
class RepresenvisualPorIndicador{

    var $fkidindicador;
    VAR $fkidrepresenvisual;
    
    function __construct($fkidindicador, $fkidrepresenvisual){
        $this->fkidindicador = $fkidindicador;
        $this->fkidrepresenvisual = $fkidrepresenvisual;
    }

    function setFkIdIndicador($fkidindicador){
        $this->fkidindicador = $fkidindicador;
    }
    function getFkIdIndicador(){
        return $this->fkidindicador;
    }

    function setFkIdRepresenvisual($fkidrepresenvisual){
        $this->fkidrepresenvisual = $fkidrepresenvisual;
    }

    function getFkIdRepresenvisual(){
        return $this->fkidrepresenvisual;
    }
    
}
?>