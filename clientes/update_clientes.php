<?php
	header("Content-Type: application/json");
	include ("../conexi.php");
	$link = Conectarse();
	$respuesta = Array();
	
	$consulta = "UPDATE clientes SET 
	
	especialidad = '{$_POST["especialidad"]}',
	estado = '{$_POST["estado"]}',
	domicilio = '{$_POST["domicilio"]}',
	datos_extra = '{$_POST["datos_extra"]}'
	
	WHERE 	id_clientes = '{$_POST["id_clientes"]}'
	
	";
	$result = mysqli_query($link, $consulta);
	
	$respuesta["consulta"] = $consulta;
	
	if($result){
		$respuesta["estatus"] = "success";
		$respuesta["mensaje"] = "Guardado";
		
	}	
	else{
		$respuesta["estatus"] = "error";
		$respuesta["mensaje"] = "Error $consulta  ".mysqli_error($link);		
	}
	
	echo json_encode($respuesta);
?>