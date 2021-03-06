<?php
/* Clase Generada desde PlaneaTec-PHP - Creado por @armandaepp */
class ClsCtaCteComprobante extends ClsConexion {
	# CONSTRUCTOR
	function ClsCtaCteComprobante($cnx  = null  )
	{
			$this->conn = $cnx;
	}
# Método Insertar
	public function Set_ctactecomprobante($bean_ctactecomprobante)
	{
		$cCtaCteRecibo = $bean_ctactecomprobante->getcCtaCteRecibo();
		$nCtaCteComCodigo = $bean_ctactecomprobante->getnCtaCteComCodigo();
		$cCtaCteComNumero = $bean_ctactecomprobante->getcCtaCteComNumero();
		$nCtaCteTipoPago = $bean_ctactecomprobante->getnCtaCteTipoPago();
		$cPerCodigo = $bean_ctactecomprobante->getcPerCodigo();

		$this->query = "CALL usp_Set_ctactecomprobante('$cCtaCteRecibo','$nCtaCteComCodigo','$cCtaCteComNumero','$nCtaCteTipoPago','$cPerCodigo')";
		$this->execute_query();
		$data = $this->rows ;
		return $data;

	}
//Método Actualizar
	public function Upd_ctactecomprobante($bean_ctactecomprobante)
	{
		$cCtaCteRecibo = $bean_ctactecomprobante->getcCtaCteRecibo();
		$nCtaCteComCodigo = $bean_ctactecomprobante->getnCtaCteComCodigo();
		$cCtaCteComNumero = $bean_ctactecomprobante->getcCtaCteComNumero();
		$nCtaCteTipoPago = $bean_ctactecomprobante->getnCtaCteTipoPago();
		$cPerCodigo = $bean_ctactecomprobante->getcPerCodigo();

		$this->query = "CALL usp_Upd_ctactecomprobante('$cCtaCteRecibo','$nCtaCteComCodigo','$cCtaCteComNumero','$nCtaCteTipoPago','$cPerCodigo')";
		$this->execute_query();
		$data = $this->rows ;

	}
//Método Eliminar(Actualizar Estado)
	public function Upd_ctactecomprobante_Estado($bean_ctactecomprobante)
	{
		$cCtaCteRecibo = $bean_ctactecomprobante->getcCtaCteRecibo();
		$cPerCodigo = $bean_ctactecomprobante->getcPerCodigo();

		$this->query = "CALL usp_Set_ctactecomprobante('$cCtaCteRecibo','$cPerCodigo')";
		$this->execute_query();
		$data = $this->rows ;
	}
//Método Buscar por ID
	public function Get_ctactecomprobante_by_cCtaCteRecibo($bean_ctactecomprobante)
	{
		$cCtaCteRecibo = $bean_ctactecomprobante->getcCtaCteRecibo();

		$this->query = "CALL usp_Set_ctactecomprobante('$cCtaCteRecibo')";
		$this->execute_query();
		$data = $this->rows ;
	}
}
?>