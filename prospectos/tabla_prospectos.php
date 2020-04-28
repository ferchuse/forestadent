
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
	
	HAVING ultima_accion = '{$_GET["ultima_accion"]}'
	
	";
	
	
	$consulta.="
	ORDER BY fecha_programada ASC LIMIT 50
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

<table class="table table-hover" id="tabla_registros">
	<thead class=" text-white">
		<tr>
			<th class="text-center">
				<a class="sort" href="#!" data-columna="nombre">Nombre</a> 
			</th>
			
			
		</tr>
	</thead>
	<tbody>
		<?php
			$total_deuda=0;
			foreach ($lista_clientes as $i => $cliente) {
				$total_deuda+=$cliente["saldo"];
			?>
			<tr class="text-center">
				<td>
					<a href="interacciones/index.php?id_clientes=<?= $cliente["id_clientes"]?>">
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
			
			<td class="text-right"><?php echo count($lista_clientes) ; ?> Registros</td>
			
		</tr>
	</tfoot>
</table>
