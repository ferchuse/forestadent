<?php
	include("../login/login_success.php");
	include("../funciones/generar_select.php");
	include("../conexi.php");
	
	
	$url = "https://campaigns.zoho.com/api/v1.1/getmailinglists";
	
	// $ch = curl_init(); //ajax
	// curl_setopt($ch, CURLOPT_URL, $url); //url
	// curl_setopt($ch, CURLOPT_POST, true); // method
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 
	// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array("resfmt" => "JSON")) ; // data
	// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	// 'Authorization: Zoho-oauthtoken '
	// ));
	//	$result = curl_exec($ch);
	// if($result === FALSE){
	// $respuesta["curl_estatus"] = "error";
	// $respuesta["curl_mensaje"] = 'Curl failed: '. curl_error($ch);
	// }
	// else{
	
	// }
	
	// print_r($result);
	// curl_close($ch);
	
	
	$link = Conectarse();
	$menu_activo = $_GET["tipo_movimiento"];
	
	
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<style>
			.tabla_totales .row{
			margin-bottom: 10px;
			}
			
			.tab-pane {
			display: block;
			overflow: auto;
			overflow-x: hidden;
			height: 350px;
			width: 100%;
			padding: 10px;				
			}			
		</style> 
		
		
		<style>
			.venta{
			display: <?php echo $display;?>;
			}
		</style> 
		
		
		
    <title>Prospectos</title>
    <?php include("../styles.php");?>
	</head>
  <body>
		<?php include("../menu.php");?>
		
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4" >
					<div class="form-group">
						<input  class="form-control input-lg"  id="buscar_cliente" placeholder="Buscar Cliente" >
					</div>
				</div>
			</div>
			<div class="row">
				
				<div class="col-sm-5 border px-2" >
					<legend class="text-center">Datos del Contacto</legend>
					
					<input type="hidden"  id="index" value="0">
					<input type="hidden"  id="id_clientes" value="1">
					<div class="form-group">
						<label for="">Nombre:</label>
						<input  class="form-control"  id="nombre" readonly value="Andrea Herrera">
					</div>
					
					<div class="form-group">
						<label for="">Teléfono:</label>
						<p class="form-control-static"><a id="telefono" href="tel:123456456">123456456</a></p>						
					</div>
					
					<div class="form-group">
						<label for="">Estado</label>
						<input class="form-control" readonly value="Ciudad de México" id="estado">
					</div>
					<div class="form-group">
						<label for="">Especialidad</label>
						<input class="form-control" readonly value="ORTODONCIA" id="especialidad">
					</div>
					<div class="form-group">
						<label for="">Correo</label>
						<p class="form-control-static"><a id="correo" href="mailto:2183andre@gmail.com">2183andre@gmail.com</a></p>	
					</div>
					
					</div>
					<div class="col-sm-7">
						
						<legend class="text-center">Historial</legend>
						<table  id="tabla_historial" class="table table-hover">
							<thead>
								<tr>
									<th class="text-center">Fecha</th>
									<th class="text-center">Tipo Interacción</th>
									<th class="text-center">Acción</th>
									<th class="text-center">Observaciones</th>
								</tr> 
							</thead>
							<tbody>
								
								<tr>
									<td class="text-center"><?php echo "14-abr-2020 11:12";?></td>
									<td class="text-center"><?php echo "NO CONTESTA";?></td>
									<td class="text-center"><?php echo "Llamar Despues";?></td>
									<td class="text-center"><?php echo "Llamar 15 abr 9am";?></td>
								</tr>
								
								<tr>
									<td class="text-center"><?php echo "15-abr-2020 09:12";?></td>
									<td class="text-center"><?php echo "LLAMADA CONECTADA";?></td>
									<td class="text-center"><?php echo "Cotizar";?></td>
									<td class="text-center"><?php echo "Paquete 1";?></td>
								</tr>
								
							</tbody>
							
						</table>
					</div>
					
					
				</div>
				
				
				<section id="footer">
					<button hidden class="btn btn-secondary btn-lg" id="btn_listas" type="button">
						Listas
						<i class="fas fa-list"></i>
					</button>
					<button hidden class="btn btn-secondary btn-lg" id="btn_contactos" type="button">
						Contactos
						<i class="fas fa-users"></i>
					</button>
					
					<div class="col-sm-3 offset-sm-9 text-right">
						<button class="btn btn-success btn-lg btn-block" type="button" data-toggle="modal" data-target="#modal_interaccion">
							Siguiente
							<i class="fas fa-arrow-right"></i>
						</button>
					</div>
					
				</section>
				
			</div>
			
			
			<?php  include('../scripts.php'); ?>
			<?php  include('modal_interaccion.php'); ?>
			<script src="nueva_interaccion.js?<?php echo date("Ymd-his")?>"></script>
			
		</body>
	</html>								