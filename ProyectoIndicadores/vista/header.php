	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<link rel="stylesheet" href="./css/estilosHeader.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="../vista/css/estilos.css">
  <link rel="stylesheet" href="../vista/css/cssTablas.css">

<header class="main-header">
  <style>
    .btn-nav {
      background-color: #007BFF;
    }
    .navigation {
      background-color: #007BFF;
    }
    
  </style>
  <script>
  function cerrarSesion() {
        
   
        window.location.href = 'cerrar_sesion.php';
    }
  </script>
  <label for="btn-nav" class="btn-nav"><i class="fas fa-bars"></i></label>
  <input type="checkbox" id="btn-nav">
  <button onclick="cerrarSesion()" class="btn btn-danger" style="float: right; width: 170px; height: 57px;">Cerrar Sesión</button>

  <center>
    <!--<h1>Proyecto indicadores</h1>-->
    <h1 style="padding:10px; background-color: #007BFF">PROYECTO INDICADORES</h1>

  </center>
 
  
  <nav>
    <ul class="navigation">

      <li><a href="">Inicio</a></li>
      <li><a href="vistaUsuarios.php">Usuario</a></li>
      <li><a href="vistaRol.php">Rol</a></li>
      <li><a href="vistaIndicadores.php">Indicadores</a></li>
      <li><a href="vistaFuentes.php">Fuente</a></li>
      <li><a href="vistaRepresenvisual.php">Representación visual</a></li>
      <li><a href="vistaSeccion.php">Sección</a></li>
      <li><a href="vistaSentido.php">Sentido</a></li>
      <li><a href="vistaSubseccion.php">Subsección</a></li>
      <li><a href="vistaTipoactor.php">Tipo actor</a></li>
      <li><a href="vistaTipoindicador.php">Tipo indicador</a></li>
      <li><a href="vistaUnidadmedicion.php">Unidad medicion</a></li>
      
      <!-- <li><a href="vistaActor.php">Actor</a></li>
      <li><a href="vistaArticulo.php">Articulo</a></li>
      <li><a href="vistaLiteral.php">Literal</a></li>
      <li><a href="vistaNumeral.php">Numeral</a></li>
      <li><a href="vistaResultadoPorIndicador.php">Resultado por indicador</a></li>
      <li><a href="vistaVariable.php">Variable</a></li>
      <li><a href="vistaParrafo.php">Parrafo</a></li> -->

      


    </ul>
  </nav>

</header>
