<style type="text/css">
	#loader-wrapper .loader-section {
    position: fixed;
    top: 0;
    width: 51%;
    height: 100%;
    background: #222222;
    z-index: 1000;
}
 
#loader-wrapper .loader-section.section-left {
    left: 0;
}
 
#loader-wrapper .loader-section.section-right {
    right: 0;
}
</style>
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
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
		echo '<script>window.location="../index.php";</script>';
	}else{
		echo '<script>window.location="../error2.html";</script>';
	}
}else{
	echo '<script>window.location="../error1.html";</script>';
}
?>