<?php
    class ControlUnidadmedicion{
        
	   var $objUnidadmedicion;

        function __construct($objUnidadmedicion){
            $this->objUnidadmedicion = $objUnidadmedicion;
        }

        function guardar(){
            $id = $this->objUnidadmedicion->getId(); 
            $des = $this->objUnidadmedicion->getDescripcion();
                
            $comandoSql = "INSERT INTO unidadmedicion(id,descripcion) VALUES ('$id', '$des')";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }
        
        function consultar(){
            $id= $this->objUnidadmedicion->getId(); 
        
            $comandoSql = "SELECT * FROM unidadmedicion WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                $this->objUnidadmedicion->setDescripcion($row['descripcion']);
            }
            $objControlConexion->cerrarBd();
            return $this->objUnidadmedicion;
        }

        function modificar(){
            $id = $this->objUnidadmedicion->getId(); 
            $des = $this->objUnidadmedicion->getDescripcion();
            
            $comandoSql = "UPDATE unidadmedicion SET descripcion='$des' WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function borrar(){
            $id= $this->objUnidadmedicion->getId(); 
            $comandoSql = "DELETE FROM unidadmedicion WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function listar(){
            $comandoSql = "SELECT * FROM unidadmedicion";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if (mysqli_num_rows($recordSet) > 0) {
                $arregloUnidadmedicion = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objUnidadmedicion = new Unidadmedicion("","");
                    $objUnidadmedicion->setId($row['id']);
                    $objUnidadmedicion->setDescripcion($row['descripcion']);
                    $arregloUnidadmedicion[$i] = $objUnidadmedicion;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloUnidadmedicion;
        }

        function consultarDescripcionUnidadDeMedicionPorId($id){
            $comandoSql = "SELECT descripcion FROM unidadmedicion WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            $descripcion = "";
            if ($row = $recordSet->fetch_array(MYSQLI_BOTH)) {
                $descripcion = $row['descripcion'];
                
            }
            $objControlConexion->cerrarBd();
            return $descripcion;
        }

        


    }
?>