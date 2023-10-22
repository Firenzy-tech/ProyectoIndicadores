<?php
    class ControlRepresenvisualPorIndicador{
        var $objRepresenvisualPorIndicador;

        function __construct($objRepresenvisualPorIndicador){
            $this->objRepresenvisualPorIndicador = $objRepresenvisualPorIndicador;
        }

        function guardar(){
            $fkIdIndicador = $this->objRepresenvisualPorIndicador->getFkIdIndicador(); 
            $fkIdRepresenVisual = $this->objRepresenvisualPorIndicador->getFkIdRepresenvisual();
            $comando = "insert into represenvisualporindicador(FkIdIndicador,FkIdRepresenvisual) values($fkIdIndicador,$fkIdRepresenVisual)"; 
            $objControlConexion = new ControlConexion(); 
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']); //Se invoca el método abrirBd.
            $objControlConexion->ejecutarComandoSql($comando); 
            $objControlConexion->cerrarBd();
        }

        function listarIndicadoresDelRepresen($fkRepresenvisual){
            $comandoSql = "SELECT represenvisualporindicador.FkIdIndicador,indicador.nombre 
            FROM represenvisualporindicador INNER JOIN INDICADOR ON represenvisualporindicador.FkIdIndicador = indicador.id
            WHERE FkIdRepresenvisual = $fkRepresenvisual";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if (mysqli_num_rows($recordSet) > 0) {
                $arregloIndicadores = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objIndicador = new Rol(0,"");
                    $objIndicador->setId($row['id']);
                    $objIndicador->setNombre($row['nombre']);
                    $arregloRoles[$i] = $objIndicador;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloIndicadores;
        }
    }
?>