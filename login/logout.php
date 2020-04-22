<?php 
	session_start();
	session_destroy();		unset($_COOKIE['id_usuarios']);	unset($_COOKIE['permiso_usuarios']);	unset($_COOKIE['nombre_usuarios']);
	unset($_COOKIE['id_turnos']);		setcookie("id_usuarios", "",  time() - 3600, "/");	setcookie("permiso_usuarios", "",  time() - 3600, "/");	setcookie("nombre_usuarios", "",  time() - 3600, "/");
	setcookie("id_turnos", "",  time() - 3600, "/");		header("location:index.php");		
?>