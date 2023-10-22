<?php
    class ControlRepresenvisual{
        
	   var $objRepresenvisual;

        function __construct($objRepresenvisual){
            $this->objRepresenvisual = $objRepresenvisual;
        }

        function validarIngreso(){
                $msg = "ok";
                $validar = false;
                $id = $this->objRepresenvisual->getId(); 
                $nom = $this->objRepresenvisual->getNombre();
                $comandoSql = "SELECT * FROM tblUsuario WHERE nomUsuario='$usu' AND contrasena='$nom'";
                $objControlConexion = new ControlConexion();
                $objControlConexion->abrirBd($GLOBALS['serv'], GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
                $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
                try
                {
                    if (mysqli_num_rows($recordSet) > 0) 
                    {
                        $validar = true;
                    }
                    $objControlConexion->cerrarBd();
                }
                catch (Exception $objExcetion)
                {
                    $msg = $objExcetion->getMessage();
                } 
                return $validar;
        }

        function consultarIndicadorPorRepresen($codId){
            $msg = "ok";
            $listadoIndicadorDelRepresen = [];
            $comandoSQL = "SELECT fkindicador FROM represenvisualporindicador WHERE fkidrepresenvisual='$codId'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSQL);
            try
            {
                if (mysqli_num_rows($recordSet) > 0)
                {
                    $i = 0;
                    while ($row = $recordSet->fetch_array(MYSQLI_BOTH))
                    {
                        $listadoIndicadorDelRepresen[$i] = $row[0];
                        $i++;
                    }
                    $objControlConexion->cerrarBd();
                }
            }
            catch (Exception $objExcetion)
            {
                $msg = $objExcetion->getMessage();
            }
            return $listadoIndicadorDelRepresen;
        }

        function guardar(){
            $id = $this->objRepresenvisual->getId(); 
            $nom = $this->objRepresenvisual->getNombre();
                
            $comandoSql = "INSERT INTO represenvisual(id,nombre) VALUES ('$id', '$nom')";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }
        
        function consultar(){
            $id= $this->objRepresenvisual->getId(); 
        
            $comandoSql = "SELECT * FROM represenvisual WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                $this->objRepresenvisual->setNombre($row['nombre']);
            }
            $objControlConexion->cerrarBd();
            return $this->objRepresenvisual;
        }

        function modificar(){
            $id = $this->objRepresenvisual->getId(); 
            $nom = $this->objRepresenvisual->getNombre();
            
            $comandoSql = "UPDATE represenvisual SET nombre='$nom' WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function borrar(){
            $id= $this->objRepresenvisual->getId(); 
            $comandoSql = "DELETE FROM represenvisual WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function listar(){
            $comandoSql = "SELECT * FROM represenvisual";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if (mysqli_num_rows($recordSet) > 0) {
                $arregloRepresenvisual = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objRepresenvisual = new Represenvisual("","");
                    $objRepresenvisual->setId($row['id']);
                    $objRepresenvisual->setNombre($row['nombre']);
                    $arregloRepresenvisual[$i] = $objRepresenvisual;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloRepresenvisual;
        }
    }
?>