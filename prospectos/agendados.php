<?php
	include("../login/login_success.php");
	include("../funciones/generar_select.php");
	include("../conexi.php");
	$link = Conectarse();
	
	$menu_activo = "clientes";
	
?>
<!DOCTYPE html>
<html lang="es">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Clientes</title>
		
		<?php include("../styles.php"); ?>
		<style>
			.ascdsds::after {
			content: "<i class='fas fa-arrow-down'></i>";
			
			}
		</style>
	</head>
	
	<body>
		<?php include("../menu.php"); ?>
		
		<div class="container d-print-none">
			<div class="row">
				<div class="col-12 border-bottom mb-3">
					<h3 class="text-center">Agendados del Dia <?= date("d/m/Y")?> <span class="badge badge-success" id="contar_registros">0</span></h3>
				</div>
				
				<div class="row col-12 mb-4">
					<div class="col-sm-3" >
						<input class="buscar  form-control float-left" type="search" placeholder="Buscar Cliente">
					</div>
					<div class="col-sm-7">
						<form class="form-inline" id="form_filtros">
							<input type="hidden" id="sort" name="sort" value="apellidos">
							<input type="hidden" id="order" name="order" value="ASC">
							
							<div class="form-group" >
								<label for="tipo_interaccion">Estatus:</label>
								<select class="form-control" name="ultima_accion" id="ultima_accion" required>
									<option value="">Elige..</option>
									<option>Sin Interacción</option>
									<option>Prospecto</option>
									<option>Cotizar</option>
									<option selected>Llamar Después</option>
									<option>No llamar</option>
									<option>Cliente</option>
								</select>
							</div>
							
							
							<button type="submit" class="btn btn-primary" >
								<i class="fa fa-search"></i> Buscar
							</button>
							
						</form>
					</div>
					<div class="ml-auto d-none">
						<button type="button" class="btn btn-success float-right" id="btn_nuevo">
							<i class="fa fa-plus"></i> Nuevo
						</button>
						
					</div>
				</div>
				
				
				
				<div class="text-center table-responsive" id="lista_registros">
					
				</div>
				
			</div>
		</div>
		
		<div id="historial">
		</div>
		
		<?php include('../scripts.php'); ?>
		<?php include('form_clientes.php'); ?>
		<script src="prospectos.js?v=<?= date("dmY-His")?>"></script>
		
	</body>
</html>										