<?php
	require_once '../config/config.php';
	require_once '../config/conexion.php';
	$base = new dbmysqli($hostname,$username,$password,$database);
	$reset = "truncate table subpagina";
	$base->ExecuteQuery($reset);
	echo '<script>window.location="../paginas.php";</script>';
?>