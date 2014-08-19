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
# Método Actualizar CtaCteNumeracion->Numero
	public function Upd_CtaCteNumeracion_Numero($bean_ctactenumeracion)
	{
		$cPerJuridica = $bean_ctactenumeracion->getcPerJuridica();
		$nComTipo     = $bean_ctactenumeracion->getnComTipo();
		$nSerie       = $bean_ctactenumeracion->getnSerie();
		$Numero       = $bean_ctactenumeracion->getNumero();

		$this->query = "CALL usp_Upd_CtaCteNumeracion_Numero('$cPerJuridica', $nComTipo, $nSerie,'$Numero')";
		$this->execute_query();
		$data = $this->rows ;
		return $data;

	}

# Método Validar
	public function Validar_CtaCteNumeracion($bean_ctactenumeracion)
	{
		$cPerJuridica = $bean_ctactenumeracion->getcPerJuridica();
		$nComTipo     = $bean_ctactenumeracion->getnComTipo();
		$nSerie       = $bean_ctactenumeracion->getnSerie();

		// return "CALL usp_Validar_CtaCteNumeracion('$cPerJuridica', $nComTipo, $nSerie)";
		$this->query = "CALL usp_Validar_CtaCteNumeracion('$cPerJuridica', $nComTipo, $nSerie)";
		$this->execute_query();
		$data = $this->rows ;
		return $data;

	}

}
?>