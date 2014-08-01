<?php

Class ClsDepartamento extends ClsConexion
{
	#Funcion para cargar los departamentos.
	function Get_Departamentos_by_nPaiCodigo($bean_departamento ){

		$nPaiCodigo = $bean_departamento->getnPaiCodigo() ;

		$this->query = "Call usp_ubg_Get_Departamentos_by_nPaiCodigo('$nPaiCodigo')";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}
}