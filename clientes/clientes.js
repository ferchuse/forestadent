
var boton, icono;


function onLoad() {
	console.log("onLoad");
	$("#btn_nuevo").click(function nuevoCliente() {
		console.log("nuevoCliente");
		$('#form_clientes')[0].reset();
		
		$("#modal_clientes").modal("show");
		
	});
	
	
	$("#form_filtros").submit(listarClientes);
	
	$("#form_filtros").submit();
	
	
	$(".buscar").keyup(buscarFila);
	$(".buscar").change(buscarFila);
	
	
	$('#form_clientes').submit(guardarCliente);
	
}
function listarClientes(event) {
	event.preventDefault();
	boton = $(this).find(":submit");
	icono = boton.find("i");
	
	boton.prop("disabled", true);
	icono.toggleClass("fa-search fa-spinner fa-spin");
	
	
	$.ajax({
		"url": "tabla_clientes.php",
		"data": $("#form_filtros").serialize()
	}).done(alCargar);
}


function alCargar(respuesta) {
	$("#lista_registros").html(respuesta);
	
	$('.buscar').prop("disabled", false);
	
	$('.btn_editar').click(editarCliente);
	$('.btn_historial').click(cargarHistorial);
	$('.sort').click(ordenarTabla);
	
	$('.btn_cargos').click( function () {
		$('#modal_cargos').modal('show');
		$('#cargos_id_clientes').val($(this).data('id_registro'));
		$('#saldo_anterior').val($(this).data('saldo'));
		$('#tipo').val("cargos");
		$("#titulo").text("Cargo");
		
	});
	
	$('.btn_abonos').click(function () {
		$('#modal_cargos').modal('show');
		$('#cargos_id_clientes').val($(this).data('id_registro'));
		$('#saldo_anterior').val($(this).data('saldo'));
		$('#tipo').val("abonos");
		$('#titulo').text("Abono");
		
	});
	
	
	
	contarRegistros("tabla_registros");
	
	boton.prop("disabled", false);
	icono.toggleClass("fa-search fa-spinner fa-spin");
	
}

function ordenarTabla() {
	$(this).toggleClass("asc desc");
	console.log("ordenarTabla");
	
	if(	$("#order").val() ==  "ASC"){
		$("#order").val("DESC");
	}
	else{
		$("#order").val("ASC");
	}
	
	$("#sort").val($(this).data("columna"));
	$('#form_filtros').submit();
}

function contarRegistros(id_tabla) {
	console.log("contarRegistros", $("#"+id_tabla+" tbody tr:visible"));
	
	$("#contar_registros").text($("#"+id_tabla+" tbody tr:visible").length);
}


$(document).ready(onLoad);

function cargarHistorial() {
	
	let boton = $(this);
	let icono = boton.find(".fas");
	let id_clientes = boton.data("id_registro");
	let nombre = boton.data("nombre");
	
	boton.prop("disabled", true);
	icono.toggleClass("fa-history fa-spinner fa-spin");
	
	$.ajax({
		url: "modal_historial.php",
		data: {
			"id_clientes": id_clientes
		}
		
		}).done(function (respuesta) {
		
		$("#historial").html(respuesta);
		$("#modal_historial").modal("show");
		$(".btn_borrar_transaccion").click(borrarTransaccion);
		$("#nombre_historial").text(nombre);
		
		
		}).fail(function (xht, error, errnum) {
		
		alertify.error("Error", errnum);
		}).always(function () {
		boton.prop("disabled", false);
		icono.toggleClass("fa-history fa-spinner fa-spin");
		
	});
	
	
}


function borrarTransaccion() {
	console.log("borrarTransaccion");
	let boton = $(this);
	let icono = boton.find(".fas");
	let id_transaccion = boton.data("id_registro");
	let tipo = boton.data("tipo");
	let tabla = tipo == "CARGO" ? "cargos" : "abonos";
	let id_campo = tipo == "CARGO" ? "id_cargos" : "id_abonos";
	
	boton.prop("disabled", true);
	icono.toggleClass("fa-trash fa-spinner fa-spin");
	
	$.ajax({
		url: "../funciones/fila_delete.php",
		method: "POST",
		dataType: "JSON",
		data: {
			"tabla": tabla,
			"id_campo": id_campo,
			id_valor: id_transaccion
			
		}
		
		}).done(function (respuesta) {
		console.log("respuesta", respuesta);
		
		boton.closest("tr").remove();
		
		}).fail(function (xht, error, errnum) {
		
		alertify.error("Error", errnum);
		}).always(function () {
		boton.prop("disabled", false);
		icono.toggleClass("fa-trash fa-spinner fa-spin");
		
	});
	
	
}
function editarCliente() {
	
	let boton = $(this);
	let icono = boton.find(".fas");
	let id_clientes = boton.data("id_registro");
	
	boton.prop("disabled", true);
	icono.toggleClass("fa-edit fa-spinner fa-spin");
	
	$.ajax({
		url: "../funciones/fila_select.php",
		
		dataType: "JSON",
		data: {
			tabla: "clientes",
			id_campo: "id_clientes",
			id_valor: id_clientes
			
		}
		
		}).done(function (respuesta) {
		console.log("respuesta", respuesta);
		if (respuesta.encontrado == 1) {
			$.each(respuesta.data, function (name, value) {
				$("#form_clientes #" + name).val(value);
			});
			
			$("#modal_clientes").modal("show");
			
		}
		}).fail(function (xht, error, errnum) {
		
		alertify.error("Error", errnum);
		}).always(function () {
		boton.prop("disabled", false);
		icono.toggleClass("fa-edit fa-spinner fa-spin");
		
	});
	
	
}


function guardarCliente() {
	
	event.preventDefault();
	
	let boton = $(this).find(":submit");
	let icono = boton.find(".fas");
	
	boton.prop("disabled", true);
	icono.toggleClass("fa-save fa-spinner fa-spin");
	
	$.ajax({
		url: "guardar_clientes.php",
		method: "POST",
		dataType: "JSON",
		data: $("#form_clientes").serialize()
		
		}).done(function (respuesta) {
		console.log("respuesta", respuesta);
		if (respuesta.status == "success") {
			
			alertify.success(respuesta.mensaje);
			$("#modal_clientes").modal("hide");
			listarClientes();
		}
		}).fail(function (xht, error, errnum) {
		
		alertify.error("Error", errnum);
		}).always(function () {
		boton.prop("disabled", false);
		icono.toggleClass("fa-save fa-spinner fa-spin");
		
	});
	
}

function buscarFila(event) {
	var value = $(this).val().toLowerCase();
	console.log("buscando", value);
	$("#lista_registros tbody tr").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	});
}	