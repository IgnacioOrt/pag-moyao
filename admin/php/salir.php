<?php session_start();
	
	unset( $_SESSION["nom"] ); 
	echo '<script>window.location="../login.html";</script>'

?>