<?php
/* Clase Generada desde PlaneaTec-PHP - Creado por @armandaepp */
class ClsPerCuenta extends ClsConexion {
	# CONSTRUCTOR
	function ClsPerCuenta($cnx  = null  )
	{
		$this->conn = $cnx;
	}
# Método Insertar
	public function Set_PerCuenta($bean_percuenta)
	{
		$cPerCodigo    = $bean_percuenta->getcPerCodigo();
		$cNroCuenta    = $bean_percuenta->getcNroCuenta();
		$nPerCtaTipo   = $bean_percuenta->getnPerCtaTipo();
		$cPerJurCodigo = $bean_percuenta->getcPerJurCodigo();
		$nMonCodigo    = $bean_percuenta->getnMonCodigo();

		$this->query = "CALL usp_Set_PerCuenta('$cPerCodigo','$cNroCuenta',$nPerCtaTipo,'$cPerJurCodigo',$nMonCodigo)";
		$this->execute_query();
		$data = $this->rows ;
		return $data;

	}
//Método Actualizar
	public function Upd_PerCuenta($bean_percuenta)
	{
		$nPerCtaCodigo = $bean_percuenta->getnPerCtaCodigo();
		$cNroCuenta = $bean_percuenta->getcNroCuenta();
		$nPerCtaTipo = $bean_percuenta->getnPerCtaTipo();
		$cPerJurCodigo = $bean_percuenta->getcPerJurCodigo();
		$nMonCodigo = $bean_percuenta->getnMonCodigo();

		$this->query = "CALL usp_Upd_PerCuenta($nPerCtaCodigo, '$cNroCuenta',$nPerCtaTipo, '$cPerJurCodigo',$nMonCodigo) ";
		$this->execute_query();
		$data = $this->rows ;

	}
//Método Eliminar(Actualizar Estado)
	public function Upd_PerCuenta_Estado($bean_percuenta)
	{
		$nPerCtaCodigo = $bean_percuenta->getnPerCtaCodigo();
		$nPerCtaEstado = $bean_percuenta->getnPerCtaEstado();

		$this->query = "CALL usp_Upd_PerCuenta_Estado($nPerCtaCodigo, $nPerCtaEstado)";
		$this->execute_query();
		$data = $this->rows ;
	}
//Método Buscar por ID
	public function Get_Percuenta_nPerCtaCodigo($bean_percuenta)
	{
		$nPerCtaCodigo = $bean_percuenta->getnPerCtaCodigo();

		$this->query = "CALL usp_Get_Percuenta_nPerCtaCodigo('$nPerCtaCodigo')";
		$this->execute_query();
		$data = $this->rows ;
	}
}
?>