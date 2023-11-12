<?php

class ControlLogin
{

    function __construct()
    {
    }

    function ValidarUsuario($email, $contrasena)
    {
        $msg = "ok";
        $validar = false;
        $comandoSql = "SELECT * FROM usuario WHERE email='$email' AND contrasena='$contrasena'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);

        try {
            if (mysqli_num_rows($recordSet) > 0) {
                $validar = true;
            } else {
                $validar = false;
            }
            $objControlConexion->cerrarBd();
        } catch (Exception $objExcetion) {
            $msg = $objExcetion->getMessage();
        }

        return $validar;
    }
}

?>
