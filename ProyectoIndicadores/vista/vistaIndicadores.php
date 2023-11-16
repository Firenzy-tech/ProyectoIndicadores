<?php
session_start();


// Verificar si el email en la sesión está vacío
if (empty($_SESSION['email'])) {
	// El email en la sesión está vacío, redireccionar al formulario de inicio de sesión o a otra página de inicio
	header('Location: ErrorInicioSesion.php');
	exit();
}

// El resto del código de tu página aquí...
?>

<?php
include '../controlador/configBd.php';
include '../controlador/ControlConexion.php';
include '../controlador/ControlIndicador.php';

include '../controlador/ControlTipoindicador.php';
include '../controlador/ControlUnidadmedicion.php';
include '../controlador/ControlSentido.php';

include '../modelo/Indicador.php';
include '../modelo/TipoIndicador.php';
include '../modelo/Unidadmedicion.php';
include '../modelo/Sentido.php';
include '../modelo/Articulo.php';
include '../modelo/Literal.php';
include '../modelo/Numeral.php';
include '../modelo/Paragrafo.php';

include '../controlador/ControlRepresenvisual.php';
include '../controlador/ControlRepresenvisualPorIndicador.php';
include '../modelo/Represenvisual.php';
include '../modelo/RepresenvisualPorIndicador.php';

include '../controlador/ControlArticulo.php';
include '../controlador/ControlLiteral.php';
include '../controlador/ControlNumeral.php';
include '../controlador/ControlParagrafo.php';


$botonVista = "";
$boton = "";
$id = "";
$cod = "";
$nom = "";
$objt = "";
$alc = "";
$for = "";
$fkidtpindic = "";
$fkidunimedi = "";
$met = "";
$fkidsenti = "";
$fkidfrecu = "";
$fkidartic = "";
$fkidliter = "";
$fkidnumer = "";
$fkidparag = "";
$listbox1 = array();

$objControlIndicador = new ControlIndicador(null);
$arregloIndicadores = $objControlIndicador->listar();

$objControlTipoInd = new ControlTipoindicador(null);
$arregloTipoindicador = $objControlTipoInd->listar();

$objControlUniMed = new ControlUnidadmedicion(null);
$arregloUnidadmedicion = $objControlUniMed->listar();

$objControlSentido = new ControlSentido(null);
$arregloSentido = $objControlSentido->listar();

$objControlSentido = new ControlSentido(null);
$arregloSentido = $objControlSentido->listar();

$objControlArt = new ControlArticulo(null);
$arregloArticulo = $objControlArt->listar();

$objControlLit = new ControlLiteral(null);
$arregloLiteral = $objControlLit->listar();

$objControlNum = new ControlNumeral(null);
$arregloNumeral = $objControlNum->listar();

$objControlPar = new ControlParagrafo(null);
$arregloParagrafo = $objControlPar->listar();

$objTipoIndicador = new ControlTipoindicador(null);




//var_dump($arregloIndicadores);
if (isset($_POST['botonVista'])) $botonVista = $_POST['botonVista']; //toma del arreglo post el value del bt
if (isset($_POST['bt'])) $boton = $_POST['bt']; //toma del arreglo post el value del bt	
if (isset($_POST['txtId'])) $id = $_POST['txtId'];
if (isset($_POST['txtCodigo'])) $cod = $_POST['txtCodigo'];
if (isset($_POST['txtNombre'])) $nom = $_POST['txtNombre'];
if (isset($_POST['txtObjetivo'])) $objt = $_POST['txtObjetivo'];
if (isset($_POST['txtAlcance'])) $alc = $_POST['txtAlcance'];
if (isset($_POST['txtFormula'])) $for = $_POST['txtFormula'];
if (isset($_POST['txtFrecuencia'])) $fkidfrecu = $_POST['txtFrecuencia'];

if (isset($_POST['txtTipoIndicador'])) {
	$tipoIndicadores = explode(";", $_POST['txtTipoIndicador']);
	$fkidtpindic = $tipoIndicadores[0];
}

if (isset($_POST['txtUnidadMedicion'])) {
	$unidades = explode(";", $_POST['txtUnidadMedicion']);
	$fkidunimedi = $unidades[0];
}

if (isset($_POST['txtSentido'])) {
	$sentidos = explode(";", $_POST['txtSentido']);
	$fkidsenti = $sentidos[0];
} 

if (isset($_POST['txtArticulo'])) {
	$articulos = explode(";", $_POST['txtArticulo']);
	$fkidartic = $articulos[0];
}
if (isset($_POST['txtLiteral'])) {
	$literales = explode(";", $_POST['txtLiteral']);
	$fkidliter = $literales[0];
}

if (isset($_POST['txtNumeral'])) {
	$numerales = explode(";", $_POST['txtNumeral']);
	$fkidnumer = $numerales[0];
}

if (isset($_POST['txtParagrafo'])) {
	$paragrafos = explode(";", $_POST['txtParagrafo']);
	$fkidparag = $paragrafos[0];
	// $fkidartic = $paragrafos[2];
}

if (isset($_POST['txtMeta'])) $met = $_POST['txtMeta'];
if (isset($_POST['listbox1'])) $listbox1 = $_POST['listbox1'];
switch ($boton) {
	case 'Guardar':
		$objIndicadores = new Indicador(
		$id=null,$cod, $nom, $objt, $alc, $for, 
		$fkidtpindic, $fkidunimedi, $met, 
		$fkidsenti,$fkidfrecu, $fkidartic, $fkidliter, 
		$fkidnumer, $fkidparag );
		$objControlIndicador = new ControlIndicador($objIndicadores);
		$objControlIndicador->guardar();
		header('Location: vistaIndicadores.php');
		break;
	case 'Consultar':
		$objIndicadores = new Indicador($id, $cod, $nom, $objt, $alc, $for, $fkidtpindic, 
		$fkidunimedi, $met, $fkidsenti, $fkidartic, $fkidliter, $fkidnumer, $fkidparag, $fkidfrecu);

		$objControlIndicador = new ControlIndicador($objIndicadores);
		$objIndicadores = $objControlIndicador->consultar();
		$cod = $objIndicadores->getCodigo();
		$nom = $objIndicadores->getNombre();
		$objt = $objIndicadores->getObjetivo();
		$alc = $objIndicadores->getAlcance();
		$for = $objIndicadores->getFormula();
		$fkidtpindic = $objIndicadores->getFkIdTipoIndicador();
		$fkidunimedi = $objIndicadores->getFkIdUnidadMedicion();
		$met = $objIndicadores->getMeta();
		$fkidsenti = $objIndicadores->getFkIdSentido();
		$fkidfrecu = $objIndicadores->getFkIdFrecuencia();
		$fkidartic = $objIndicadores->getFkIdArticulo();
		$fkidliter = $objIndicadores->getFkIdLiteral();
		$fkidnumer = $objIndicadores->getFkIdNumeral();
		$fkidparag = $objIndicadores->getFkIdParagrafo();
		
		break;
	case 'Modificar':
		$objIndicadores = new Indicador($id,$cod, $nom, $objt, $alc, $for, 
		$fkidtpindic, $fkidunimedi, $met, 
		$fkidsenti,$fkidfrecu, $fkidartic, $fkidliter, 
		$fkidnumer, $fkidparag);
		$objControlIndicador = new ControlIndicador($objIndicadores);
		$objControlIndicador->modificar();
		header('Location: vistaIndicadores.php');
		break;
	case 'Borrar':
		$objIndicadores = new Indicador($id, "", "", "", "", "", "", "", "", "", "", "", "", "", "");
		$objControlIndicador = new ControlIndicador($objIndicadores);
		$objControlIndicador->borrar();
		header('Location: vistaIndicadores.php');
		break;

	default:
		# code...
		break;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Indicadores</title>
</head>

<body>

	<?php
	include 'Header.php';
	?>
	<br />
	<div>
				<a href="#crudModal" class="btn btn-primary btn-lg btn-block" data-toggle="modal"><i class="material-icons">&#xE84E;</i> <span>Gestión Indicadores</span></a>
			</div>
	<div>
		<?php
		// Define cuántos registros se mostrarán por página
		$registrosPorPagina = 5;

		// Obtiene el número total de registros
		$totalRegistros = count($arregloIndicadores);

		// Obtiene el número total de páginas
		$totalPaginas = ceil($totalRegistros / $registrosPorPagina);

		// Obtiene la página actual
		if (isset($_GET['pagina'])) {
			$paginaActual = $_GET['pagina'];
		} else {
			$paginaActual = 1;
		}

		// Calcula el índice del primer registro de la página actual
		$indicePrimerRegistro = ($paginaActual - 1) * $registrosPorPagina;

		// Obtiene los registros de la página actual
		$registrosPaginaActual = array_slice($arregloIndicadores, $indicePrimerRegistro, $registrosPorPagina);
		?>

		<div class="table-wrapper table-responsive" style="overflow-x: scroll; overflow-y: scroll;">
			<table class="table table-striped">
				<thead>
					<tr>
						
							<th scope="col">Id</th>
							<th scope="col" style="min-width: 150px;">Código</th>
							<th scope="col" style="min-width: 150px;">Nombre</th>
							<th scope="col" style="min-width: 150px;">Objetivo</th>
							<th scope="col" style="min-width: 150px;">Alcance</th>
							<th scope="col" style="min-width: 150px;">Formula</th>
							<th scope="col" style="min-width: 150px;">Tipo Indicador</th>
							<th scope="col" style="min-width: 150px;">Unidad Medición</th>
							<th scope="col" style="min-width: 150px;">Meta</th>
							<th scope="col" style="min-width: 150px;">Sentido</th>
							<th scope="col" style="min-width: 150px;">Id Frecuencia</th>
							<th scope="col" style="min-width: 150px;">Articulo</th>
							<th scope="col" style="min-width: 150px;">Literal</th>
							<th scope="col" style="min-width: 150px;">Id Numeral</th>
							<th scope="col" style="min-width: 150px;">Id Paragrafo</th>
						</tr>
				</thead>
				<tbody>
					<?php
					for ($i = 0; $i < count($registrosPaginaActual); $i++) {
					?>
						<tr>
						
							<td><?php echo $registrosPaginaActual[$i]->getId(); ?></td>
							<td style="min-width: 150px;"><?php echo $registrosPaginaActual[$i]->getCodigo(); ?></td>
							<td style="min-width: 150px;"><?php echo $registrosPaginaActual[$i]->getNombre(); ?></td>
							<td style="min-width: 150px;"><?php echo $registrosPaginaActual[$i]->getObjetivo(); ?></td>
							<td style="min-width: 150px;"><?php echo $registrosPaginaActual[$i]->getAlcance(); ?></td>
							<td style="min-width: 150px;"><?php echo $registrosPaginaActual[$i]->getFormula(); ?></td>
							<td style="min-width: 150px;"><?php echo $mostraNombreTipoIndicaro = $objTipoIndicador->consultarNombrePorId($registrosPaginaActual[$i]->getFkIdTipoIndicador()); ?>
							</td>
							<td style="min-width: 150px;"><?php echo $mostrarUniMedicionDescrip = $objControlUniMed->consultarDescripcionUnidadDeMedicionPorId($registrosPaginaActual[$i]->getFkIdUnidadMedicion()); ?>
							</td>
							<td style="min-width: 150px;"><?php echo $registrosPaginaActual[$i]->getMeta(); ?></td>
							<td style="min-width: 150px;"><?php echo $mostrarNombreSentido = $objControlSentido->ConsultarNombreSentido($registrosPaginaActual[$i]->getFkIdSentido()); ?>
							</td>
							<td style="min-width: 150px;"><?php echo $registrosPaginaActual[$i]->getFkIdFrecuencia(); ?>
							</td>
							<td style="min-width: 150px;"><?php echo $mostrarNombreArticulo = $objControlArt->ConsultarNombrePorId($registrosPaginaActual[$i]->getFkIdArticulo()); ?>
							</td>
							<td style="min-width: 150px;min-height: 150px;"><?php echo $mostrarDescripcionLiteral = $objControlLit->ConsultarDescripcionPorId($registrosPaginaActual[$i]->getFkIdLiteral()); ?>
							</td>
							<td style="min-width: 150px; max-height: 150px;"><?php echo $registrosPaginaActual[$i]->getFkIdNumeral(); ?></td>
							<td style="min-width: 150px;"><?php echo $registrosPaginaActual[$i]->getFkIdParagrafo(); ?></td>
							<td>

							</td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>

		<!-- Paginación -->
		<div class="container text-center">
			<div class="btn-group" role="group" aria-label="Paginación">
				<?php
				// Muestra el botón "Anterior" si no se encuentra en la primera página
				if ($paginaActual > 1) {
				?>
					<a href="?pagina=<?php echo $paginaActual - 1; ?>" class="btn btn-primary">&laquo; Anterior</a>
				<?php
				}

				// Muestra los botones de las páginas
				for ($i = 1; $i <= $totalPaginas; $i++) {
					if ($i == $paginaActual) {
				?>
						<a href="?pagina=<?php echo $i; ?>" class="btn btn-primary active"><?php echo $i; ?></a>
					<?php
					} else {
					?>
						<a href="?pagina=<?php echo $i; ?>" class="btn btn-primary"><?php echo $i; ?></a>
				<?php
					}
				}

				// Muestra el botón "Siguiente" si no se encuentra en la última página
				if ($paginaActual < $totalPaginas) {
				?>
					<a href="?pagina=<?php echo $paginaActual + 1; ?>" class="btn btn-primary">Siguiente &raquo;</a>
				<?php
				}
				?>
			</div>
		</div>
		<!-- crud Modal HTML -->
		<div id="crudModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="vistaIndicadores.php" method="post">
						<div class="modal-header">
							<h4 class="modal-title">Indicadores</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">
							<div id="funcionesCrudModal">
								<h4>Seleccione la función que desea realizar</h4>
								<br>
								<div class="crudFuncionesModal">
									<b id="aConsultar" name="botonVista" class="btn btn-secondary" value ="aConsultar">Consultar</b>
									<b id="aGuardar" neme="botonVista" class="btn btn-secondary" value = "aGuardar" >Añadir</b>
									<b id="aModificar" name="botonVista" class="btn btn-secondary" value = "aModificar" >Modificar</b>
									<b id="aBorrar" name="botonVista" class="btn btn-secondary" value = "aBorrar">Borrar</b>
								</div>
							</div>

							<div class="container">
								<!-- Nav tabs -->
								<br />
								<br />
						
								<!-- Tab panes -->
								<div class="tab-content">
									<div id="home" class="container tab-pane active"><br>
										<div class="row form-group">
											<h5 id="tituloFuncionModal">Consultar</h5>
											<hr>
											<div class="row">
												<div class="form-group col-6" id="campoIdModal">
													<label>Id Indicador</label>
													<input type="text" id="txtId" name="txtId" class="form-control" value="<?php echo $id ?>">
												</div>
												<div class="form-group col-6" id="campoCodigoModal">
													<label>Código Indicador</label>
													<input type="text" id="txtCodigo" name="txtCodigo" class="form-control" value="<?php echo $cod ?>" disabled>
												</div>
												<div class="form-group col-6" id="campoNombreModal">
													<label>Nombre Indicador</label>
													<input type="text" id="txtNombre" name="txtNombre" class="form-control" value="<?php echo $nom ?>" disabled>
												</div>
												<div class="form-group col-6" id="campoObjetivoModal">
													<label>Objetivo Indicador</label>
													<input type="text" id="txtObjetivo" name="txtObjetivo" class="form-control" value="<?php echo $objt ?>" disabled>
												</div>
												<div class="form-group col-6" id="campoAlcanceModal">
													<label>Alcance Indicador</label>
													<input type="text" id="txtAlcance" name="txtAlcance" class="form-control" value="<?php echo $alc ?>" disabled>
												</div>
												<div class="form-group col-6" id="campoFormulaModal">
													<label>Formula Indicador</label>
													<input type="text" id="txtFormula" name="txtFormula" class="form-control" value="<?php echo $for ?>" disabled>
												</div>
												<div class="form-group col-6" id="campoTipoFrecuencia">
													<label>Frecuencia</label>
													<input type="text" id="txtFrecuencia" name="txtFrecuencia" class="form-control" value="<?php echo $met ?>" disabled>
												</div>
													

												<div class="form-group col-6" id="campoTipoIndicadorModal">
													<label>Tipo indicador</label>
													<select class="form-control" id="txtTipoIndicador" name="txtTipoIndicador" disabled>
													<option value="">Seleccione un Tipo Indicador</option>
														<?php for ($i = 0; $i < count($arregloTipoindicador); $i++) { ?>
															<option value="<?php echo $arregloTipoindicador[$i]->getId() . ";" . $arregloTipoindicador[$i]->getNombre(); ?>">
																<?php echo  $arregloTipoindicador[$i]->getNombre(); ?>
															</option>
														<?php } ?>
													</select>
												</div>

												<div class="form-group col-6" id="campoUnidadMedicionModal">
													<label>Unidad Medición</label>
													<select class="form-control" id="txtUnidadMedicion" name="txtUnidadMedicion" disabled>
													<!-- <option value="">Seleccione unidad de Medición</option> -->
													<?php if($boton!="Consultar") { ?>
    													<option value="">Seleccione unidad de Medición</option>
													<?php } ?>
														<?php for ($i = 0; $i < count($arregloUnidadmedicion); $i++) { ?>
															<option value="<?php echo $arregloUnidadmedicion[$i]->getId() . ";" . $arregloUnidadmedicion[$i]->getDescripcion(); ?>">
																<?php if($boton=="Consultar"){echo $fkidtpindic;}else{echo $arregloUnidadmedicion[$i]->getDescripcion();} ?>
																<?php echo $arregloUnidadmedicion[$i]->getDescripcion(); ?>
															</option>
														<?php } ?>
													</select>
												</div>

												<div class="form-group col-6" id="campoMetaModal">
													<label>Meta Indicador</label>
													<input type="text" id="txtMeta" name="txtMeta" class="form-control" value="<?php echo $met ?>" disabled>
												</div>

												<div class="form-group col-6" id="campoSentidoModal">
													<label>Sentido</label>
													<select class="form-control" id="txtSentido" name="txtSentido" disabled>
													<option value="">Seleccione un Sentido</option>
														<?php for ($i = 0; $i < count($arregloSentido); $i++) { ?>
															<option value="<?php echo $arregloSentido[$i]->getId() . ";" . $arregloSentido[$i]->getNombre(); ?>">
																<?php echo  $arregloSentido[$i]->getNombre(); ?>
															</option>
														<?php } ?>
													</select>
												</div>

												<!-- Desde aqui hay que corregir -->
											
												<div class="form-group col-6" id="campoArticuloModal">
													<label>Articulo</label>
													<select class="form-control" id="txtArticulo" name="txtArticulo" disabled>
													<option value="">Seleccione un Artículo</option>
														<?php for ($i = 0; $i < count($arregloArticulo); $i++) { ?>
															<option value="<?php echo $arregloArticulo[$i]->getId() . ";" . $arregloArticulo[$i]->getNombre(); ?>">
																<?php echo  $arregloArticulo[$i]->getNombre(); ?>
															</option>
														<?php } ?>
													</select>
												</div>
												<div> 
												<div class="form-group col-6" id="campoLiteralModal">
													<label>Literal</label>
													<select class="form-control" id="txtLiteral" name="txtLiteral" disabled>
													<option value="">Seleccione un Literal</option>
														<?php for ($i = 0; $i < count($arregloLiteral); $i++) { ?>
															<option value="<?php echo $arregloLiteral[$i]->getId() . ";" . $arregloLiteral[$i]->getDescripcion(); ?>">
																<?php echo  $arregloLiteral[$i]->getDescripcion(); ?>
															</option>
														<?php } ?>
													</select>
												</div>
												<div> 
												<div class="form-group col-6" id="campoNumeralModal">
													<label>Numeral</label>
													<select class="form-control" id="txtNumeral" name="txtNumeral" disabled>
													<option value="">Seleccione un Numeral</option>
														<?php for ($i = 0; $i < count($arregloNumeral); $i++) { ?>
															<option value="<?php echo $arregloNumeral[$i]->getId() . ";" . $arregloNumeral[$i]->getDescripcion(); ?>">
																<?php echo  $arregloNumeral[$i]->getDescripcion(); ?>
															</option>
														<?php } ?>
													</select>
												</div>
												<div> 

												<div class="form-group col-6" id="campoParagrafoModal">
													<label>Paragrafo</label>
													<select class="form-control" id="txtParagrafo" name="txtParagrafo" disabled>
														<option value="">Seleccione un Parrafo</option>
														<?php for ($i = 0; $i < count($arregloParagrafo); $i++) { ?>
															<option value="<?php echo $arregloParagrafo[$i]->getId() . ";" . $arregloParagrafo[$i]->getDescripcion().";". $arregloParagrafo[$i]->getFkidarticulo(); ?>">
																<?php echo  $arregloParagrafo[$i]->getDescripcion(); ?>
															</option>
														<?php } ?>
													</select>
												</div>
												

												<div class="form-group crudModal">
													<input type="submit" id="btnConsultar" name="bt" class="btn btn-info" value="Consultar" >
													<input type="submit" id="btnGuardar" name="bt" class="btn btn-success" value="Guardar">
													<input type="submit" id="btnModificar" name="bt" class="btn btn-warning" value="Modificar">
													<input type="submit" id="btnBorrar" name="bt" class="btn btn-danger" value="Borrar">
													<input type="submit" id="btnLimpiar" name="limpiar" class="btn btn-light" value="Limpiar campos">
													<input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		<script src="../vista/js/funcionesChecks.js"></script>
		<script src="./js/funcionesCrudIndicadores.js"></script>
		<script src="../vista/js/funcionesItems.js"></script>

</body>

</html>