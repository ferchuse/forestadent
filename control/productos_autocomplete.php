<?php
	
	include ("../conexi.php");
	header("Content-Type: application/json");
	
	$link=Conectarse();
	
	$respuesta  =array() ;
	$query=$_GET["query"]; 
	$tabla= "productos"; 
	$campo= "descripcion_productos"; 
	
	$consulta = "SELECT *, 
	COALESCE (entradas, 0) AS entradas,
	COALESCE (salidas, 0) AS salidas,
	COALESCE (entradas, 0) - COALESCE (salidas, 0) AS saldo
	
	FROM productos
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
	
	
	WHERE $campo LIKE '%$query%' ORDER BY $campo LIMIT 50 ";
	$result= mysqli_query($link,$consulta);
	if($result){
		while($fila=mysqli_fetch_assoc($result)){
			
			$respuesta ["suggestions"][]  = ["value" => $fila[$campo], "data" => $fila ];
		}
	}
	else $respuesta["result"] = "Error". mysqli_error($link);
	
	$respuesta["consulta"] = $consulta;
	echo json_encode($respuesta );
	
	
	
?>	

