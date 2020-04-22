<?php 
	include('../login/login_success.php');
	include('../conexi.php');
	$link = Conectarse();
	$menu_activo = "control";
?>
<!DOCTYPE html>
<html lang="es">
	
	<head>
		
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Usuarios</title>
		<?php include('../styles.php'); ?>
	</head>
	
	<body>
		
		
		<?php include('../menu.php'); ?>    
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h3 class="text-center">Usuarios</h3>
					<button class="btn btn-success" type="button" id="nuevo">
					<i class="fa fa-plus"></i> Agregar</button>
					<hr>
				</div>
			</div>
			<br>
		</div>
		<div class="table-responsive" id="lista_registros">
			<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x"></i></div>
		</div>
		
		<?php include("form_usuarios.php");?>
		
		
		<?php include('../scripts.php');?>
		<script src="usuarios.js"></script>
	</body>
</html>	