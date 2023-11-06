<?php
class ControlParagrafo{
var $objparagrafo;

function __construct($objparagrafo){
    $this->objparagrafo = $objparagrafo;
}

function listar(){
    $comandoSql = "SELECT * FROM paragrafo";
    $objControlConexion = new ControlConexion();
    $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
    $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
    if (mysqli_num_rows($recordSet) > 0) {
        $arregloParagrafo = array();
        $i = 0;
        while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
            $objParagrafo = new Paragrafo("","","");
            $objParagrafo->setId($row['id']);
            $objParagrafo->setDescripcion($row['descripcion']);
            $objParagrafo->setFkidarticulo($row['fkidarticulo']);
            $arregloParagrafo[$i] = $objParagrafo;
            $i++;
        }
    }
    $objControlConexion->cerrarBd();
    return $arregloParagrafo;
}
}

?>