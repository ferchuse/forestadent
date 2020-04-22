$("#nuevo").click(function(){
	$("#modal_edicion").modal("show")
	
});

$("#form_edicion").submit(guardarRegistro);
$(".btn_editar").click(cargarDatos);
$(".btn_borrar").click(confirmaBorrar);



$('.fileupload').fileupload({
	dataType: 'json',
	done: function (e, data) {
	
		$form_group = $(this).closest(".form-group");
		
		$.each(data.result.files, function (index, file) {
			$form_group.find(".url").val("/atoshka/fileupload/files/"+file.name);
		
			$form_group.find("img").attr("src", "/atoshka/fileupload/files/"+file.name);
			
		});
	},
	progressall: function (e, data) {
		$form_group = $(this).closest(".form-group");
	
		var progress = parseInt(data.loaded / data.total * 100, 10);
		$form_group.find(".progress-bar").css("width" , progress +"%");
		$form_group.find(".progress-bar").html(progress +"%");
	}
});



function cargarDatos(event){
	console.log("event", event);
	let $boton = $(this);
	let $icono = $(this).find(".fas");
	let $id_registro = $(this).data("id_registro");				
	$boton.prop("disabled", true);
	$icono.toggleClass("fa-edit fa-spinner fa-spin");				
	$.ajax({ 
		"url": "../funciones/fila_select.php",
		"dataType": "JSON",
		"data": {
			"tabla": "departamentos",
			"id_campo": "id_departamentos",
			"id_valor": $id_registro						
		}
		}).done( function alTerminar (respuesta){					
		console.log("respuesta", respuesta);
		
		$.each(respuesta.data, function(key, value){
			
			$("#"+key).val(value);
			switch(key){
				case "foto":
				$("#foto_thumb").attr("src", value);
				break;
				
				case "colores":
				$("#colores_thumb").attr("src", value);
				break;
				
				default:
				
				
			}
		})
		
		
		$("#modal_edicion").modal("show")
		
		
		}).fail(function(){
		
		
		}).always(function(){
		$boton.prop("disabled", false);
		$icono.toggleClass("fa-edit fa-spinner fa-spin"); 
		
	})
}

function guardarRegistro(event){
	console.log("guardarRegistro")
	event.preventDefault()
	let $boton = $(this).find(':submit');
	let $icono = $(this).find(".fas");
	$boton.prop("disabled", true);
	$icono.toggleClass("fa-save fa-spinner fa-spin");
	
	$.ajax({ 
		"url": "guardar_catalogo.php",
		"dataType": "JSON",
		"method": "POST",
		"data": $("#form_edicion").serializeArray()
		}).done( function alTerminar (respuesta){
		console.log("respuesta", respuesta);
		$("#modal_edicion").modal("hide");
		window.location.reload(true);
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
				"tabla": "departamentos",
				"id_campo": "id_departamentos",
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