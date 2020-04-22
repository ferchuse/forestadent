<?php 
	include('../conexi.php');
	$link = Conectarse();
	
	$arrResult = array();
	
	if ($_GET["estatus_productos"]) {
		$estatus_productos = $_GET["estatus_productos"];
		} else {
		$estatus_productos = 'ACTIVO';
	}
	
	$consulta = "SELECT *, 
	COALESCE (entradas, 0) AS entradas,
	COALESCE (salidas, 0) AS salidas,
	COALESCE (entradas, 0) - COALESCE (salidas, 0) AS existencia
	
	FROM productos
	LEFT JOIN departamentos USING (id_departamentos) 
	LEFT JOIN (
	SELECT
	id_productos,
	SUM(cantidad) AS entradas
	FROM
	entradas LEFT JOIN
	entradas_productos USING(id_entradas)
	
	GROUP BY id_productos
	)
	AS t_entradas USING (id_productos)
	
	LEFT JOIN (
	SELECT
	id_productos,
	SUM(cantidad) AS salidas
	FROM
	salidas
	LEFT JOIN salidas_productos USING(id_salidas)
	GROUP BY id_productos
	) AS t_salidas USING (id_productos)
	
	WHERE 1 
	
	AND estatus_productos = '$estatus_productos'
	";    
	if($_GET["id_departamentos"] != '') {        
		$consulta.= " AND  id_departamentos = '{$_GET["id_departamentos"]}'";
	}
	if($_GET["existencia"] != '') {        
		$consulta.= " AND existencia_productos < min_productos ";
	}
	
	$consulta.="
	ORDER BY
	{$_GET["sort"]} {$_GET["order"]}
	";
	$result = mysqli_query($link,$consulta);
	if(!$result){
		die("Error en $consulta" . mysqli_error($link) );
    }else{
		$num_rows = mysqli_num_rows($result);
		if($num_rows != 0){
			while($row = mysqli_fetch_assoc($result)){
				$arrResult[] = $row;        
				
			}
		}
		else{
			
		}
	}
	
	if($_COOKIE["permiso_usuarios"] == "vendedor"){
		$permiso = "d-none";
	}
	else{
		$permiso = "d-sm-flex";
	}
	
	foreach($arrResult as $i=> $producto){
		$semaforo = $producto["existencia"] < $producto["min_productos"] ? "bg-danger": "";
		$badge =  $producto["existencia"] < $producto["min_productos"] ? "danger": "success";
		
		
	?>
	<div class="row p-2 m-1 border ">
		<div class="col-8 col-sm-4">
			<?php echo $producto["descripcion_productos"]?>
		</div>
		
		<div class="col-4 h4 col-sm-2 text-center">
			<span class="badge  badge-<?php echo $badge?>">	<?php echo $producto["existencia"]?></span>
		</div>
		
		<div class="col-sm-2 d-none <?php echo $permiso?>" >
			<?php echo $producto["ubicacion"]?> 
		</div>
		<div class="col-sm-2 d-none <?php echo $permiso?>">
			<button class="btn btn-warning btn_editar" data-id_producto="<?php echo $producto["id_productos"]?>">
				<i class="fa fa-edit"></i>
			</button>
			<button class="btn btn-danger btn_eliminar" data-id_producto="<?php echo $producto["id_productos"]?>">
				<i class="fa fa-trash"></i>
			</button>
		</div>
		
	</div>
	
	<?php 		
	}
?>




