<?php
	
	include("../login/login_success.php");
	include("../conexi.php");
	include("../funciones/generar_select.php");
	$link = Conectarse();

	
	$dt_fecha_inicial = new DateTime("first day of this month");
	$dt_fecha_final = new DateTime("last day of this month");
	
	$fa_inicial = $dt_fecha_inicial->format("Y-m-d");
	$fa_final = $dt_fecha_final->format("Y-m-d");
	
?>

<!DOCTYPE html>
<html lang="es">
	
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		
    <title>Reporte de Cuentas Por Cobrar</title>
		
    <?php include("../styles.php"); ?>
		
	</head>
	
	<body>
		<?php include("../menu.php");?>
		<div class="container-fluid">
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h3 class="text-center">Reporte de Cuentas Por Cobrar</h3>
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<form id="form_reportes" class="form-inline">
						<div class="form-group mr-2">
							<label for="fecha_inicio">Desde:</label>
							<input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="<?php echo $fa_inicial;?>">
						</div>
						<div class="form-group mr-2">
							<label for="fecha_fin">Hasta:</label>
							<input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="<?php echo $fa_final;?>">
						</div>
						<button type="submit" class="btn btn-success" id="btn_buscar">
							<i class="fa fa-search"></i> Buscar
						</button>
						
					</form>
				</div>
			</div>
			<hr>
			<div class="row text-center" >
			<div class="col-10 " id="listar_registros">
				
			</div>
			</div>
			
		</div >
		
		
		<?php  include('../scripts.php'); ?>
		<script src="movimientos.js"></script>
	</body>

	
	<script>
		$("#nuevo").click(function(){
			$("#modal_edicion").modal("show")
		});
		$("#form_reportes").submit(listarComisiones);
		
		$(".btn_comisiones").click(function(){
			$("#filtro_id_vendedores").val($(this).data("id_vendedores"));
			$("#filtro_vendedores").val($(this).data("nombre_vendedores"));
			$("#reporte_comisiones").collapse("show");
			$("#lista_ventas").html("");
		});
		
		$("#form_edicion").submit(guardarRegistro);
		$(".btn_editar").click(cargarDatos);
		
		function listarComisiones(event){
			event.preventDefault();
			console.log("listarComisiones()");
			let $boton = $(this).find(":submit");
			let $icono = $(this).find(".fas");
			
			$boton.prop("disabled", true);
			$icono.toggleClass("fa-search fa-spinner fa-spin");			
			
			$.ajax({ 
				"url": "tabla_comisiones.php",
				"method": "POST",
				"data": $("#form_reportes").serialize()
				}).done( function alTerminar (respuesta){					
				
				$("#listar_registros").html(respuesta);
				}).always(function(){
				
				$boton.prop("disabled", false);
				$icono.toggleClass("fa-search fa-spinner fa-spin");	
			});
		}
		
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
					"tabla": "vendedores",
					"id_campo": "id_vendedores",
					"id_valor": $id_registro						
				}
				}).done( function alTerminar (respuesta){					
				console.log("respuesta", respuesta);
				$boton.prop("disabled", false);
				$icono.toggleClass("fa-edit fa-spinner fa-spin"); 
				$("#modal_edicion").modal("show")
				$.each(respuesta.data, function(name, value){
					
					$("#" + name).val(value);                        
					
				})
				
			})
		}
		
		function guardarRegistro(event){
      event.preventDefault()
			console.log("guardarRegistro");
			
      let $boton = $(this).find(':submit');
			let $icono = $(this).find(".fas");
			
      $boton.prop("disabled", true);
			$icono.toggleClass("fa-save fa-spinner fa-spin");				
			
			$.ajax({ 
        "url": "guardar_vendedores.php",
        "dataType": "JSON",
        "method": "POST",
        "data": $("#form_edicion").serializeArray()
        }).done( function alTerminar (respuesta){
				console.log("respuesta", respuesta);
				if(respuesta.status == "success"){
					
					alertify.success(respuesta.mensaje);
				}
				else{
					alertify.error(respuesta.mensaje);
				}
				$("#modal_edicion").modal("hide");
				window.location.reload(true);
				}).always(function(){
				$boton.prop("disabled", false);
				$icono.toggleClass("fa-save fa-spinner fa-spin"); 
				
			});
			
		}		
	</script>
</html>		