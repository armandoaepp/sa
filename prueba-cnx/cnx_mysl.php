<?php

require_once "../models/ClsConexion.php" ;
class prueba extends ClsConexion
{


	function prueba1()
	{
		 $this->query= " select * from parametro " ;
				$this->execute_query();
				$data = $this->rows ;
				// return $data;
				print_r($data);
	}

	function User($cUserName,$cUserClave)
	{
		// $this->query="CALL usp_Get_Usuario_By_Clave_UserName('$cUserName','$cUserClave')";


		echo "SELECT  perusuario.cPerCodigo,
							 persona.cPerNombre,
							 persona.cPerApellidos
						FROM    perusuario
						Inner Join persona ON persona.cPerCodigo = perusuario.cPerCodigo
						WHERE   perusuario.cPerUsuCodigo  ='$cUserName'
					  AND perusuario.cPerUsuClave   = '$cUserClave'
					  AND perusuario.nPerUsuEstado  <> 0;
					  ";
	/*	$this->execute_query();
		$data = $this->rows ;
		// return $data;
		print_r($data);*/
	}
}

$objprueba = new prueba() ;
$objprueba->User("admin", md5("admin"))  ;

?>