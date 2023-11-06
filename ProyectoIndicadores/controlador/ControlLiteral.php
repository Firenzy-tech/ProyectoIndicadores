<?php
class ControlLiteral{

var $objLiteral;

function __construct($objLiteral){
    $this->objLiteral = $objLiteral;



}

function listar(){

$comandoSql = "SELECT * FROM Literal";
$objControlConexion = new ControlConexion();
$objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
$recordSet = $objControlConexion->ejecutarSelect($comandoSql);
if (mysqli_num_rows($recordSet) > 0) {
    $arregloLiteral = array();
    $i = 0;
    while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
        $objLiteral = new Literal("","","");
        $objLiteral->setId($row['id']);
        $objLiteral->setDescripcion($row['descripcion']);
        $objLiteral->setFkidarticulo($row['fkidarticulo']);
        $arregloLiteral[$i] = $objLiteral;
        $i++;
    }
}
$objControlConexion->cerrarBd();
return $arregloLiteral;

}



}
?>
