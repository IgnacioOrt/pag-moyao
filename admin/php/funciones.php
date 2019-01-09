<?php
	function isSuperior($id,$base)
	{
		
	}
	function getPaginas($base)
	{
		$query = "SELECT pagina.id_pagina, pagina.title FROM pagina";
		$result = $base->ExecuteQuery($query);
		return $result;
	}
	function FunctionName($value='')
	{
		# code...
	}
?>