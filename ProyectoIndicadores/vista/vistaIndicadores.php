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

include '../controlador/ControlRepresenvisual.php';
include '../controlador/ControlRepresenvisualPorIndicador.php';
include '../modelo/Represenvisual.php';
include '../modelo/RepresenvisualPorIndicador.php';

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
//var_dump($arregloIndicadores);
if (isset($_POST['bt'])) $boton = $_POST['bt']; //toma del arreglo post el value del bt	
if (isset($_POST['txtId'])) $id = $_POST['txtId'];
if (isset($_POST['txtCodigo'])) $cod = $_POST['txtCodigo'];
if (isset($_POST['txtNombre'])) $nom = $_POST['txtNombre'];
if (isset($_POST['txtObjetivo'])) $objt = $_POST['txtObjetivo'];
if (isset($_POST['txtAlcance'])) $alc = $_POST['txtAlcance'];
if (isset($_POST['txtFormula'])) $for = $_POST['txtFormula'];

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
if (isset($_POST['txtMeta'])) $met = $_POST['txtMeta'];
if (isset($_POST['listbox1'])) $listbox1 = $_POST['listbox1'];
switch ($boton) {
	case 'Guardar':
		$objIndicadores = new Indicador(
		$id=null,$cod, $nom, $objt, $alc, $for, 
		$fkidtpindic, $fkidunimedi, $met, 
		$fkidsenti, $fkidartic, $fkidliter, 
		$fkidnumer, $fkidparag, $fkidfrecu);
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
		$objIndicadores = new Indicador($id, $cod, $nom, $objt, $alc, $for, "", "", $met, "", "", "", "", "", "");
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
		<div class="table-wrapper">
			<div class="table-title">
				<h1>Gestión indicador</h1>
			</div>
			<div>
				<a href="#crudModal" class="btn btn-primary btn-lg btn-block" data-toggle="modal"><i class="material-icons">&#xE84E;</i> <span>Gestión Indicadores</span></a>
			</div>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Seleccionar</th>
					<th scope="col">Id</th>
					<th scope="col">Código</th>
					<th scope="col">Nombre</th>
					<th scope="col">Objetivo</th>
					<th scope="col">Alcance</th>
					<th scope="col">Formula</th>
					<th scope="col">Id Tipo Indicador</th>
					<th scope="col">Id Unidad Medición</th>
					<th scope="col">Meta</th>
					<th scope="col">Id Sentido</th>
					<th scope="col">Id Frecuencia</th>
					<th scope="col">Id Articulo</th>
					<th scope="col">Id Literal</th>
					<th scope="col">Id Numeral</th>
					<th scope="col">Id Paragrafo</th>
				</tr>
			</thead>
			<tbody>
				<?php
				for ($i = 0; $i < count($arregloIndicadores); $i++) {
				?>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td><?php echo $arregloIndicadores[$i]->getId(); ?></td>
						<td><?php echo $arregloIndicadores[$i]->getCodigo(); ?></td>
						<td><?php echo $arregloIndicadores[$i]->getNombre(); ?></td>
						<td><?php echo $arregloIndicadores[$i]->getObjetivo(); ?></td>
						<td><?php echo $arregloIndicadores[$i]->getAlcance(); ?></td>
						<td><?php echo $arregloIndicadores[$i]->getFormula(); ?></td>
						<td><?php echo $arregloIndicadores[$i]->getFkIdTipoIndicador(); ?></td>
						<td><?php echo $arregloIndicadores[$i]->getFkIdUnidadMedicion(); ?></td>
						<td><?php echo $arregloIndicadores[$i]->getMeta(); ?></td>
						<td><?php echo $arregloIndicadores[$i]->getFkIdSentido(); ?></td>
						<td><?php echo $arregloIndicadores[$i]->getFkIdFrecuencia(); ?></td>
						<td><?php echo $arregloIndicadores[$i]->getFkIdArticulo(); ?></td>
						<td><?php echo $arregloIndicadores[$i]->getFkIdLiteral(); ?></td>
						<td><?php echo $arregloIndicadores[$i]->getFkIdNumeral(); ?></td>
						<td><?php echo $arregloIndicadores[$i]->getFkIdParagrafo(); ?></td>
						<td>
							
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
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
									<b id="aConsultar" class="btn btn-secondary">Consultar</b>
									<b id="aGuardar" class="btn btn-secondary">Añadir</b>
									<b id="aModificar" class="btn btn-secondary">Modificar</b>
									<b id="aBorrar" class="btn btn-secondary">Borrar</b>
								</div>
							</div>

							<div class="container">
								<!-- Nav tabs -->
								<br />
								<br />
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#home">Indicador</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#vistaRepresenvisual">Representación Visual</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#menu2">Responsables</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#menu2">Fuentes</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#menu2">Variables</a>
									</li>
								</ul>
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

												<div class="form-group col-6" id="campoTipoIndicadorModal">
													<label>Tipo indicador</label>
													<select class="form-control" id="txtTipoIndicador" name="txtTipoIndicador" disabled>
														<?php for ($i = 0; $i < count($arregloTipoindicador); $i++) { ?>
															<option value="<?php echo $arregloTipoindicador[$i]->getId() . ";" . $arregloTipoindicador[$i]->getNombre(); ?>">
																<?php echo $arregloTipoindicador[$i]->getId() . ";" . $arregloTipoindicador[$i]->getNombre(); ?>
															</option>
														<?php } ?>
													</select>
												</div>

												<div class="form-group col-6" id="campoUnidadMedicionModal">
													<label>Unidad Medición</label>
													<select class="form-control" id="txtUnidadMedicion" name="txtUnidadMedicion" disabled>
														<?php for ($i = 0; $i < count($arregloUnidadmedicion); $i++) { ?>
															<option value="<?php echo $arregloUnidadmedicion[$i]->getId() . ";" . $arregloUnidadmedicion[$i]->getDescripcion(); ?>">
																<?php echo $arregloUnidadmedicion[$i]->getId() . ";" . $arregloUnidadmedicion[$i]->getDescripcion(); ?>
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
														<?php for ($i = 0; $i < count($arregloSentido); $i++) { ?>
															<option value="<?php echo $arregloSentido[$i]->getId() . ";" . $arregloSentido[$i]->getNombre(); ?>">
																<?php echo $arregloSentido[$i]->getId() . ";" . $arregloSentido[$i]->getNombre(); ?>
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
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
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