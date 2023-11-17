<?php
	
	session_start();

// Verificar si el email en la sesión está vacío
if (empty($_SESSION['email'])) {
	// El email en la sesión está vacío, redireccionar al formulario de inicio de sesión o a otra página de inicio
	header('Location: ErrorInicioSesion.php');
	exit();
}
	
	
	include '../controlador/configBd.php';
	include '../controlador/ControlConexion.php';
	include '../controlador/ControlSeccion.php';
	include '../modelo/Seccion.php';
	$boton = "";
	$id = "";
	$nom = "";
	$objControlSeccion = new ControlSeccion(null);
	$arregloSeccion = $objControlSeccion->listar();
	//var_dump($arregloSeccion);
	if (isset($_POST['bt'])) $boton = $_POST['bt'];//toma del arreglo post el value del bt	
	if (isset($_POST['txtId'])) $id = $_POST['txtId'];
	if (isset($_POST['txtNombre'])) $nom = $_POST['txtNombre'];
	switch ($boton) {
		case 'Guardar':
			$objSeccion = new Seccion($id, $nom);
			$objControlSeccion = new ControlSeccion($objSeccion);
			$objControlSeccion->guardar();
			header('Location: vistaSeccion.php');
			break;
		case 'Consultar':
			$objSeccion = new Seccion($id, "");
			$objControlSeccion = new ControlSeccion($objSeccion);
			$objSeccion = $objControlSeccion->consultar();
			$nom = $objSeccion->getNombre();
			break;
		case 'Modificar':
			$objSeccion = new Seccion($id, $nom);
			$objControlSeccion = new ControlSeccion($objSeccion);
			$objControlSeccion->modificar();
			header('Location: vistaSeccion.php');
			break;
		case 'Borrar':
			$objSeccion = new Seccion($id, "");
			$objControlSeccion = new ControlSeccion($objSeccion);
			$objControlSeccion->borrar();
			header('Location: vistaSeccion.php');
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
<title>Seccion</title>
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
						<h2>Gestión <b>Sección</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#crudModal" class="btn btn-primary" data-toggle="modal"><i class="material-icons">&#xE84E;</i> <span>Gestión Sección</span></a>
						
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
						<th>Nombre</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
					for($i = 0; $i < count($arregloSeccion); $i++){
					?>
						<tr>
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td>
							<td><?php echo $arregloSeccion[$i]->getId();?></td>
							<td><?php echo $arregloSeccion[$i]->getNombre();?></td>
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
			<form action="vistaSeccion.php" method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Sección</h4>
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
						<label>Id sección</label>
						<input type="text" id="txtId" name="txtId" class="form-control" value="<?php echo $id ?>" required>
					</div>
					<div class="form-group" id="campoNombreModal">
						<label>Nombre sección</label>
						<input type="text" id="txtNombre" name="txtNombre" class="form-control" value="<?php echo $nom ?>" disabled>
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
<script src="./js/funcionesCrudSinIdentity.js"></script>

</body>
</html>