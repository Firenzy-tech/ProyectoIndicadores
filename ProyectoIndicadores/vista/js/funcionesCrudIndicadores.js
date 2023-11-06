//V1 campos ID y NOMBRE con Identity en ID

$(document).ready(function()
{
	$("#campoIdModal").css("display", "block");
	$("#campoCodigoModal").css("display", "block");
	$("#campoNombreModal").css("display", "block");
	$("#campoObjetivoModal").css("display", "block");
	$("#campoAlcanceModal").css("display", "block");
	$("#campoFormulaModal").css("display", "block");
	$("#campoTipoIndicadorModal").css("display", "block");
	$("#campoUnidadMedicionModal").css("display", "block");
	$("#campoMetaModal").css("display", "block");
	$("#campoSentidoModal").css("display", "block");
	$("#campoArticuloModal").css("display", "block");
	

	$(".crudFuncionesModal").css("opacity","1");
	$(".crudModal").css("display","block");

	$("#btnConsultar").css("visibility", "visible");
	//
	$("#btnGuardar").css("visibility", "hidden");
	$("#btnModificar").css("visibility", "hidden");
	$("#btnBorrar").css("visibility", "hidden");

	
	$("#aGuardar").click(function(){
		$("#campoIdModal").css("display", "none");
		$("#tituloFuncionModal").text("Añadir");
		
		$("#campoCodigoModal").css("display", "block");
		$("#campoNombreModal").css("display", "block");
		$("#campoObjetivoModal").css("display", "block");
		$("#campoAlcanceModal").css("display", "block");
		$("#campoFormulaModal").css("display", "block");
		$("#campoTipoIndicadorModal").css("display", "block");
		$("#campoUnidadMedicionModal").css("display", "block");
		$("#campoMetaModal").css("display", "block");
		$("#campoUnidadMedicionModal").css("display", "block");
		$("#campoSentidoModal").css("display", "block");
		$("#campoArticuloModal").css("display", "block");
		$("#campoLiteralModal").css("display", "block");
		$("#campoNumeralModal").css("display", "block");
		$("#campoParagrafoModal").css("display", "block");
		$("#campoTipoFrecuencia").css("display", "block");


		$("#txtCodigo").removeAttr("disabled");
		$("#txtNombre").removeAttr("disabled");
		$("#txtObjetivo").removeAttr("disabled");
		$("#txtAlcance").removeAttr("disabled");
		$("#txtFormula").removeAttr("disabled");
		$("#txtTipoIndicador").removeAttr("disabled");
		$("#txtUnidadMedicion").removeAttr("disabled");
		$("#txtMeta").removeAttr("disabled");
		$("#txtSentido").removeAttr("disabled");
		$("#txtArticulo").removeAttr("disabled");
		$("#txtLiteral").removeAttr("disabled");
		$("#txtNumeral").removeAttr("disabled");
		$("#txtParagrafo").removeAttr("disabled");
		$("#txtFrecuencia").removeAttr("disabled");


		$("#txtCodigo").val("");
		$("#txtNombre").val("");
		$("#txtObjetivo").val("");
		$("#txtAlcance").val("");
		$("#txtFormula").val("");
		$("#txtMeta").val("");
		$("#txtFrecuencia").val("");
		//
		$("#btnGuardar").css("visibility", "visible");
		//
		$("#btnConsultar").css("visibility", "hidden");
		$("#btnModificar").css("visibility", "hidden");
		$("#btnBorrar").css("visibility", "hidden");
	});
	  
	$("#aConsultar").click(function(){
		$("#campoIdModal").css("display", "block");
		$("#campoCodigoModal").css("display", "none");
		$("#campoNombreModal").css("display", "none");
		$("#campoObjetivoModal").css("display", "none");
		$("#campoAlcanceModal").css("display", "none");
		$("#campoFormulaModal").css("display", "none");
		$("#campoTipoIndicadorModal").css("display", "none");
		$("#campoUnidadMedicionModal").css("display", "none");
		$("#campoMetaModal").css("display", "none");
		$("#campoUnidadMedicionModal").css("display", "none");
		$("#campoSentidoModal").css("display", "none");
		$("#campoArticuloModal").css("display", "none");
		$("#campoLiteralModal").css("display", "none");
		$("#campoNumeralModal").css("display", "none");
		$("#campoParagrafoModal").css("display", "none");
		$("#campoTipoFrecuencia").css("display", "none");


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
		$("#campoCodigoModal").css("display", "block");
		$("#campoNombreModal").css("display", "block");
		$("#campoObjetivoModal").css("display", "block");
		$("#campoAlcanceModal").css("display", "block");
		$("#campoFormulaModal").css("display", "block");
		$("#campoTipoIndicadorModal").css("display", "block");
		$("#campoUnidadMedicionModal").css("display", "block");
		$("#campoMetaModal").css("display", "block");
		$("#campoUnidadMedicionModal").css("display", "block");
		$("#campoSentidoModal").css("display", "block");
		$("#campoArticuloModal").css("display", "block");
		$("#campoLiteralModal").css("display", "block");
		$("#campoNumeralModal").css("display", "block");
		$("#campoParagrafoModal").css("display", "block");
		$("#campoTipoFrecuencia").css("display", "block");

		
		$("#tituloFuncionModal").text("Modificar");

		$("#txtCodigo").removeAttr("disabled");
		$("#txtNombre").removeAttr("disabled");
		$("#txtObjetivo").removeAttr("disabled");
		$("#txtAlcance").removeAttr("disabled");
		$("#txtFormula").removeAttr("disabled");
		$("#txtTipoIndicador").removeAttr("disabled");
		$("#txtUnidadMedicion").removeAttr("disabled");
		$("#txtMeta").removeAttr("disabled");
		$("#txtSentido").removeAttr("disabled");
		$("#txtArticulo").removeAttr("disabled");
		$("#txtLiteral").removeAttr("disabled");
		$("#txtNumeral").removeAttr("disabled");
		$("#txtParagrafo").removeAttr("disabled");
		$("#txtFrecuencia").removeAttr("disabled");
		
		$("#txtId").val("");
		$("#txtNombre").val("");
		//
		$("#btnModificar").css("visibility", "visible");
		//
		$("#btnGuardar").css("visibility", "hidden");
		$("#btnConsultar").css("visibility", "hidden");
		$("#btnBorrar").css("visibility", "hidden");
	});

	$("#aBorrar").click(function(){
		$("#campoIdModal").css("display", "block");
		$("#campoCodigoModal").css("display", "none");
		$("#campoNombreModal").css("display", "none");
		$("#campoObjetivoModal").css("display", "none");
		$("#campoAlcanceModal").css("display", "none");
		$("#campoFormulaModal").css("display", "none");
		$("#campoTipoIndicadorModal").css("display", "none");
		$("#campoUnidadMedicionModal").css("display", "none");
		$("#campoMetaModal").css("display", "none");
		$("#campoUnidadMedicionModal").css("display", "none");
		$("#campoSentidoModal").css("display", "none");
		$("#campoArticuloModal").css("display", "none");
		$("#campoLiteralModal").css("display", "none");
		$("#campoNumeralModal").css("display", "none");
		$("#campoParagrafoModal").css("display", "none");
		$("#campoTipoFrecuencia").css("display", "none");

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