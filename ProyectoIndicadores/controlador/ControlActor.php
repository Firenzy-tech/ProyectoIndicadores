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

function consultar(){
    $msg = "ok";
    $id = $this->objActor->getId();
    $fkidtipoactor = $this->objActor->getFkidtipoactor();
    $nombre = $this->objActor->getNombre();
    $comandoSql = "SELECT * FROM tblactor WHERE id = '$id'";
    $objControlConexion = new ControlConexion();
    $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
    $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
    if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){
        $this->objActor->setFkidtipoactor($row['fkidtipoactor']);
        $this->objActor->setNombre($row['nombre']);
    }
    $objControlConexion->cerrarBd();
    return $msg;



}

?>