
$(document).ready( function onLoad(){
	
	$('#form_interaccion').submit( guardarInteraccion);
	
	// getMailingLists("1000.0093a5e85fa7b77b3f67301058235327.ba4cdf8af899085bd7f7c09b5c3f051a");
	
	$("#btn_listas").click(function(){
		
		getMailingLists("1000.0093a5e85fa7b77b3f67301058235327.ba4cdf8af899085bd7f7c09b5c3f051a");
		
	})
	
	$("#btn_contactos").click(function(){
		
		getContacts("1000.00ece028a97ab75fe735d3afea3dba0b.82abd95bd316031df66dc0f922d63b40");
		
	})
}); 


// function cargarProductos(parametros){
// console.log("cargarVenta");

// $.ajax({
// url: "../ventas/cargar_venta.php",
// data: parametros,
// dataType: "JSON"
// })
// .done(renderProductos);

// }

// cargarCliente("1000.0093a5e85fa7b77b3f67301058235327.ba4cdf8af899085bd7f7c09b5c3f051a");


function getMailingLists(token){
	console.log("getMailingLists()");
	$.ajax({
		// "url":"cargar_venta.php",
		"url":"https://campaigns.zoho.com/api/v1.1/getmailinglists",
		beforeSend: function(request) {
			request.setRequestHeader("Authorization", 'Zoho-oauthtoken ' + token);
		},
		"method":"GET",
		// "headers": { 'Authorization:':  },
		"data":{
			"resfmt": "JSON"
		}
	})
	.done(function(resp){
		console.log(resp)
	});
	console.log("test")
}


function getContacts(token){
	
	$.ajax({
		"url":"https://campaigns.zoho.com/api/v1.1/getlistsubscribers",
		headers: { 'Authorization:': 'Zoho-oauthtoken ' + token },
		data:{
			"listkey" : "89fa7348c64f1b36f4a788c1f485b24f894375f7a7d2d66f",
			"resfmt": "JSON"
		}
	})
	
	
}


function guardarInteraccion(event){
	event.preventDefault();
	console.log("guardarInteraccion()");
	
	var boton = $(this).find(":submit");
	var icono = boton.find('.fa');
	boton.prop('disabled',true);
	icono.toggleClass('fa-save fa-spinner fa-pulse');
	
	
	$.ajax({
		url: 'guardar_interaccion.php',
		method: 'POST',
		dataType: 'JSON',
		data:{
			id_clientes: $('#id_clientes').val(),
			tipo_interaccion: $('#tipo_interaccion').val(),
			accion: $('#accion').val(),
			observaciones: $("#observaciones").val(),
		}
		}).done(function(respuesta){
		
		if(respuesta.estatus == "success"){
			alertify.success('Guardado');
			$("#modal_interaccion").modal("hide");
		}
		else{
			
			alertify.error(respuesta.mensaje);
		}
		}).fail(function(xhr, error, ernum){
		alertify.error("Ocurrio un error:"+ error + ernum );
		}).always(function(){
		boton.prop('disabled',false);
		icono.toggleClass('fa-save fa-spinner fa-pulse');
		
	});
	
}
