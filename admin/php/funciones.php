<?php
	function getPaginas($base)
	{
		$query = "SELECT pagina.id_pagina, pagina.title FROM pagina";
		$result = $base->ExecuteQuery($query);
		return $result;
	}
?>