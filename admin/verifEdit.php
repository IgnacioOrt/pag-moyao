<?php
require_once 'config/config.php';
require_once 'config/conexion.php';
$link=mysqli_connect($hostname,$username,$password,$database);
$id=$_REQUEST['id'];
$ti=$_REQUEST['title'];
$text=$_REQUEST['content'];

mysqli_query($link,"update pagina set title='$ti',content='$text' where id_pagina='$id'");
$var=$id;
foreach($_FILES["miarchivo"]['tmp_name'] as $key => $tmp_name)
{
  //condicional si el fuchero existe
  if($_FILES["miarchivo"]["name"][$key]) {
    // Nombres de archivos de temporales
    $archivonombre = $_FILES["miarchivo"]["name"][$key];
    $fuente = $_FILES["miarchivo"]["tmp_name"][$key];

    $carpeta = 'archivos/'; //Declaramos el nombre de la carpeta que guardara los archivos

    if(!file_exists($carpeta)){
      mkdir($carpeta, 0777) or die("\nHubo un error al crear el directorio de almacenamiento");
    }

    $dir=opendir($carpeta);
    $target_path = $carpeta.'/'.$archivonombre; //indicamos la ruta de destino de los archivos
    //echo "$target_path";
    if(move_uploaded_file($fuente, $target_path)) {
      mysqli_query($link,"insert into archivos values('$var','$target_path')");
      echo "\nLos archivos $archivonombre se han cargado de forma correcta.<br>";
    } else {
      echo "\nSe ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
    }
      closedir($dir); //Cerramos la conexion con la carpeta destino
    }
}
echo "<script>window.location='edit.php?id_pagina=".$id."';</script>";
?>
