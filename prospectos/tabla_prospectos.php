
<?php
	
	include("../conexi.php");
	$link = Conectarse();
	
	
	$lista_clientes = [];
	
	$consulta = "
	SELECT
	*,
	IF (
	ISNULL(accion),
	'Sin Interacción',
	accion
	) AS ultima_accion
	FROM
	clientes
	LEFT JOIN (
	SELECT
	*
	FROM
	interacciones
	FULL JOIN (
	SELECT
	MAX(fecha_interacciones) AS fecha_ultima_interaccion
	FROM
	interacciones
	GROUP BY
	id_clientes
	) t_fechas_ultima_interaccion ON fecha_interacciones = fecha_ultima_interaccion
	) AS t_ultimas_interacciones USING (id_clientes)
	WHERE clientes.id_vendedores = '{$_COOKIE["id_usuarios"]}'
	HAVING ultima_accion = '{$_GET["ultima_accion"]}'
	
	";
	
	
	$consulta.="
	ORDER BY fecha_programada ASC LIMIT 500
	#{$_GET["sort"]} {$_GET["order"]}
	";
	
	
	$result = mysqli_query($link, $consulta) or die("<pre>Error en $consulta" . mysqli_error($link) . "</pre>");
	
	while ($fila = mysqli_fetch_assoc($result)) {
		
		$lista_clientes[] = $fila;
	}
?>
<pre hidden>
	<?php echo $consulta; ?>
</pre>


<?php
	if($_GET["ultima_accion"] == "Llamar Después"){
	?>
	<table class="table table-hover" id="tabla_registros">
		<thead class="bg-secondary text-white">
			<tr>
				<th class="text-center">Nombre</th>
				<th class="text-center">Fecha Programada</th>
				
				
			</tr>
		</thead>
		<tbody>
			<?php
				
				foreach ($lista_clientes as $i => $cliente) {
					
				?>
				<tr class="text-center">
					<td>
						<a target="_blank" href="../interacciones/index.php?id_clientes=<?= $cliente["id_clientes"]?>">
							<?php echo $cliente["apellidos"]. " " . $cliente["nombre"]; ?>
						</a>
					</td>
					<td>
						<?php 
							if($cliente["fecha_programada"] != ""){
								echo date("d/m/Y H:i", strtotime($cliente["fecha_programada"])); 
							}
						?>
					</td>
					
				</tr>
				<?php
				}
			?>
		</tbody>
		<tfoot >
			<tr class="text-center bg-info text-white h5">
				
				<td colspan="2" class="text-center"><?php echo count($lista_clientes) ; ?> Registros</td>
				
			</tr>
		</tfoot>
	</table>
	
	<?php
	}
	elseif($_GET["ultima_accion"] == "Cotizar"){
	?>
	<table class="table table-hover" id="tabla_registros">
		<thead class="bg-secondary text-white">
			<tr>
				<th class="text-center">Nombre</th>
				<th class="text-center">Medio de Contacto</th>				
			</tr>
		</thead>
		<tbody>
			<?php
				
				foreach ($lista_clientes as $i => $cliente) {
				
				?>
				<tr class="text-center">
					<td>
						<a target="_blank" href="../interacciones/index.php?id_clientes=<?= $cliente["id_clientes"]?>">
							<?php echo $cliente["apellidos"]. " " . $cliente["nombre"]; ?>
						</a>
					</td>
					<td>
						<?php 
							
							echo ($cliente["medio_contacto"]); 
							
						?>
					</td>
					
				</tr>
				<?php
				}
			?>
		</tbody>
		<tfoot >
			<tr class="text-center bg-info text-white h5">
				
				<td colspan="2" class="text-center"><?php echo count($lista_clientes) ; ?> Registros</td>
				
			</tr>
		</tfoot>
	</table>
	
	
	<?php
	}
	else{
		
	?>
	
	<table class="table table-hover" id="tabla_registros">
		<thead class="bg-secondary text-white">
			<tr>
				<th class="text-center">Nombre</th>
							
			</tr>
		</thead>
		<tbody>
			<?php
				
				foreach ($lista_clientes as $i => $cliente) {
				
				?>
				<tr class="text-center">
					<td>
						<a target="_blank" href="../interacciones/index.php?id_clientes=<?= $cliente["id_clientes"]?>">
							<?php echo $cliente["apellidos"]. " " . $cliente["nombre"]; ?>
						</a>
					</td>
				
					
				</tr>
				<?php
				}
			?>
		</tbody>
		<tfoot >
			<tr class="text-center bg-info text-white h5">
				
				<td colspan="2" class="text-center"><?php echo count($lista_clientes) ; ?> Registros</td>
				
			</tr>
		</tfoot>
	</table>
	
	<?php
	}
?>