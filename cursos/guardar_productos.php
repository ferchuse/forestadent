<?php
	header("Content-Type: application/json");
	include ("../conexi.php");
	$link = Conectarse();
	$respuesta = Array();
	
	$codigo_productos = $_POST['codigo_productos'];
	$descripcion_productos = $_POST['descripcion_productos'];
	$unidad_productos = $_POST['unidad_productos'];
	
	$guardarProductos = "INSERT INTO productos SET 
	id_productos = '{$_POST["id_productos"]}',
	codigo_productos = '$codigo_productos',
	descripcion_productos = '$descripcion_productos',
	unidad_productos = '$unidad_productos',
	min_productos = '{$_POST["min_productos"]}',
	id_departamentos = '{$_POST["id_departamentos"]}',
	costo_proveedor = '{$_POST["costo_proveedor"]}',
	ubicacion = '{$_POST["ubicacion"]}',
	linea = '{$_POST["linea"]}',
	precio_menudeo = '{$_POST["precio_menudeo"]}',
	estatus_productos = '{$_POST["estatus_productos"]}'
	
	ON DUPLICATE KEY UPDATE 
	
	codigo_productos = '$codigo_productos',
	descripcion_productos = '$descripcion_productos',
	unidad_productos = '$unidad_productos',
	min_productos = '{$_POST["min_productos"]}',
	id_departamentos = '{$_POST["id_departamentos"]}',
	costo_proveedor = '{$_POST["costo_proveedor"]}',
	ubicacion = '{$_POST["ubicacion"]}',
	linea = '{$_POST["linea"]}',
	precio_menudeo = '{$_POST["precio_menudeo"]}',
	estatus_productos = '{$_POST["estatus_productos"]}'
	;
	
	";
	if(mysqli_query($link,$guardarProductos)){
		$respuesta['estatus'] = "success";
		$id_producto = mysqli_insert_id($link);
		}else{
		$respuesta['estatus'] = "error";
		$respuesta['mensaje'] = "Error en ".$guardarProductos.mysqli_error($link);
	}
	
	echo json_encode($respuesta);
?>