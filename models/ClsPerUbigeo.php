<?php

Class ClsPerUbigeo extends ClsConexion
{
	#Funcion para cargar las provincias
	function Set_PerUbigeo($bean_perubigeo){

		$cPerCodigo    = $bean_perubigeo->getcPerCodigo() ;
		$nPerUbiCodigo = $bean_perubigeo->getnPerUbiCodigo() ;
		$cPerUbiGlosa  = $bean_perubigeo->getcPerUbiGlosa() ;
		// $nPerUbiEstado = $bean_perubigeo->getnPerUbiEstado() ;

		 // return "Call usp_ubg_Get_Distritos_by_nProCodigo('$nProCodigo')";
		$this->query = "Call usp_Set_PerUbigeo('$cPerCodigo', $nPerUbiCodigo , '$cPerUbiGlosa')";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}
}



