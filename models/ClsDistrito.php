<?php

Class ClsDistrito extends ClsConexion
{
	# CONSTRUCTOR
	function ClsDistrito($cnx  = null  )
	{
			$this->conn = $cnx;
	}
	#Funcion para cargar las provincias
	function Get_Distritos_by_nProCodigo($bean_distrito){

		$nProCodigo 	= $bean_distrito->getnProCodigo() ;

		 // return "Call usp_ubg_Get_Distritos_by_nProCodigo('$nProCodigo')";
		$this->query = "Call usp_ubg_Get_Distritos_by_nProCodigo('$nProCodigo')";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}
}