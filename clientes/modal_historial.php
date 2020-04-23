<?php
	
	include("../conexi.php");
	$link = Conectarse();
	$lista_transacciones = [];
	
	
	$consulta = "
	SELECT
	*
	FROM interacciones
	LEFT JOIN vendedores USING(id_vendedores)
	WHERE id_clientes = '{$_GET["id_clientes"]}'
	ORDER BY
	fecha_interacciones
	";
	
	
	$result = mysqli_query($link,$consulta) or die ("<pre>Error en $consulta". mysqli_error($link). "</pre>");
	
	while($fila = mysqli_fetch_assoc($result)){
		
		$historial[] = $fila;
		
	}
?>

<div id="modal_historial" class="modal fade " role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title text-center">Estado de Cuenta <span id="nombre_historial"></span></h3>
				<button type="button" class="close d-print-none" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body table-responsive">
				<?php
					if(count($historial) > 0){
					?>
					<table class="table table-hover ">
						<tr>
							<th class="text-center">Fecha</th>
							<th class="text-center">Vendedor</th>
							<th class="text-center">Tipo de Interacción</th>
							<th class="text-center">Acción</th>
							<th class="text-center">Observaciones</th>
						</tr>
						<?php 
							$cargos= 0;
							$abonos= 0;
							$saldo= 0;
							foreach($historial AS $i => $fila){
								
							?>
							<tr class="text-center">
								<td>
									<?php echo date("d/m/Y H:i", strtotime($fila["fecha_interacciones"]));?>
								</td>
								<td><?php echo $fila["nombre_vendedores"];?></td>
								<td><?php echo $fila["tipo_interaccion"];?></td>
								<td><?php echo ($fila["accion"]);?></td>
								<td><?php echo ($fila["observaciones"]);?></td>
							</tr>
							<?php
							}
						?>
					</table>
					<?php
					}
					else{
						
						echo "<div class='alert alert-warning'>No hay historial</div>";
					}
				?>
			</div>
			<div class="modal-footer d-print-none">
				<button type="button" class="btn btn-danger" data-dismiss="modal">
					<i class="fa fa-times"></i> Cerrar
				</button>
			</div>
		</div>
	</div>
</div>