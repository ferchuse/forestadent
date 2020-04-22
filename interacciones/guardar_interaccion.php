<?php 
	include("../conexi.php");
	$link = Conectarse();

	
	$insert = "INSERT INTO interacciones SET
	
	id_vendedores = '{$_COOKIE["id_usuarios"]}',
	id_clientes = '{$_POST["id_clientes"]}',
	fecha_interacciones = NOW(),
	tipo_interaccion = '{$_POST['tipo_interaccion']}',
	accion = '{$_POST['accion']}',
	comentarios = '{$_POST['comentarios']}'
	
	
	";
	
	
	$respuesta['insert'] = $insert;
	
	$result = mysqli_query($link, $insert);
	
	if($result){
		$respuesta['estatus'] = 'success';
		$respuesta['mensaje'] = 'Guardado Correctamente';
		
	}
	else{
		$respuesta['estatus'] = 'error';
		$respuesta['mensaje'] = mysqli_error($link);
	}
	
	echo json_encode($respuesta);
?>		