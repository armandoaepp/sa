<?php

Class ClsSerieEmpresa extends ClsConexion
{
	# CONSTRUCTOR
	function ClsSerieEmpresa($cnx  = null  )
	{
			$this->conn = $cnx;
	}
	#Funcion para cargar las provincias
	function Filtrar_SerieEmpresa($bean_parametro, $bean_perjuridica){

		$nOriReg         = $bean_parametro->getnOriRegistros() ;
		$nCanReg         = $bean_parametro->getnNumRegMostrar() ;
		$nPagRegistro    = $bean_parametro->getnPagRegistro() ;
		// $nParClase       = $bean_parametro->getnParClase() ;
		$cParDescripcion = $bean_parametro->getcParDescripcion() ;

		$cPerCodigo= $bean_perjuridica->getcPerCodigo() ;

		$this->query="Call usp_Filtrar_SerieEmpresa($nOriReg, $nCanReg, $nPagRegistro, '$cParDescripcion','$cPerCodigo')";
		$this->execute_query();
		$data = $this->rows ;
		return $data;

	}
}



