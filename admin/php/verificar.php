<?PHP session_start();
$alias=$_REQUEST['nickname'];
$user=$_REQUEST['userX'];
$fecha=$_REQUEST['fecha'];
$direccion=$_REQUEST['direcc'];
$correo=$_REQUEST['mail'];
$contra=md5($_REQUEST['passport']);
$cel=$_REQUEST['tel'];
$avatar="img/avatar/userdefault.jpg";
$link=mysqli_connect("localhost","u176906030_dios","dios.9");
					mysqli_set_charset($link,"utf8");
					mysqli_select_db($link,"u176906030_paris");
$result=mysqli_query($link,"select alias,correo from usuario where (alias='$alias' and correo='$correo')");
$val="no";
$cont=0;
if($row=mysqli_fetch_array($result)){
	//echo "Si existe el usuario <br>";
	header("Location: ../errorR.html");
}else{
	$_SESSION['nomU']=$alias;
	
	mysqli_query($link,"insert into registro values('$alias','$user','$fecha','$direccion','$cel','NULL')");
	mysqli_query($link,"insert into usuario values('NULL','$alias','$correo','$contra','$avatar','$val',$cont)");
	header("Location: ../indexU.php");
}


?>