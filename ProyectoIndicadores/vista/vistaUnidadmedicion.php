<?php
	include '../controlador/configBd.php';
	include '../controlador/ControlConexion.php';
	include '../controlador/ControlUnidadmedicion.php';
	include '../modelo/Unidadmedicion.php';
	$boton = "";
	$id = "";
	$des = "";
	$objControlUnidadmedicion = new ControlUnidadmedicion(null);
	$arregloUnidadmedicion = $objControlUnidadmedicion->listar();
	//var_dump($arregloUnidadmedicion);
	if (isset($_POST['bt'])) $boton = $_POST['bt'];//toma del arreglo post el value del bt	
	if (isset($_POST['txtId'])) $id = $_POST['txtId'];
	if (isset($_POST['txtDescripcion'])) $des = $_POST['txtDescripcion'];
	switch ($boton) {
		case 'Guardar':
			$objUnidadmedicion = new Unidadmedicion($id, $des);
			$objControlUnidadmedicion = new ControlUnidadmedicion($objUnidadmedicion);
			$objControlUnidadmedicion->guardar();
			header('Location: vistaUnidadmedicion.php');
			break;
		case 'Consultar':
			$objUnidadmedicion = new Unidadmedicion($id, "");
			$objControlUnidadmedicion = new ControlUnidadmedicion($objUnidadmedicion);
			$objUnidadmedicion = $objControlUnidadmedicion->consultar();
			$des = $objUnidadmedicion->getDescripcion();
			break;
		case 'Modificar':
			$objUnidadmedicion = new Unidadmedicion($id, $des);
			$objControlUnidadmedicion = new ControlUnidadmedicion($objUnidadmedicion);
			$objControlUnidadmedicion->modificar();
			header('Location: vistaUnidadmedicion.php');
			break;
		case 'Borrar':
			$objUnidadmedicion = new Unidadmedicion($id, "");
			$objControlUnidadmedicion = new ControlUnidadmedicion($objUnidadmedicion);
			$objControlUnidadmedicion->borrar();
			header('Location: vistaUnidadmedicion.php');
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
<title>Unidad medición</title>

</head>
<body>

<?php
include 'Header.php';
?>

<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Gestión <b>Unidad medición</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#crudModal" class="btn btn-primary" data-toggle="modal"><i class="material-icons">&#xE84E;</i> <span>Gestión Unidad medición</span></a>
						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Id</th>
						<th>Descripción</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
					for($i = 0; $i < count($arregloUnidadmedicion); $i++){
					?>
						<tr>
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td>
							<td><?php echo $arregloUnidadmedicion[$i]->getId();?></td>
							<td><?php echo $arregloUnidadmedicion[$i]->getDescripcion();?></td>
							<td>
								<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
			<div class="clearfix">
				<div class="hint-text">Mostrando <b>5</b> de <b>25</b> entradas</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Anterior</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Siguiente</a></li>
				</ul>
			</div>
		</div>
	</div>        
</div>
<!-- crud Modal HTML -->
<div id="crudModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="vistaUnidadmedicion.php" method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Unidadmedicion</h4>
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
					<div>
					<br /><br />
					<h5 id="tituloFuncionModal">Consultar</h5>
					<hr >				
					<div class="form-group" id="campoIdModal">
						<label>Id</label>
						<input type="text" id="txtId" name="txtId" class="form-control" value="<?php echo $id ?>">
					</div>
					<div class="form-group" id="campoNombreModal">
						<label>Descripción</label>
						<input type="text" id="txtDescripcion" name="txtDescripcion" class="form-control" value="<?php echo $des ?>" disabled>
					</div>
					<div class="form-group crudModal">
						<input type="submit" id="btnConsultar" name="bt" class="btn btn-info" value="Consultar">
						<input type="submit" id="btnGuardar" name="bt" class="btn btn-success" value="Guardar">
						<input type="submit" id="btnModificar" name="bt" class="btn btn-warning" value="Modificar">
						<input type="submit" id="btnBorrar" name="bt" class="btn btn-danger" value="Borrar">
						<input type="reset" id="btnLimpiar" name="limpiar" class="btn btn-light" value="Limpiar campos">
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
<script src="../vista/js/funcionesCrudUnidadMedicion.js"></script>

</body>
</html>