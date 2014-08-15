<?php
class ClsPerJuridica extends ClsConexion
{
# CONSTRUCTOR
	function ClsPerJuridica($cnx  = null  )
	{
			$this->conn = $cnx;
	}
		# Funcion para seleccionar Provincias por departamentos
		function Get_PerJuridica_by_cPerUsuario($bean_perjuridica )
		{
			$cPerCodigo = $bean_perjuridica->getcPerCodigo() ;
			$this->query = "CALL usp_Get_PerJuridica_by_cPerUsuario( '$cPerCodigo')  ; ";
			$this->execute_query();
			$data = $this->rows ;
			return $data;
		}

}

?>