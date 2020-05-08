<?php
	
	include("../conexi.php");
	$link = Conectarse();
	$total = 0;
	$registros= [];
	$total_comisiones = 0;
	
	$consulta = "SELECT
	* FROM vendedores
	";
	
	
	if($_COOKIE["permiso_usuarios"] == "vendedor"){
		$consulta .= " WHERE  id_vendedores = '{$_COOKIE["id_usuarios"]}'";
		
	}
	
	$result = mysqli_query($link, $consulta);
	
	if($result){
		while($fila = mysqli_fetch_assoc($result)){
			$vendedores[] = $fila;
		}
	}
	else{ 
		die("Error en la consulta $consulta". mysqli_error($link));
	}
?>


<hr>


<?php 
	
	
	foreach($vendedores as $vendedor){
		$historial = [];
		$consulta = "SELECT
		* FROM interacciones 
		LEFT JOIN clientes USING (id_clientes)
		WHERE 
		interacciones.id_vendedores = '{$vendedor["id_vendedores"]}'
		AND DATE(fecha_interacciones) BETWEEN '{$_GET["fecha_inicial"]}'
		AND '{$_GET["fecha_final"]}'
		";
		
		
		$result = mysqli_query($link, $consulta);
		
		if($result){
			while($fila = mysqli_fetch_assoc($result)){
				$historial[] = $fila;
			}
		}
		else{ 
			die("Error en la consulta $consulta". mysqli_error($link));
		}
		
		echo 	"<legend >". $vendedor["nombre_vendedores"]."</legend >";
		// echo 	"<pre >".print_r($result)."</pre >";
		
		
		if(mysqli_num_rows($result) == 0){
			
			echo "<div class='alert alert-warning'> No hay registros</div>";
		}
		else{
			
		?>
		
		<table class="table table-striped table-hover">
			<thead>
				<tr class="success">
					<th>Cliente</th>
					<th>Fecha</th>
					<th>Tipo de Interacción</th>
					<th>Accion</th>
					<th>Observaciones</th>
				</tr>
			</thead>
			<tbody>
				
				<?php 
					
					foreach($historial AS $i=>$fila){	
						
					?>
					<tr>
						<td>
							<a target="_blank" href="../interacciones/index.php?id_clientes=<?= $fila["id_clientes"]?>">
								<?php echo $fila["apellidos"]. " " . $fila["nombre"]; ?>
							</a>
						</td> 
						<td><?= date("d/m/Y H:i", strtotime($fila["fecha_interacciones"]));?></td> 
						<td>
							<?php
								
								echo $fila["tipo_interaccion"];
								
								
								
							?>
						</td> 
						<td>
							<?php 
								
								echo $fila["accion"];
								
								if($fila["accion"] == "Llamar Después"){
									echo "<br> <b>Programada: </b>".date("d/m/Y H:i", strtotime($fila["fecha_programada"])); 
								}
								
								if($fila["accion"] == "Cotizar"){
									echo "<br> <b>Por: ".$fila["medio_contacto"]."</b>"; 
								}
							?>
							
						</td> 
						<td><?= $fila["observaciones"] ?></td> 
					</tr>
					<?php
					}
				?>
			</tbody>
			<tfoot class="bg-secondary text-white">
				<tr class="" >
					<td colspan="5"><?= count($historial);?> Registros</td> 
				</tr>
			</tfoot>
		</table>
		</br>
		</hr>
		
		
		<?php
		}
	}
	
?>