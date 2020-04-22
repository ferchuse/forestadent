$(document).ready(function(){
	// $('#form_reportes').submit(enviarFormulario);
	$('#form_remision').submit(guardarRemision);
	$('#form_filtros').submit(function(event){
		event.preventDefault();
		listarRegistros();
	});
	$('#form_filtros').submit();
	
});


function nuevaRemisión(event){
	
	$('#modal_remision').modal('show');
	
}


function listarRegistros(){
	console.log("listarRegistros");
	
	
	
	$.ajax({
		url: 'lista_ventas.php',
		method: 'GET',
		data: $("#form_filtros").serialize()
		
		}).done(function(respuesta){
		$("#tabla_registros").html(respuesta);
		
		$('.btn_borrar').click(confirmaCancelar);
		$('.btn_nota').click(nuevaRemisión);
		$('.estatus_ventas').change(cambiarEstatus);
		$('.convertir_a_salida').click(convertirASalida);
		
		}).always(function (){
		
		
	});
}
function convertirASalida(event){
	console.log("convertirASalida");
	
	var id_registro = $(this).data('id_registro');
	
	
	$.ajax({
		url: 'convertir_a_salida.php',
		method: 'GET',
		data: {id_ventas: id_registro
			
		}
		}).done(function(respuesta){
		if(respuesta.estatus == "success"){
			window.location.href="../inventarios/nuevo_movimiento.php?tipo_movimiento=SALIDA&folio="+ respuesta.folio;
			alertify.success(respuesta.mensaje);
		}
		else{
			alertify.error(respuesta.mensaje);
			
		}
		}).always(function (){
		
		
	});
}

function cambiarEstatus(event){
	console.log("cambiarEstatus");
	
	var id_registro = $(this).data('id_registro');
	var estatus_ventas = $(this).val();
	
	
	$.ajax({
		url: '../funciones/fila_update.php',
		method: 'POST',
		data: {
			tabla: "ventas",
			id_campo: "id_ventas",
			id_valor: id_registro,
			valores: [
				{"name": "estatus_ventas", "value": estatus_ventas}
			]
			
		}
		}).done(function(respuesta){
		if(respuesta.estatus == "success"){
			
			alertify.success(respuesta.mensaje);
		}
		else{
			alertify.error(respuesta.mensaje);
			
		}
		}).always(function (){
		
		
	});
}

function guardarRemision(event){
	event.preventDefault();
	
	var boton = $(this).find(':submit');
	var icono = boton.find('.fa');
	var formulario = $(this).serialize();
	
	boton.prop("disabled", true);
	
	$.ajax({
		url: '../ventas/guardar_remision.php',
		method: 'POST',
		data: formulario
		}).done(function(respuesta){
		
		}).always(function (){
		
		boton.prop("disabled", false);
	});
}


function confirmaCancelar(event){
	console.log("confirmaCancelar()");
	let boton = $(this);
	let icono = boton.find(".fas");
	var id_registro = $(this).data("id_registro");
	var fila = boton.closest('tr');
	
	alertify.prompt()
  .setting({
    'reverseButtons': true,
		'labels' :{ok:"SI", cancel:'NO'},
		'title': "Cancelar Venta" ,
    'message': "Motivo de Cancelación" ,
    'onok':cancelarRegistro,
    'oncancel': function(){
			boton.prop('disabled', false);
			
		}
	}).show();
	
	
	function cancelarRegistro(evt, motivo){
		if(motivo == ''){
			console.log("Escribe un motivo");
			alertify.error("Escribe un motivo");
			return false;
			
		}
		
		boton.prop("disabled", true);
		icono.toggleClass("fa-times fa-spinner fa-spin");
		
		
		return $.ajax({
			url: "consultas/cancelar.php",
			method:"POST",
			dataType:"JSON",
			data:{
				id_registro : id_registro,
				
				motivo : motivo
			}
			}).done(function (respuesta){
			if(respuesta.result == "success"){
				alertify.success("Cancelado");
				listarRegistros();
			}
			else{
				alertify.error(respuesta.result);
				
			}
			
			}).always(function(){
			boton.prop("disabled", false);
			icono.toggleClass("fa-times fa-spinner fa-spin");
			
		});
	}
}


