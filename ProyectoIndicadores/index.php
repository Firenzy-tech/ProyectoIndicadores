<?php
    ob_start();
    

?>
<?php
session_start();
include_once 'controlador/ControlUsuario.php';
include_once 'controlador/ControlConexion.php';
include_once 'controlador/configBd.php';
include_once 'controlador/ControlLogin.php';
$contrasena="";
$email="";
$btninicios="";

if(isset($_POST['email']))$email = $_POST["email"];
if(isset($_POST['contrasena']))$contrasena = $_POST["contrasena"];
if(isset($_POST['btninicios']))$btninicios = $_POST["btninicios"];

   

    if($btninicios == "login"){
        $Objlogin = new ControlLogin();
        $validacionUsuario = $Objlogin->ValidarUsuario($email, $contrasena);


        if($validacionUsuario==true){
            $_SESSION['email']=$validacionUsuario;
            header('Location: ./vista/principal.php');
        }
        else{
            header('Location: vista/ErrorInicioSesion.php');
            exit();
        }
    }
    
    
    

    ?>





<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(to bottom, #3498db, #2980b9); /* Colores azules en el gradiente */
        }

        form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <form method="post">
        <label for="username">Email:</label>
        <input type="text" id="email" name="email" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required>

        <button type="submit" name="btninicios" id="btninicios" value="login" >Iniciar sesión</button>
    </form>

</body>
</html>
<?php
  ob_end_flush();
?>
