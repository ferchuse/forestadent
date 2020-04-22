<?php
	header("Content-Type: application/json");
	include ("../conexi.php");
	$link = Conectarse();
	$respuesta = Array();
	
	
	$guardar = "INSERT INTO usuarios SET 
	id_usuarios = '{$_POST["id_usuarios"]}',
	nombre_usuarios = '{$_POST["nombre_usuarios"]}',
	pass_usuarios = '{$_POST["pass_usuarios"]}',
	permiso_usuarios = '{$_POST["permiso_usuarios"]}'
	
	ON DUPLICATE KEY UPDATE 
	
	nombre_usuarios = '{$_POST["nombre_usuarios"]}',
	pass_usuarios = '{$_POST["pass_usuarios"]}',
	permiso_usuarios = '{$_POST["permiso_usuarios"]}'
	;
	
	";
	if(mysqli_query($link,$guardar)){
		$respuesta['status'] = "success";
		$respuesta['mensaje'] = "Guardado Correctamente";
	}
	else{
		$respuesta['status'] = "error";
		$respuesta['mensaje'] = "Error en ".$guardar.mysqli_error($link);
	}
	
	
	
	echo json_encode($respuesta);
?>