
<?php
	
	include("../conexi.php");
	$link = Conectarse();
	
	
	$lista_clientes = [];
	
	$consulta = "
	SELECT
	*
	FROM
	clientes
	WHERE 1 
	";
	
	
	$consulta.="
	ORDER BY
	{$_GET["sort"]} {$_GET["order"]}
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
				<a class="sort" href="#!" data-columna="razon_social_clientes">Nombre</a> 
			</th>
			
			<th class="text-center">
				<a class="sort" href="#!" data-columna="estado">Estado</a> 
			</th>
			<th class="text-center">
				<a class="sort" href="#!" data-columna="telefono">Telefono</a> 
			</th>
			<th class="text-center">
				<a class="sort" href="#!" data-columna="correo">Correo</a> 
			</th>
			<th class="text-center">Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$total_deuda=0;
			foreach ($lista_clientes as $i => $cliente) {
				$total_deuda+=$cliente["saldo"];
			?>
			<tr class="text-center">
				<td><?php echo $cliente["apellidos"]. " " . $cliente["nombre"]; ?></td>
				<td><?php echo $cliente["estado"]; ?></td>
				<td><?php echo $cliente["telefono"]; ?></td>
				<td><?php echo $cliente["correo"]; ?></td>
				
				<td >
					<button class="btn btn-info btn_historial" data-id_registro="<?php echo $cliente["id_clientes"] ?>" data-nombre="<?php echo $cliente["nombre_clientes"] ?>">
						<i class="fa fa-history"></i> Historial
					</button>
				</td>
				
			</tr>
			<?php
			}
		?>
	</tbody>
	<tfoot >
		<tr class="text-center bg-info text-white h5">
			
			<td colspan="3" class="text-right"><?php echo count($lista_clientes) ; ?> Registros</td>
			
			<td></td>
			<td></td>
			
		</tr>
	</tfoot>
</table>
