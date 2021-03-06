<?php
/* Clase Generada desde PlaneaTec-PHP - Creado por @armandaepp */
class ClsCtaCteDetalle extends ClsConexion {
	# CONSTRUCTOR
	function ClsCtaCteDetalle($cnx  = null  )
	{
			$this->conn = $cnx;
	}
# Método Insertar
	public function Set_ctactedetalle($bean_ctactedetalle)
	{
		$cCtaCteRecibo = $bean_ctactedetalle->getcCtaCteRecibo();
		$Item = $bean_ctactedetalle->getItem();
		$nSerCodigo = $bean_ctactedetalle->getnSerCodigo();
		$nCtaCteCantidad = $bean_ctactedetalle->getnCtaCteCantidad();
		$nMoneda = $bean_ctactedetalle->getnMoneda();
		$fCtaCteTC = $bean_ctactedetalle->getfCtaCteTC();
		$fCtaCteIGV = $bean_ctactedetalle->getfCtaCteIGV();
		$fCtaCteDetimporte = $bean_ctactedetalle->getfCtaCteDetimporte();
		$dCtaCteDetRegistro = $bean_ctactedetalle->getdCtaCteDetRegistro();
		$nBieRegCodigo = $bean_ctactedetalle->getnBieRegCodigo();
		$nCtaCtedetEstado = $bean_ctactedetalle->getnCtaCtedetEstado();

		$this->query = "CALL usp_Set_ctactedetalle('$cCtaCteRecibo','$Item','$nSerCodigo','$nCtaCteCantidad','$nMoneda','$fCtaCteTC','$fCtaCteIGV','$fCtaCteDetimporte','$dCtaCteDetRegistro','$nBieRegCodigo','$nCtaCtedetEstado')";
		$this->execute_query();
		$data = $this->rows ;
		return $data;

	}
//Método Actualizar
	public function Upd_ctactedetalle($bean_ctactedetalle)
	{
		$cCtaCteRecibo = $bean_ctactedetalle->getcCtaCteRecibo();
		$Item = $bean_ctactedetalle->getItem();
		$nSerCodigo = $bean_ctactedetalle->getnSerCodigo();
		$nCtaCteCantidad = $bean_ctactedetalle->getnCtaCteCantidad();
		$nMoneda = $bean_ctactedetalle->getnMoneda();
		$fCtaCteTC = $bean_ctactedetalle->getfCtaCteTC();
		$fCtaCteIGV = $bean_ctactedetalle->getfCtaCteIGV();
		$fCtaCteDetimporte = $bean_ctactedetalle->getfCtaCteDetimporte();
		$dCtaCteDetRegistro = $bean_ctactedetalle->getdCtaCteDetRegistro();
		$nBieRegCodigo = $bean_ctactedetalle->getnBieRegCodigo();
		$nCtaCtedetEstado = $bean_ctactedetalle->getnCtaCtedetEstado();

		$this->query = "CALL usp_Upd_ctactedetalle('$cCtaCteRecibo','$Item','$nSerCodigo','$nCtaCteCantidad','$nMoneda','$fCtaCteTC','$fCtaCteIGV','$fCtaCteDetimporte','$dCtaCteDetRegistro','$nBieRegCodigo','$nCtaCtedetEstado')";
		$this->execute_query();
		$data = $this->rows ;

	}
//Método Eliminar(Actualizar Estado)
	public function Upd_ctactedetalle_Estado($bean_ctactedetalle)
	{
		$cCtaCteRecibo = $bean_ctactedetalle->getcCtaCteRecibo();
		$nCtaCtedetEstado = $bean_ctactedetalle->getnCtaCtedetEstado();

		$this->query = "CALL usp_Set_ctactedetalle('$cCtaCteRecibo','$nCtaCtedetEstado')";
		$this->execute_query();
		$data = $this->rows ;
	}
//Método Buscar por ID
	public function Get_ctactedetalle_by_cCtaCteRecibo($bean_ctactedetalle)
	{
		$cCtaCteRecibo = $bean_ctactedetalle->getcCtaCteRecibo();

		$this->query = "CALL usp_Set_ctactedetalle('$cCtaCteRecibo')";
		$this->execute_query();
		$data = $this->rows ;
	}
}
?>