<?php
class ControlIndicador{
    var $objIndicador;

    function __construct($objIndicador){
        $this->objIndicador = $objIndicador;
    }

    function guardar(){
        $id = $this->objIndicador->getId(); 
        $cod = $this->objIndicador->getCodigo();
        $nom = $this->objIndicador->getNombre();
        $objt = $this->objIndicador->getObjetivo();
        $alc = $this->objIndicador->getAlcance();
        $for = $this->objIndicador->getFormula();
        $met = $this->objIndicador->getMeta();
        $fkidtipoindicador = $this->objIndicador->getFkIdTipoIndicador();
        $fkidunidadmedicion = $this->objIndicador->getFkIdUnidadMedicion();
        $fkidsentido = $this->objIndicador->getFkIdSentido();
        $fkidfrecuencia = $this->objIndicador->getFkIdFrecuencia();
        $fkidarticulo = $this->objIndicador->getFkIdArticulo();
        $fkidliteral = $this->objIndicador->getFkIdLiteral();
        $fkidnumeral = $this->objIndicador->getFkIdNumeral();
        $fkidparagrafo = $this->objIndicador->getFkIdParagrafo();
            
        //Por el momento se estan completando los datos quemados
        $comandoSql = "INSERT INTO indicador(id,codigo,nombre,objetivo,alcance,formula,fkidtipoindicador,fkidunidadmedicion,meta,fkidsentido,fkidfrecuencia,fkidarticulo,fkidliteral,fkidnumeral,fkidparagrafo) VALUES ('$id', '$cod', '$nom', '$objt', '$alc', '$for', $fkidtipoindicador, 
        $fkidunidadmedicion, '$met', '$fkidsentido', '$fkidfrecuencia', '$fkidarticulo', '$fkidliteral', '$fkidnumeral', '$fkidparagrafo' )";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }
    
    function consultar(){
        $id= $this->objIndicador->getId(); 
    
        $comandoSql = "SELECT * FROM indicador WHERE id = '$id'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){
            $this->objIndicador->setCodigo($row['codigo']);
            $this->objIndicador->setNombre($row['nombre']);
            $this->objIndicador->setObjetivo($row['objetivo']);
            $this->objIndicador->setAlcance($row['alcance']);
            $this->objIndicador->setFormula($row['formula']);
            $this->objIndicador->setMeta($row['meta']);
            $this->objIndicador->setFkIdTipoIndicador($row['fkidtipoindicador']);
            $this->objIndicador->setFkIdUnidadMedicion($row['fkidunidadmedicion']);
            $this->objIndicador->setFkIdSentido($row['fkidsentido']);
            $this->objIndicador->setFkIdFrecuencia($row['fkidfrecuencia']);
            $this->objIndicador->setFkIdArticulo($row['fkidarticulo']);
            $this->objIndicador->setFkIdLiteral($row['fkidliteral']);
            $this->objIndicador->setFkIdNumeral($row['fkidnumeral']);
            $this->objIndicador->setFkIdParagrafo($row['fkidparagrafo']);
            
        }
        $objControlConexion->cerrarBd();
        return $this->objIndicador;
    }

    function modificar(){
        $id = $this->objIndicador->getId(); 
        $cod = $this->objIndicador->getCodigo();
        $nom = $this->objIndicador->getNombre();
        $objt = $this->objIndicador->getObjetivo();
        $alc = $this->objIndicador->getAlcance();
        $for = $this->objIndicador->getFormula();
        $met = $this->objIndicador->getMeta();
        $fkidtipoindicador = $this->objIndicador->getFkIdTipoIndicador();
        $fkidunidadmedicion = $this->objIndicador->getFkIdUnidadMedicion();
        $fkidsentido = $this->objIndicador->getFkIdSentido();
        $fkidfrecuencia = $this->objIndicador->getFkIdFrecuencia();
        $fkidarticulo = $this->objIndicador->getFkIdArticulo();
        $fkidliteral = $this->objIndicador->getFkIdLiteral();
        $fkidnumeral = $this->objIndicador->getFkIdNumeral();
        $fkidparagrafo = $this->objIndicador->getFkIdParagrafo();
        
        $comandoSql = "UPDATE indicador SET codigo='$cod', 
        nombre='$nom', objetivo='$objt', alcance='$alc', 
        formula='$for', fkidtipoindicador='$fkidtipoindicador', 
        fkidunidadmedicion='$fkidunidadmedicion', meta='$met', 
        fkidsentido='$fkidsentido', fkidfrecuencia='$fkidfrecuencia', 
        fkidarticulo='$fkidarticulo', fkidliteral='$fkidliteral', 
        fkidnumeral='$fkidnumeral', fkidparagrafo='$fkidparagrafo' WHERE id = '$id'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function borrar(){
        $id= $this->objIndicador->getId(); 
        $comandoSql = "DELETE FROM indicador WHERE id = '$id';";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function listar(){
        $comandoSql = "SELECT * FROM indicador";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        if (mysqli_num_rows($recordSet) > 0) {
            $arregloIndicador = array();
            $i = 0;
            while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                $objIndicador = new Indicador("","","","","","","","","","","","","","","","");
                $objIndicador->setId($row['id']);
                $objIndicador->setCodigo($row['codigo']);
                $objIndicador->setNombre($row['nombre']);
                $objIndicador->setObjetivo($row['objetivo']);
                $objIndicador->setAlcance($row['alcance']);
                $objIndicador->setFormula($row['formula']);
                $objIndicador->setFkIdTipoIndicador($row['fkidtipoindicador']);
                $objIndicador->setFkIdUnidadMedicion($row['fkidunidadmedicion']);
                $objIndicador->setMeta($row['meta']);
                $objIndicador->setFkIdSentido($row['fkidsentido']);
                $objIndicador->setFkIdFrecuencia($row['fkidfrecuencia']);
                $objIndicador->setFkIdArticulo($row['fkidarticulo']);
                $objIndicador->setFkIdLiteral($row['fkidliteral']);
                $objIndicador->setFkIdNumeral($row['fkidnumeral']);
                $objIndicador->setFkIdParagrafo($row['fkidparagrafo']);
                $arregloIndicador[$i] = $objIndicador;
                $i++;
            }
        }
        $objControlConexion->cerrarBd();
        return $arregloIndicador;
    }


}
?>