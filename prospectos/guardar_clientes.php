<?php
	header("Content-Type: application/json");
	include ("../conexi.php");
	$link = Conectarse();
	$respuesta = Array();
	
	$consulta = "INSERT INTO clientes SET 
	id_clientes = '{$_POST["id_clientes"]}',
	id_vendedores = '{$_POST["id_vendedores"]}',
	nombre = '{$_POST["nombre"]}',
	apellidos = '{$_POST["apellidos"]}',
	correo = '{$_POST["correo"]}',
	telefono = '{$_POST["telefono"]}',
	especialidad = '{$_POST["especialidad"]}',
	estado = '{$_POST["estado"]}',
	domicilio = '{$_POST["domicilio"]}',
	datos_extra = '{$_POST["datos_extra"]}'
	
	ON DUPLICATE KEY UPDATE 
	
	
	id_vendedores = '{$_POST["id_vendedores"]}',
	nombre = '{$_POST["nombre"]}',
	apellidos = '{$_POST["apellidos"]}',
	correo = '{$_POST["correo"]}',
	telefono = '{$_POST["telefono"]}',
	especialidad = '{$_POST["especialidad"]}',
	estado = '{$_POST["estado"]}',
	domicilio = '{$_POST["domicilio"]}',
	datos_extra = '{$_POST["datos_extra"]}'
	
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