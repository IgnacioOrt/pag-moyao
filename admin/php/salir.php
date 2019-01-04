<?php session_start();
	
	unset( $_SESSION["nom"] ); 
	header("Location: ../login.html");

?>