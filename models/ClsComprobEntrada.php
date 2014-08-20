<?php

Class ClsComprobEntrada extends ClsConexion
{
	# CONSTRUCTOR
	function ClsComprobEntrada($cnx  = null  )
	{
			$this->conn = $cnx;
	}
	#Funcion para cargar las provincias
	function Get_Series_cPerJuridica_nComTipo($bean_ctactenumeracion)
	{
		$cPerJuridica = $bean_ctactenumeracion->getcPerJuridica();
		$nComTipo     = $bean_ctactenumeracion->getnComTipo() ;

		$this->query = "Call usp_Get_Series_cPerJuridica_nComTipo('$cPerJuridica', $nComTipo);";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}
}