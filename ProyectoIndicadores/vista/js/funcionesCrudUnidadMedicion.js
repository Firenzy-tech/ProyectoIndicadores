//V1 campos ID y DESCRIPCION cob Identity en ID

$(document).ready(function()
{
	$("#campoIdModal").css("display", "block");
	$("#campoNombreModal").css("display", "block");
	$(".crudFuncionesModal").css("opacity","1");
	$(".crudModal").css("display","block");

	$("#btnConsultar").css("visibility", "visible");
	//
	$("#btnGuardar").css("visibility", "hidden");
	$("#btnModificar").css("visibility", "hidden");
	$("#btnBorrar").css("visibility", "hidden");

	
	$("#aGuardar").click(function(){
		$("#campoIdModal").css("display", "none");
		$("#campoNombreModal").css("display", "block");
		$("#tituloFuncionModal").text("Añadir");
		$("#txtDescripcion").removeAttr("disabled");
		$("#txtDescripcion").val("");
		//
		$("#btnGuardar").css("visibility", "visible");
		//
		$("#btnConsultar").css("visibility", "hidden");
		$("#btnModificar").css("visibility", "hidden");
		$("#btnBorrar").css("visibility", "hidden");
	});
	  
	$("#aConsultar").click(function(){
		$("#campoIdModal").css("display", "block");
		$("#campoNombreModal").css("display", "none");
		$("#tituloFuncionModal").text("Consultar");
		$("#txtId").val("");
		//
		$("#btnConsultar").css("visibility", "visible");
		//
		$("#btnGuardar").css("visibility", "hidden");
		$("#btnModificar").css("visibility", "hidden");
		$("#btnBorrar").css("visibility", "hidden");
	});

	$("#aModificar").click(function(){
		$("#campoIdModal").css("display", "block");
		$("#campoNombreModal").css("display", "block");
		$("#tituloFuncionModal").text("Modificar");
		$("#txtDescripcion").removeAttr("disabled");
		$("#txtId").val("");
		$("#txtDescripcion").val("");
		//
		$("#btnModificar").css("visibility", "visible");
		//
		$("#btnGuardar").css("visibility", "hidden");
		$("#btnConsultar").css("visibility", "hidden");
		$("#btnBorrar").css("visibility", "hidden");
	});

	$("#aBorrar").click(function(){
		$("#campoIdModal").css("display", "block");
		$("#campoNombreModal").css("display", "none");
		$("#tituloFuncionModal").text("Borrar");
		$("#txtId").val("");
		//
		$("#btnBorrar").css("visibility", "visible");
		//
		$("#btnGuardar").css("visibility", "hidden");
		$("#btnConsultar").css("visibility", "hidden");
		$("#btnModificar").css("visibility", "hidden");
	});

});