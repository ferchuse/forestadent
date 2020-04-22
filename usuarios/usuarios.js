$(document).ready(onLoad)


function onLoad(){
	listarRegistros();
	$("#nuevo").click(function(){
		$("#form_edicion")[0].reset();
		$("#modal_edicion").modal("show")
		
	});
	
	
	$("#form_edicion").submit(guardarRegistro);
	
}

function listarRegistros(){
	
	$.ajax({
		url: 'tabla_usuarios.php',
		method: 'POST',
		dataType: 'HTML',
	})
	.done(
		function(respuesta){
			
			$('#lista_registros').html(respuesta);
			
			
			
			$(".btn_editar").click(cargarRegistro);
			$(".btn_borrar").click(confirmaBorrar);
			
		}
	);
	
}

function cargarRegistro(event){
	console.log("cargarDatos", event);
	let $boton = $(this);
	let $icono = $(this).find(".fas");
	let $id_registro = $(this).data("id_registro");				
	$boton.prop("disabled", true);
	$icono.toggleClass("fa-edit fa-spinner fa-spin");				
	$.ajax({ 
		"url": "../funciones/fila_select.php",
		"dataType": "JSON",
		"data": {
			"tabla": "usuarios",
			"id_campo": "id_usuarios",
			"id_valor": $id_registro						
		}
		}).done( function alTerminar (respuesta){					
		console.log("respuesta", respuesta);
		
		$("#modal_edicion").modal("show")
		$("#id_usuarios").val(respuesta.data.id_usuarios);                        
		$("#nombre_usuarios").val(respuesta.data.nombre_usuarios );              
		$("#permiso_usuarios").val(respuesta.data.permiso_usuarios );              
		
		
		}).always(function(){
		$boton.prop("disabled", false);
		$icono.toggleClass("fa-edit fa-spinner fa-spin"); 
		
	});
}

function guardarRegistro(event){
	console.log("guardarRegistro")
	event.preventDefault()
	let $boton = $(this).find(':submit');
	let $icono = $(this).find(".fas");
	$boton.prop("disabled", true);
	$icono.toggleClass("fa-save fa-spinner fa-spin");
	
	$.ajax({ 
		"url": "guardar.php",
		"dataType": "JSON",
		"method": "POST",
		"data": $("#form_edicion").serializeArray()
		}).done( function alTerminar (respuesta){
		console.log("respuesta", respuesta);
		$("#modal_edicion").modal("hide");
		if(respuesta.status == "success"){
			alertify.success(respuesta.mensaje);
			listarRegistros();
		}
		else{
			alertify.error(respuesta.mensaje);			
			
		}
		
		}).fail(function(xhr, textEstatus, error){
		console.log("textEstatus", textEstatus);
		console.log("error", error);
		
		}).always(function(){
		
		$boton.prop("disabled", false);
		$icono.toggleClass("fa-save fa-spinner fa-spin"); 
	});
	
}		
function confirmaBorrar(event){
	console.log("confirmaBorrar")
	let $boton = $(this);
	let $fila = $(this).closest('tr');
	let $icono = $(this).find(".fas");
	$boton.prop("disabled", true);
	$icono.toggleClass("fa-trash fa-spinner fa-spin");
	
	if(confirm("¿Estás Seguro?")){
		$.ajax({ 
			"url": "../funciones/fila_delete.php",
			"dataType": "JSON",
			"method": "POST",
			"data": {
				"tabla": "usuarios",
				"id_campo": "id_usuarios",
				"id_valor": $boton.data("id_registro")
			}
			}).done( function alTerminar (respuesta){
			console.log("respuesta", respuesta);
			
			$fila.remove();
			}).fail(function(xhr, textEstatus, error){
			console.log("textEstatus", textEstatus);
			console.log("error", error);
			
			}).always(function(){
			
			$boton.prop("disabled", false);
			$icono.toggleClass("fa-trash fa-spinner fa-spin"); 
		});
	}
}			