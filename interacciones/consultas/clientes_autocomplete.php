<?php
	
	include ("../../conexi.php");
	header("Content-Type: application/json");
	
	$link=Conectarse();
	
	$respuesta  =array() ;
	$query=$_GET["query"]; 
	$tabla= "clientes"; 
	$campo= "nombre"; 
	
	$consulta = "
	
	SELECT 
	CONCAT(nombre, ' ' , apellidos) as nombre ,
	id_clientes,
	telefono,
	estado,
	correo,
	especialidad,
	domicilio,
	datos_extra
	
	FROM clientes
	WHERE nombre LIKE '%$query%' ORDER BY $campo LIMIT 50 ";
	$result= mysqli_query($link,$consulta);
	if($result){
		while($cliente=mysqli_fetch_assoc($result)){
			$consulta_historial = "
			SELECT * 
			FROM
			interacciones
			WHERE id_clientes = '{$cliente["id_clientes"]}'
			
			";
			
			$result_historial= mysqli_query( $link, $consulta_historial );
			if($result_historial){
			
				while($historial = mysqli_fetch_assoc($result_historial)) {
					
					$cliente["historial"][] = $historial; 
					
					
				}
			}
			else{
				$respuesta["result_productos"] = mysqli_error($link); 
			}
			
			$respuesta["clientes"][] =  $cliente;
			$respuesta ["suggestions"][]  = ["value" => $cliente[$campo], "data" => $cliente ];
		}
	}
	else $respuesta["result"] = "Error". mysqli_error($link);
	
	$respuesta["consulta"] = $consulta;
	echo json_encode($respuesta );
	
	
	
?>	

