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
            
        //Por el momento se estan completando los datos quemados
        $comandoSql = "INSERT INTO indicador(id,codigo,nombre,objetivo,alcance,formula,fkidtipoindicador,fkidunidadmedicion,meta,fkidsentido,fkidfrecuencia,fkidarticulo,fkidliteral,fkidnumeral,fkidparagrafo) VALUES ('$id', '$cod', '$nom', '$objt', '$alc', '$for', '2', '14', '$met', '2', '', '2.5.3.2.1.1', 'a2.5.3.2.1.3', '1b2.5.3.2.3.1.7', '12.5.3.2.1.3')";
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
        
        $comandoSql = "UPDATE indicador SET codigo='$cod', nombre='$nom',  objetivo='$objt',  alcance='$alc',  formula='$for',  meta='$met' WHERE id = '$id'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function borrar(){
        $id= $this->objIndicador->getId(); 
        $comandoSql = "DELETE FROM indicador WHERE id = '$id'";
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
                $objIndicador->setMeta($row['meta']);
                $arregloIndicador[$i] = $objIndicador;
                $i++;
            }
        }
        $objControlConexion->cerrarBd();
        return $arregloIndicador;
    }

/*
    function guardar(){
        $nom = $this->objIndicador->getNombre(); //Asigna a la variable nom el nombre que está dentro del objeto.
        $comando = "insert into rol(nombre) values('$nom')"; //Cadena de caracteres donde se construye el comando Sql.
        $objControlConexion = new ControlConexion(); //Se instancia la clase controlConexion.
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']); //Se invoca el método abrirBd.
        $objControlConexion->ejecutarComandoSql($comando); //Se invoca el método ejecutarComandoSql.
        $objControlConexion->cerrarBd();
    }
    
*/
}
?>