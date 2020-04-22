<?php
	
	include("../conexi.php");
	$link = Conectarse();
	$total = 0;
	$registros= [];
	$consulta = "SELECT * FROM cargos 
	LEFT JOIN clientes USING(id_clientes) 
	LEFT JOIN vendedores USING(id_vendedores) 
	
	WHERE 	
	
	id_vendedores = '{$_POST['id_vendedores']}'
	AND DATE(fecha) BETWEEN '{$_POST['fecha_inicio']}'
	AND '{$_POST['fecha_fin']}'  ";
	$result = mysqli_query($link, $consulta);
	
	if($result){
		while($fila = mysqli_fetch_assoc($result)){
			$registros[] = $fila;
		}
	}
	else{ 
		die("Error en la consulta $consulta". mysqli_error($link));
	}
?>

<hr>
<?php if(count($registros) > 0){?>
	<table class="table table-striped">
		<thead>
			<tr class="success">
				<td><strong>Folio</strong></td>
				<td><strong>Cliente</strong></td>
				<td><strong>Importe</strong></td>
			</tr>
		</thead>
		<tbody>
			
			<?php 
				
				foreach($registros AS $i=>$fila){	
					$total+=  $fila["importe"];
				?>
				<tr class="">
					<td><?php echo $fila["concepto"] ?></td> 
					<td><?php echo $fila["nombre"] ?></td> 
					<td class="text-right"><?php echo $fila["importe"] ?></td> 
				</tr>
				<?php
				}
			?>
		</tbody>
		<tfoot class="bg-secondary text-white">
			<tr class="">
				<td colspan="2" ><b>TOTAL</b></td> 
				<td class="text-right"><b>$<?php echo number_format($total) ?></b></td> 
			</tr>
			<tr class="">
				<td colspan="2"><b>COMISIÓN 10%</b> </td> 
				<td class="text-right"><b>$<?php echo number_format($total * .1)?></b></td> 
			</tr>
		</tfoot>
	</table>
	<?php
	}
	else{
		
		echo "<div class='alert alert-warning'>No hay Ventas en este periodo</div>";
	}
?>