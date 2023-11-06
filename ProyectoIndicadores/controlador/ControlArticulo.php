<?php 


class ControlArticulo{

var $objArticulo;


function __construct($objArticulo){
    $this->objArticulo = $objArticulo;
}

function listar(){
    $comandoSql = "SELECT * FROM articulo";
    $objControlConexion = new ControlConexion();
    $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
    $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
    if (mysqli_num_rows($recordSet) > 0) {
        $arregloArticulo = array();
        $i = 0;
        while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
            $objArticulo = new Articulo("","","","","");
            $objArticulo->setId($row['id']);
            $objArticulo->setNombre($row['nombre']);
            $objArticulo->setDescripcion($row['descripcion']);
            $objArticulo->setFkidseccion($row['fkidseccion']);
            $objArticulo->setFkidsubseccion($row['fkidsubseccion']);
            $arregloArticulo[$i] = $objArticulo;
            $i++;
}
    }
    $objControlConexion->cerrarBd();
    return $arregloArticulo;
}

function ConsultarNombrePorId($id){

    $comandoSql = "SELECT nombre FROM articulo WHERE id = '$id'";
    $objControlConexion = new ControlConexion();
    $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
    $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
    if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){
        $nombre = $row['nombre'];
    }
    $objControlConexion->cerrarBd();
    return $nombre;
}

}

?>