<?php
	
	include("../login/login_success.php");
	include("../conexi.php");
	$link = Conectarse();
	$menu_activo = "catalogos";
	$consulta = "SELECT * FROM departamentos ORDER BY nombre_departamentos";
	$result = mysqli_query($link, $consulta);
	
	if($result){
		while($fila = mysqli_fetch_assoc($result)){
			$departamentos[] = $fila;
		}
	}
	else{ 
		die("Error en la consulta $consulta". mysqli_error($link));
	}
	// echo "<script> console.log()"
	
?>

<!DOCTYPE html>
<html lang="es">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
			#btn_buscar {
			position: relative;
			top: 25px;
			}
		</style>
		<title>Categorías</title>
		
		<?php include("../styles.php"); ?>
		<link href="../fileupload/fileupload.css" rel='stylesheet' type='text/css'>
	</head>
	
	<body>
		
		<?php include("../menu.php"); ?>
		
		<section class="container">
			<strong>
				<h2>Categorías</h2>
			</strong>
			<hr>
			<div class="col-md-12 text-right">
				<button id="nuevo" type="button" class="btn btn-success" >
					<i class="fa fa-plus"></i> Nuevo
				</button>
			</div >
		</section>
		<br>
		
		<section class="container">
			<table class="table table-striped">
				<tr class="success">
					<td><strong>ID</strong></td>
					<td><strong>Categorías</strong></td>
					<td><strong>Oferta</strong></td>
					<td><strong>Temporada</strong></td>
					<td><strong>Estatus</strong></td>
					<td><strong>Acciones</strong></td>
				</tr>
				<?php foreach($departamentos AS $i=>$fila){	?>
					<tr class="">
						<td><?php echo $fila["id_departamentos"] ?></td> 
						<td><?php echo $fila["nombre_departamentos"] ?></td> 
						<td><?php echo $fila["oferta"] ?></td> 
						<td><?php echo $fila["temporada"] ?></td> 
						<td><?php echo $fila["estatus_departamentos"] ?></td> 
						<td>
							<button class="btn btn-warning btn_editar" type="button" 
							data-id_registro="<?php echo $fila["id_departamentos"]?>"	>
								<i class="fas fa-edit" ></i> Editar
							</button>
							
							<button class="btn btn-danger btn_borrar" type="button" 
							data-id_registro="<?php echo $fila["id_departamentos"]?>"	>
								<i class="fas fa-trash" ></i> Borrar
							</button>
							
						</td> 
					</tr>
					<?php
					}
				?>
			</table>
		</section>
		
		<?php include('../scripts.php'); ?>
		<?php include('form_departamentos.php'); ?>
		
		<script src="../fileupload/jquery.ui.widget.js"></script>
		<script src="../fileupload/jquery.fileupload.js"></script>
		
		
		<script src="departamentos.js">		</script>
	</body>
	<script>
		
	</script>
</html>