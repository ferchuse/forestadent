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
						<input  class="form-control input-lg"  type="search" id="buscar_cliente" placeholder="Buscar Cliente" >
						
					</div>
				</div>
				<div class="col-sm-2" >
					<button class="btn btn-success " type="button" data-toggle="modal" data-target="#modal_clientes">
						<i class="fas fa-plus"></i>
						Nuevo Cliente
					</button>
				</div>
			</div>
			<div class="row">
				
				<div class="col-sm-4  px-2" >
					<div class="card  mb-3">
						<div class="card-header text-white bg-info">	<legend class="text-center">Datos de Contacto</legend>
						</div>
						<div class="card-body">
							<form id="form_editar_cliente" autocomplete="off">
								<input type="hidden"  id="index" value="0">
								<input type="hidden"  name="id_clientes" id="id_clientes" value="<?= $_GET["id_clientes"]?>">
								<div class="form-group">
									<label for="">Nombre:</label>
									<input  class="form-control"  name="nombre" id="nombre" readonly >
								</div>
								<div class="form-group">
									<label for="">Teléfono:</label>
									<p class="form-control-static"><a class="card-link" id="telefono" href="#"></a></p>				
								</div>
								<div class="form-group">
									<label for="">Estado</label>
									<input class="form-control"   id="estado" name="estado">
								</div>
								<div class="form-group">
									<label for="">Especialidad</label>
									<input class="form-control"   id="especialidad"  name="especialidad">
								</div>
								<div class="form-group">
									<label for="">Correo</label>
									<p class="form-control-static"><a id="correo" href=""></a></p>	
								</div>
								<div class="form-group">
									<label for="domicilio">Domicilio:</label>
									<textarea class="form-control"  name="domicilio" id="domicilio"></textarea>
								</div>
								<div class="form-group">
									<label for="">Datos Extra</label>
									<textarea class="form-control"  name="datos_extra" id="datos_extra"></textarea>
								</div>
								<div class="modal-footer">
									
									<button type="submit" class="btn btn-success" >
										<i class="fa fa-save"></i> Guardar
									</button>
								</div>
							</form>
							
						</div>
					</div>
					
					
				</div>
				<div class="col-sm-8">
					
					<legend class="text-center">Historial </legend>
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
		<?php  include('../clientes/form_clientes.php'); ?>
		<script src="nueva_interaccion.js?<?php echo date("Ymd-his")?>"></script>
		
	</body>
</html>								