<?php
	if($_COOKIE["permiso_usuarios"] == "vendedor"){
		
		
		HEADER("location: prospectos/index.php");
	}
	else{
		
		HEADER("location: clientes/index.php");
		
	}
	
?>