<?php 
class Indicador{
    
    var $id;
    var $codigo;
    var $nombre;
    var $objetivo;
    var $alcance;
    var $formula;
    var $fkidtipoindicador;
    var $fkidunidadmedicion;
    var $meta;
    var $fkidsentido;
    var $fkidfrecuencia;
    var $fkidarticulo;
    var $fkidliteral;
    var $fkidnumeral;
    var $fkidparagrafo;

    function __construct($id, $codigo, $nombre, $objetivo, $alcance, $formula, $fkidtipoindicador, $fkidunidadmedicion, $meta,
    $fkidsentido, $fkidfrecuencia, $fkidarticulo, $fkidliteral, $fkidnumeral, $fkidparagrafo)
    {
        $this->id = $id;
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->objetivo = $objetivo;
        $this->alcance = $alcance;
        $this->formula = $formula;
        $this->fkidtipoindicador = $fkidtipoindicador;
        $this->fkidunidadmedicion = $fkidunidadmedicion;
        $this->meta = $meta;
        $this->fkidsentido = $fkidsentido;
        $this->fkidfrecuencia = $fkidfrecuencia;
        $this->fkidarticulo = $fkidarticulo;
        $this->fkidliteral = $fkidliteral;
        $this->fkidnumeral = $fkidnumeral;
        $this->fkidparagrafo = $fkidparagrafo;
    }

    function setId($id){
        $this->id = $id;
    }
    function getId(){
        return $this->id;
    }

        function setCodigo($codigo){
            $this->codigo = $codigo;
        }
        function getCodigo(){
            return $this->codigo;
        }
    
    function setNombre($nombre){
        $this->nombre = $nombre;
    }
    function getNombre(){
        return $this->nombre;
    }

        function setObjetivo($objetivo){
            $this->objetivo = $objetivo;
        }
        function getObjetivo(){
            return $this->objetivo;
        }

    function setAlcance($alcance){
        $this->alcance = $alcance;
    }
    //all getter and setter methods
    function getAlcance(){
        return $this->alcance;
    }

        function setFormula($formula){
            $this->formula = $formula;
        }
        function getFormula(){
            return $this->formula;
        }

    function setFkIdTipoIndicador($fkidtipoindicador){
        $this->fkidtipoindicador = $fkidtipoindicador;
    }
    function getFkIdTipoIndicador(){
        return $this->fkidtipoindicador;
    }

        function setFkIdUnidadMedicion($fkidunidadmedicion){
            $this->fkidunidadmedicion = $fkidunidadmedicion;
        }
        function getFkIdUnidadMedicion(){
            return $this->fkidunidadmedicion;
        }

    function setMeta($meta){
        $this->meta = $meta;
    }
    function getMeta(){
        return $this->meta;
    }

        function setFkIdSentido($fkidsentido){
            $this->fkidsentido = $fkidsentido;
        }
        function getFkIdSentido(){
            return $this->fkidsentido;
        }

    function setFkIdFrecuencia($fkidfrecuencia){
        $this->fkidfrecuencia = $fkidfrecuencia;
    }
    function getFkIdFrecuencia(){
        return $this->fkidfrecuencia;
    }

        function setFkIdArticulo($fkidarticulo){
            $this->fkidarticulo = $fkidarticulo;
        }
        function getFkIdArticulo(){
            return $this->fkidarticulo;
        }

    function setFkIdLiteral($fkidliteral){
        $this->fkidliteral = $fkidliteral;
    }
    function getFkIdLiteral(){
        return $this->fkidliteral;
    }

        function setFkIdNumeral($fkidnumeral){
            $this->fkidnumeral = $fkidnumeral;
        }
        function getFkIdNumeral(){
            return $this->fkidnumeral;
        }

    function setFkIdParagrafo($fkidparagrafo){
        $this->fkidparagrafo = $fkidparagrafo;
    }
    function getFkIdParagrafo(){
        return $this->fkidparagrafo;
    }
}
?>