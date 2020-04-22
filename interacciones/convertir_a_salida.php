<?php 
	include("../conexi.php");
	$link = Conectarse();
	
	
	include("../funciones/get_rows_by_id.php");
	
	
	//BUSCA DATOS DE LA VENTA 
	
	
	$copiar_venta = "
	INSERT INTO salidas 
	(fecha_salidas, id_usuarios, referencia,articulos)
SELECT NOW(), '{$_COOKIE["id_usuarios"]}', CONCAT('VENTA #', id_ventas), articulos
FROM ventas WHERE id_ventas =  '{$_GET["id_ventas"]}'";
	
	
	$result_copiar_venta = mysqli_query($link, $copiar_venta);
	
	if($result_copiar_venta){
		$respuesta['estatus'] = 'success';
		$respuesta['mensaje'] = 'Venta Copiada';
		$folio = mysqli_insert_id($link);
		$respuesta['folio'] = $folio;
	}
	else{
		$respuesta['estatus_movimiento'] = 'error';
		$respuesta['mensaje_movimiento'] = "Error en $insertar_movimiento :".mysqli_error($link);
	} 
	// SELECT  * FROM ventas WHERE id_ventas =  {$_GET["id_ventas"]}";
	// $result  = mysqli_query($link, $consulta);
	
	
	//INSERTA EN SALIDAS
	
	//BUSCA PRODUCTOS DE LA VENTA
	
	//INSERTA EN SALIDAS_PRODUCTOS
	
	
	// $respuesta['insertar_movimiento'] = $insertar_movimiento;
	
	// $result_movimiento = mysqli_query($link, $insertar_movimiento);
	
	// if($result_movimiento){
		// $respuesta['estatus_movimiento'] = 'success';
		// $respuesta['mensaje_movimiento'] = 'Movimiento Guardado';
		// $folio = mysqli_insert_id($link);
		// $respuesta['folio'] = $folio;
	// }
	// else{
		// $respuesta['estatus_movimiento'] = 'error';
		// $respuesta['mensaje_movimiento'] = "Error en $insertar_movimiento :".mysqli_error($link);
	// }
	
	
	// foreach($_POST['productos'] as $indice => $producto){
		
		// $ganancia_pesos = ($producto["precio"] - $producto["costo_proveedor"]) *  $producto["cantidad"];
		// $respuesta["ganancia"][] = $ganancia_pesos;
		
		
		
		// INSERTA productos de cada movimiento
		// if($_POST["tipo_movimiento"] == "ENTRADA"){
			// $exist_nueva = $producto["existencia_anterior"] + $producto["cantidad"];
			
			// $insertar_producto = "INSERT INTO entradas_productos SET
			// id_entradas = 	'$folio', 
			// id_productos = 	'{$producto["id_productos"]}', 
			// cantidad = 	'{$producto["cantidad"]}'
			// ";
			
		// }
		// else{
			// $exist_nueva = $producto["existencia_anterior"] - $producto["cantidad"];
			
			// $insertar_producto = "INSERT INTO salidas_productos SET
			// id_salidas = 	'$folio', 
			// id_productos = 	'{$producto["id_productos"]}', 
			// cantidad = 	'{$producto["cantidad"]}'
			// ";
		// }
		
		// $result_productos = mysqli_query( $link, $insertar_producto );
		
		// $respuesta["result_productos"] = $result_productos.": ".mysqli_error($link) ;
		
		
		// actualiza existencias
		
		// $update_existencia = "UPDATE productos SET existencia_productos = '$exist_nueva''
		// WHERE id_productos = '{$producto["id_productos"]}'	"; 
		
		// $result_existencia = mysqli_query( $link, $update_existencia );
		
		// $respuesta["result_existencia"] = $result_existencia ;
		
	// }
	
	echo json_encode($respuesta);
?>		