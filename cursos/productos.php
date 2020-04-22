<?php
	include("../login/login_success.php");
	include("../conexi.php");
	include("../funciones/generar_select.php");
	$link = Conectarse();
	$menu_activo = "producto";
	
	if ($_COOKIE["permiso_usuarios"] == "vendedor") {
		$permiso = "hidden";
		} else {
		$permiso = "";
	}
	
?>
<!DOCTYPE html>
<html lang="es">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
			#respuesta_rep {
			color: red;
			}
		</style>
		<title>Productos</title>
		
		<?php include("../styles.php"); ?>
		
	</head>
	
	<body>
		
		<?php include("../menu.php"); ?>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<h2 class="text-center">Productos
						<small>
							<span id="cantidad_productos" class="badge badge-success"></span>
						</small>
						<button type="button" class="btn btn-success float-right" <?php echo $permiso; ?> id="btn_nuevo">
							<i class="fa fa-plus"></i> Nuevo
						</button>
						
					</h2>
					<hr>
					<section class="bg-light sticky-top">
						<form action="productos.php" id="form_filtros" class="form-inline ">
							<input type="hidden" id="sort" name="sort" value="descripcion_productos">
							<input type="hidden" id="order" name="order" value="ASC">
							
							<div class="form-group mx-1 d-none d-sm-inline-flex">
								<label for="fecha_inicio">Departamento:</label>
								<?php echo generar_select($link, "departamentos", "id_departamentos", "nombre_departamentos", true) ?>
							</div>
							<div class="form-group mx-1 d-none d-sm-inline-flex">
								<label for="fecha_fin">Existencias:</label>
								<select class="form-control" name="existencia">
									<option value="">TODAS</option>
									<option value="minimo">DEBAJO DEL MÍNIMO</option>
								</select>
							</div>
							<div class="form-group">
								<label for="">Buscar:</label>
								<input class="form-control buscar" type="search">
							</div>
							<div class="form-check form-check-inline ml-2">
								<input class="estatus_productos form-check-input" type="checkbox" id="inactivos" name="estatus_productos" value="INACTIVO">
								<label class="form-check-label" for="inactivos">Mostrar Inactivos</label>
							</div>
							<button class="btn btn-success" type="submit">
								<i class="fas fa-search"></i>
							</button>
						</form>
						
						<div class="row text-white font-weight-bold  p-2 m-1 border d-none d-sm-flex">
							<div class="col-sm-4">
								<a class="sort" href="#!" data-columna="descripcion_productos">
									Descripción
								</a>
							</div>
							<div class="col-sm-2">
								<a class="sort" href="#!" data-columna="existencia">
									Existencia
								</a>
							</div>
							<div class="col-sm-2 " <?php echo $permiso; ?>>
								<a class="sort" href="#!" data-columna="ubicacion">
									Ubicación
								</a>
							</div>
							<div class="col-sm-2" <?php echo $permiso; ?>>
								Acciones
							</div>
						</div>
					</section>
					
					<div id="bodyProductos">
						<div class="row">
							<div class="col-12 text-center">
								<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<?php include('form_productos.php'); ?>
			<?php include('../scripts.php'); ?>
			<script src="productos.js"></script>
			<script src="https://unpkg.com/sticky-table-headers"></script>
		</body>
		
	</html>			