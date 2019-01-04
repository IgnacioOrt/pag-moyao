<?php session_start();
$user=$_REQUEST['userX'];
$contraX=md5($_REQUEST['passport']);
$contra=hash('sha256',$contraX);

require_once '../config/config.php';
require_once '../config/conexion.php';
echo "$hostname $username $password $database";
$base = new dbmysqli($hostname,$username,$password,$database);
$query="select * from administrador where username='$user'";
$result = $base->ExecuteQuery($query);

if($row = $result->fetch_array(MYSQLI_NUM)){
	
	$query2="select * from administrador where (username='$user' and password='$contra')";
	$result2=$base->ExecuteQuery($query2);
	if($row2=$result2->fetch_array(MYSQLI_NUM)){
		
		$_SESSION['nom']=$row2[0];
		
		header("Location: ../index.php");
	}else{
		header("Location: ../error2.html");
		
	}
}else{
	
	
	header("Location: ../error1.html");
}


?>