<?php

Class ClsComprobEntrada extends ClsConexion
{
	# CONSTRUCTOR
	function ClsComprobEntrada($cnx  = null  )
	{
			$this->conn = $cnx;
	}
	#Extrar todas las series para un comprobante para una determinada empresa
	function Get_Series_cPerJuridica_nComTipo($bean_ctactenumeracion)
	{
		$cPerJuridica = $bean_ctactenumeracion->getcPerJuridica();
		$nComTipo     = $bean_ctactenumeracion->getnComTipo() ;

		$this->query = "Call usp_Get_Series_cPerJuridica_nComTipo('$cPerJuridica', $nComTipo);";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}
	#Extrar la serie de un comprobante para una determinada empresa
	function Get_Series_cPerJuridica_nComTipo_nSerie($bean_ctactenumeracion)
	{
		$cPerJuridica = $bean_ctactenumeracion->getcPerJuridica();
		$nComTipo     = $bean_ctactenumeracion->getnComTipo() ;
		$nSerie       = $bean_ctactenumeracion->getnSerie() ;

		$this->query = "Call usp_Get_Series_cPerJuridica_nComTipo_nSerie('$cPerJuridica', $nComTipo, $nSerie);";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}


}