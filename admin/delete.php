<?php 
    require_once 'config/config.php';
    require_once 'config/conexion.php';
    $base = new dbmysqli($hostname,$username,$password,$database); 
    $id_pagina = $_GET['id_pagina'];
    $delete="delete from subpagina where id_pagina='$id_pagina' or pagina_superior='$id_pagina'";
    $result = $base->ExecuteQuery($delete); 
    if($result){
        $del2="delete from pagina where id_pagina='$id_pagina'";
		$result2 = $base->ExecuteQuery($del2); 
			if($result2){
				echo("Eliminado correctamente");
			}else{
				 echo("error al eliminar");
			}
    }else{
        echo("error al eliminar");
    }
    $delete="DELETE FROM archivos WHERE id_pagina = $id_pagina";
    $result = $base->ExecuteQuery($delete); 
    if($result){
        echo("Eliminado correctamente");
    }else{
        echo("error al eliminar");
    }

	echo "<meta http-equiv='refresh' content='0; url=paginas.php'>";
?>