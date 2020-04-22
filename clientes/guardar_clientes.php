<?php
	header("Content-Type: application/json");
	include ("../conexi.php");
	$link = Conectarse();
	$respuesta = Array();
	
	$consulta = "INSERT INTO clientes SET 
	id_clientes = '{$_POST["id_clientes"]}',
	alias_clientes = '{$_POST["alias_clientes"]}',
	correo_clientes = '{$_POST["correo_clientes"]}',
	razon_social_clientes = '{$_POST["razon_social_clientes"]}',
	rfc_clientes = '{$_POST["rfc_clientes"]}',
	telefono = '{$_POST["telefono"]}',
	direccion = '{$_POST["direccion"]}',
	id_vendedores = '{$_POST["id_vendedores"]}'
	
	ON DUPLICATE KEY UPDATE 
	
	alias_clientes = '{$_POST["alias_clientes"]}',
	correo_clientes = '{$_POST["correo_clientes"]}',
	razon_social_clientes = '{$_POST["razon_social_clientes"]}',
	rfc_clientes = '{$_POST["rfc_clientes"]}',
	telefono = '{$_POST["telefono"]}',
	direccion = '{$_POST["direccion"]}',
	id_vendedores = '{$_POST["id_vendedores"]}'
	
	";
	$result = mysqli_query($link, $consulta);
	
	$respuesta["consulta"] = $consulta;
	
	if($result){
		$respuesta["status"] = "success";
		$respuesta["mensaje"] = "Guardado";
		
	}	
	else{
		$respuesta["status"] = "error";
		$respuesta["mensaje"] = "Error $consulta  ".mysqli_error($link);		
	}
	
	echo json_encode($respuesta);
?>