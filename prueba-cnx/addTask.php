<?php 
	require_once '../includes/db.php';

	if( isset($_GET['nParCodigo_']) && isset($_GET['cParNombre_']) ){		

		$nParCodigo = $_GET['nParCodigo_'];
		$nParClase = 1000 ;
		$cParJerarquia = $_GET['nParCodigo_'];
		$cParNombre = $_GET['cParNombre_'];
		$cParDescripcion = $_GET['cParNombre_'];
		$nParEstado = 1;

		$query="
			INSERT INTO parametro (nParCodigo, nParClase, cParJerarquia, cParNombre, cParDescripcion, nParEstado) 
			VALUES($nParCodigo, $nParClase, '$cParJerarquia', '$cParNombre', '$cParDescripcion', $nParEstado);
		";
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

		$result = $mysqli->affected_rows;

		echo $json_response = json_encode($result);

	}
?>