<?php
/* incluimos la funcion conecta y creamos objetos de ambas bases de datos */


    $cnx = new PDO('mysql:host=127.0.0.1;dbname=planeatec_sa', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/* escribimos la consulta que actualizará a 7 el campo Puntos de la tabla prueba1 */

/*$consulta = "UPDATE persona SET
`cPerCodigo`='2000005922', `cPerNombre`='SANTOS nuevo', `cPerApellidos`='RAMIREZ VARGAS sdfsdf', `dPerNacimiento`='0000-00-00', `nPerTipo`='2', `nPerEstado`='2'
WHERE (`cPerCodigo`='2000005922');" ;*/
# cPerCodigo varchar(20), cPerNombre varchar(500), cPerApellidos varchar(500), dPerNacimiento varchar(20),  nPerEstado int(3)
try {
	$consulta = "CALL usp_Upd_Persona('2000005922','SANTOS MODIFICADO ','RAMIREZ VARGAS MODIFICADO  ', '0000-00-00', 1 ) ;" ;
	// $consulta = "select * from persona ";
	/*preparamos la consulta de la tabla SQLite*/
	$stm = $cnx->prepare($consulta);
	/* aplicamos el método execute al objeto creado por el método anterior */
	$stm->execute();

	$cuenta_col = $stm->columnCount() ;
	if ($cuenta_col > 0) {

		$data = $stm->fetchAll(PDO::FETCH_ASSOC) ;
	}
	else
	{
		$data = array('holas ' => 1);
	}
	// $data = $stm->fetchAll(PDO::FETCH_ASSOC) ;
var_dump($data) ;
} catch (Exception $e) {
	echo $e->getmessage() ;
}

echo " holas <br><br><br><br> ";
try {

	$consulta = "select * from persona ";
	/*preparamos la consulta de la tabla SQLite*/
	$stm = $cnx->prepare($consulta);
	/* aplicamos el método execute al objeto creado por el método anterior */
	$stm->execute();

	$cuenta_col = $stm->columnCount() ;
	if ($cuenta_col > 0) {

		$data = $stm->fetchAll(PDO::FETCH_ASSOC) ;
	}
	else
	{
		$data = array('holas ' => 1);
	}
	// $data = $stm->fetchAll(PDO::FETCH_ASSOC) ;
var_dump($data) ;
} catch (Exception $e) {
	echo $e->getmessage() ;
}

/* leemos el numero de registros afectados por la ejecución de la sentencia */
// $numero_resultados =  $actualiza->rowCount();
/* visualizamos la información del resultado */
// print("Se han actualizado $numero_resultados registros ::: ");


/* # repetimos exactamente el proceso anterior preparando un objeto MySQL
$consulta = 'UPDATE parametro SET parametro.cParDescripcion = "armando"
WHERE parametro.nParClase = 1002
AND parametro.nParCodigo =  1000  ;   ';

$actualiza = $cnx->prepare($consulta);
$actualiza->execute();
$numero_resultados = $actualiza->rowCount();

print("Se han actualizado $numero_resultados registros");*/
?>