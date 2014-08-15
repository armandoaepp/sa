<?php
/* Clase Generada desde PlaneaTec-PHP - Creado por @armandaepp */
class ClsCtaCteNumeracion extends ClsConexion {
	# CONSTRUCTOR
	function ClsCtaCteNumeracion($cnx  = null  )
	{
			$this->conn = $cnx;
	}

# Método Insertar
	public function Set_CtaCteNumeracion($bean_ctactenumeracion)
	{
		$cPerJuridica = $bean_ctactenumeracion->getcPerJuridica();
		$nComTipo     = $bean_ctactenumeracion->getnComTipo();
		$nSerie       = $bean_ctactenumeracion->getnSerie();
		$Numero       = $bean_ctactenumeracion->getNumero();

		// return "CALL usp_Set_CtaCteNumeracion('$cPerJuridica','$nComTipo','$nSerie','$Numero')";
		$this->query = "CALL usp_Set_CtaCteNumeracion('$cPerJuridica',$nComTipo,$nSerie,'$Numero')";
		$this->execute_query();
		$data = $this->rows ;
		return $data;

	}
# Método Actualizar
	public function Upd_ctactenumeracion($bean_ctactenumeracion)
	{
		$cPerJuridica = $bean_ctactenumeracion->getcPerJuridica();
		$nComTipo = $bean_ctactenumeracion->getnComTipo();
		$nSerie = $bean_ctactenumeracion->getnSerie();
		$Numero = $bean_ctactenumeracion->getNumero();

		$this->query = "CALL usp_Upd_ctactenumeracion('$cPerJuridica',$nComTipo,$nSerie,'$Numero')";
		$this->execute_query();
		$data = $this->rows ;

	}
# Método Eliminar(Actualizar Estado)
	public function Upd_ctactenumeracion_Estado($bean_ctactenumeracion)
	{
		$cPerJuridica = $bean_ctactenumeracion->getcPerJuridica();
		$Numero = $bean_ctactenumeracion->getNumero();

		$this->query = "CALL usp_Set_ctactenumeracion('$cPerJuridica','$Numero')";
		$this->execute_query();
		$data = $this->rows ;
	}
# Método Buscar por ID
	public function Get_ctactenumeracion_by_cPerJuridica($bean_ctactenumeracion)
	{
		$cPerJuridica = $bean_ctactenumeracion->getcPerJuridica();

		$this->query = "CALL usp_Set_ctactenumeracion('$cPerJuridica')";
		$this->execute_query();
		$data = $this->rows ;
	}
}
?>