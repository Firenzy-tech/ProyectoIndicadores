<?php
session_start();

// Destruir la sesión
session_destroy();

// Redirigir al índice u otra página
header('Location: ../index.php');
exit();
?>