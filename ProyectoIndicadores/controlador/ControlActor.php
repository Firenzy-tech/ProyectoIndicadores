<?php 
class ControlActor{

var $objActor;

function __construct($objActor){
    $this->objActor = $objActor;
}

function guardar(){
    $msg = "ok";
    
    $objControlConexion = new ControlConexion();
    $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
    $id = $this->objActor->getId();
    $fkidtipoactor = $this->objActor->getFkidtipoactor();
    $nombre = $this->objActor->getNombre();
    $comandoSql = "INSERT INTO tblactor VALUES ('$id','$fkidtipoactor','$nombre')";
    $objControlConexion->ejecutarComandoSql($comandoSql);
    $objControlConexion->cerrarBd();
    return $msg;

}
}

?>