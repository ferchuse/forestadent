<?php
	
	include("../conexi.php");
	$link = Conectarse();
	$menu_activo = "compras";
	
	
	$consulta = "SELECT * FROM ventas
	LEFT JOIN vendedores USING (id_vendedores)
	LEFT JOIN ventas_detalle USING (id_ventas)
	LEFT JOIN productos USING (id_productos)
	LEFT JOIN clientes USING (id_clientes)
	WHERE id_ventas={$_GET["id_registro"]}";
	
	$result = mysqli_query($link, $consulta);
	
	while ($fila = mysqli_fetch_assoc($result)) {
		$filas[] = $fila;
	}
	
	$consulta_detalle = "SELECT
	SUM(cantidad) AS cantidad,
	GROUP_CONCAT(codigo_productos,'/', cantidad, ' ') AS codigo_productos,
	nombre_departamentos AS descripcion_productos,
	precio,
	SUM(importe) AS importe,
	SUM(cant_descuento) AS cant_descuento
	FROM
	ventas_detalle
	LEFT JOIN productos USING (id_productos)
	LEFT JOIN departamentos USING (id_departamentos)
	WHERE
	id_ventas = {$_GET["id_registro"]}
	GROUP BY
	id_departamentos";
	
	$result_detalle = mysqli_query($link, $consulta_detalle);
	
	while ($fila = mysqli_fetch_assoc($result_detalle)) {
		$fila_detalle[] = $fila;
	}
	
	
	
?>


<!DOCTYPE html>
<html lang="es">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		
		<title>Nota de Remisión</title>
		
		
		<?php include("../styles.php"); ?>
		<link rel="stylesheet" href="imprimir_movimiento.css">
	</head>
	
	<body>
		<div class="container h4">
			<section class="mt-3 ">
				<div class="row">
					
					
					<div class="col-9">
						<h3 class="text-center">
							<strong>ESTAMBRES ATOSHKA SA DE CV</strong>
						</h3>
						
						<h3 class="text-center">
							<strong>Nota de Remisión</strong>
						</h3>
						
						<div class="row">
							<div class="col-sm-3"><strong>Folio:</strong></div>
							<div class="col-sm-8"><?php echo $filas[0]["id_ventas"] ?></div>
						</div>
						
						<div class="row">
							<div class="col-sm-3"><strong>Fecha:</strong></div>
							<div class="col-sm-8"><?php echo date("d/m/Y", strtotime($filas[0]["fecha_ventas"])); ?></div>
						</div>
						<div class="row">
							<div class="col-sm-3"><strong>Cliente:</strong></div>
							<div class="col-sm-8"><?php echo($filas[0]["razon_social_clientes"]); ?></div>
						</div>
						<div class="row">
							<div class="col-sm-3"><strong>Vendedor:</strong></div>
							<div class="col-sm-8"><?php echo($filas[0]["nombre_vendedores"]); ?></div>
						</div>
						
						
					</div>
					
					
					
					<div class="col-3 text-right">
						<img class="img-fluid" src="../img/logo.png" alt="">
					</div>
				</div>
				
				<div class="mt-3 row">
					<table id="tabla_venta" class="col-12 table table-hover table-bordered table-condensed">
						
						<thead class="bg-info">
							
							<tr>
								<th class="text-center">Cantidad</th>
								<th class="text-center">Descripción</th>
								<th class="text-center">Precio</th>
								<th class="text-center">Importe</th>
								<th class="text-center">Descuento</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($fila_detalle as $i => $producto) { ?>
								<tr>
									<th class="text-center">
										<?php echo number_format($producto["cantidad"]) ?>
									</th>
									<th class="text-center">
										<?php echo $producto["descripcion_productos"] ?>
										<br> 
										<?php echo $producto["codigo_productos"] ?>
									</th>
									<th class="text-center"><?php echo $producto["precio"] ?></th>
									<th class="text-center"><?php echo $producto["importe"] ?></th>
									<th class="text-center"><?php echo $producto["cant_descuento"] ?></th>
								</tr>
								<?php 
								}
							?>
						</tbody>
					</table>
				</div>
			</section>
			
			<section class="mt-5 lead">
				<div class="row">
					<div class="col-sm-2 col-6 h3 text-right">
						<label for="">Artículos: </label> 
					</div>
					<div class="col-sm-2 col-6 h3">
						<?php echo $filas[0]["articulos"]?>
					</div>
					
					
					<div class="col-sm-6 col-6 h3 text-right ">
						Subtotal: <br>
						Descuento: <br>
						IVA: <br>
						Total:
					</div>
					<div class="col-sm-2 col-6 h3 text-right">
						<?php echo number_format($filas[0]["subtotal"],2)?> <br>
						<?php echo number_format($filas[0]["total_descuento"],2)?> <br>
						<?php echo number_format($filas[0]["iva"],2)?> <br>
						<?php echo number_format($filas[0]["total"],2)?>
					</div>
					
					
					
				</div>
			</section>
			<pre hidden>
				<?php print_r($filas)?>
			</pre>
			
		</div>
	</body>
	
</html>						