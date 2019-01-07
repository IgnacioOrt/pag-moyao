<?php 
    require_once 'config/config.php';
    require_once 'config/conexion.php';
    $base = new dbmysqli($hostname,$username,$password,$database); 
    $id_pagina = $_GET['id_pagina'];
    $delete="DELETE FROM pagina WHERE id_pagina = $id_pagina";
    $result = $base->ExecuteQuery($delete); 
    if($result){
        echo("Eliminado correctamente");
    }else{
        echo("error al eliminar");
    }
?>