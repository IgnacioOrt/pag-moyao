<?php
	$superior = $_POST['s'];
	$inferior = $_POST['i'];
	if (isset($superior) && isset($inferior)) {
		ajustar($superior,$inferior);
	}
	function ajustar($superior,$inferior)
	{
		require_once 'config/config.php';
        require_once 'config/conexion.php';
        $base = new dbmysqli($hostname,$username,$password,$database);
        //$insert = "INSERT INTO subpagina (id_pagina,pagina_superior) VALUES ($inferior,$superior)";
        if ($superior == 1) {
        	$delete = "DELETE FROM subpagina WHERE id_pagina = $inferior";
        	$result = $base->ExecuteQuery($delete); 
    		if($result){
    			?>
    			<!-- <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=paginas.php"> -->
    			<?php
    		}else{
    			echo "Error al borrar";
    		}
        }else{
        	$query = "SELECT *FROM subpagina WHERE id_pagina = $inferior";
        	echo "$query";
        	$res = $base->ExecuteQuery($query);
        	if ($res) {
        		if ($row = $base->GetRows($res)) {
        			$update = "UPDATE subpagina SET pagina_superior = $superior WHERE id_pagina = inferior";
        			if ($base->ExecuteQuery($update)) {
        				echo "Movido a $inferior $superior";
        				?>
        				<!-- <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=paginas.php"> -->
        				<?php
        			}else{
        				echo "Error al mover";
        			}
        		}else{
        			$insert = array("id_pagina" => $inferior, "pagina_superior" => $superior);
        			$base ->insertar("subpagina", $insert);
        			?>
        			<!-- <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=paginas.php"> -->
        			<?php
        		}
        		$base->SetFreeResult($res);
        	}else{
        		echo "Error al conectar";
        	}
        }
	}
?>
