<?php

Class ClsProvincia extends ClsConexion
{
	#Funcion para cargar las provincias
	function Get_Provincias_by_nDepCodigo($bean_provincia){

		$nDepCodigo  	= $bean_provincia->getnDepCodigo() ;

		$this->query = "Call usp_ubg_Get_Provincias_by_nDepCodigo($nDepCodigo )";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}
}