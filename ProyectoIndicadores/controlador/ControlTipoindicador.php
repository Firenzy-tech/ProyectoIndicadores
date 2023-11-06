<?php
    class ControlTipoindicador{
        
	   var $objTipoindicador;

        function __construct($objTipoindicador){
            $this->objTipoindicador = $objTipoindicador;
        }
/*
        function validarIngreso(){
                $msg = "ok";
                $validar = false;
                $usu = $this->objTipoindicador->getNomUsuario(); 
                $nom = $this->objTipoindicador->getNombre();
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

        function consultarRolesPorUsuario($nomUsu){
            $msg = "ok";
            $listadoRolesDelUsuario = [];
            $comandoSQL = "SELECT fkIdRol FROM tblrol_usuario WHERE fkNomUsuario='$nomUsu'";
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
                        $listadoRolesDelUsuario[$i] = $row[0];
                        $i++;
                    }
                    $objControlConexion->cerrarBd();
                }
            }
            catch (Exception $objExcetion)
            {
                $msg = $objExcetion->getMessage();
            }
            return $listadoRolesDelUsuario;
        }
*/
        function guardar(){
            $id = $this->objTipoindicador->getId(); 
            $nom = $this->objTipoindicador->getNombre();
                
            $comandoSql = "INSERT INTO tipoindicador(id,nombre) VALUES ('$id', '$nom')";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }
        
        function consultar(){
            $id= $this->objTipoindicador->getId(); 
        
            $comandoSql = "SELECT * FROM tipoindicador WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                $this->objTipoindicador->setNombre($row['nombre']);
            }
            $objControlConexion->cerrarBd();
            return $this->objTipoindicador;
        }

        function modificar(){
            $id = $this->objTipoindicador->getId(); 
            $nom = $this->objTipoindicador->getNombre();
            
            $comandoSql = "UPDATE tipoindicador SET nombre='$nom' WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function borrar(){
            $id= $this->objTipoindicador->getId(); 
            $comandoSql = "DELETE FROM tipoindicador WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function listar(){
            $comandoSql = "SELECT * FROM tipoindicador";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if (mysqli_num_rows($recordSet) > 0) {
                $arregloTipoindicador = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objTipoindicador = new Tipoindicador("","");
                    $objTipoindicador->setId($row['id']);
                    $objTipoindicador->setNombre($row['nombre']);
                    $arregloTipoindicador[$i] = $objTipoindicador;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloTipoindicador;
        }

        function consultarNombrePorId($id){
            $comandoSql = "SELECT nombre FROM tipoindicador WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            $nombre = "";
            if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                $nombre = $row['nombre'];
            }
            $objControlConexion->cerrarBd();
            return $nombre;
        }
    }
?>