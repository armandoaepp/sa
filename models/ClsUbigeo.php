<?php
class ClsUbigeo extends ClsConexion
{

	#Funcion extrar el ubigeo completo atraves del codigo del sector : sector->distrito->provincia->departamento
	function Get_Ubigeo_nParCodSector($bean_parametro)
	{

		$nParCodigo    = $bean_parametro->getnParCodigo() ;

		 // return "Call usp_ubg_Get_Distritos_by_nProCodigo('$nProCodigo')";
		$this->query = "Call usp_Get_Ubigeo_nParCodSector('$nParCodigo')";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}

}

?>