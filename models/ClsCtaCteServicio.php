<?php
/* Clase Generada desde PlaneaTec-PHP - Creado por @armandaepp */
class ClsCtaCteServicio extends ClsConexion {
	# CONSTRUCTOR
	function ClsCtaCteServicio($cnx  = null  )
	{
			$this->conn = $cnx;
	}
# Método Insertar
	public function Set_CtaCteServicio($bean_ctacteservicio)
	{
		$nBieCodigo       = $bean_ctacteservicio->getnBieCodigo();
		$nActCodigo       = $bean_ctacteservicio->getnActCodigo();
		$fSerImporte      = $bean_ctacteservicio->getfSerImporte();
		$nMonCodigo       = $bean_ctacteservicio->getnMonCodigo();
		$nSerAfecto       = $bean_ctacteservicio->getnSerAfecto();
		$nSerTipo         = $bean_ctacteservicio->getnSerTipo();
		$nSerModalidad    = $bean_ctacteservicio->getnSerModalidad();
		$fSerTasa         = $bean_ctacteservicio->getfSerTasa();
		$nSerPeriodicidad = $bean_ctacteservicio->getnSerPeriodicidad();
		$nUniOrgCodigo    = $bean_ctacteservicio->getnUniOrgCodigo();
		$nPrdCodigo       = $bean_ctacteservicio->getnPrdCodigo();

		$this->query = "CALL usp_Set_CtaCteServicio( $nBieCodigo, $nActCodigo,'$fSerImporte', $nMonCodigo, $nSerAfecto, $nSerTipo, $nSerModalidad,'$fSerTasa', $nSerPeriodicidad, $nUniOrgCodigo, $nPrdCodigo)";
		$this->execute_query();
		$data = $this->rows ;
		return $data;

	}
//Método Actualizar
	public function Upd_ctacteservicio($bean_ctacteservicio)
	{
		$nSerCodigo = $bean_ctacteservicio->getnSerCodigo();
		$nBieCodigo = $bean_ctacteservicio->getnBieCodigo();
		$nActCodigo = $bean_ctacteservicio->getnActCodigo();
		$fSerImporte = $bean_ctacteservicio->getfSerImporte();
		$nMonCodigo = $bean_ctacteservicio->getnMonCodigo();
		$nSerAfecto = $bean_ctacteservicio->getnSerAfecto();
		$nSerTipo = $bean_ctacteservicio->getnSerTipo();
		$nSerModalidad = $bean_ctacteservicio->getnSerModalidad();
		$fSerTasa = $bean_ctacteservicio->getfSerTasa();
		$nSerPeriodicidad = $bean_ctacteservicio->getnSerPeriodicidad();
		$nUniOrgCodigo = $bean_ctacteservicio->getnUniOrgCodigo();
		$nPrdCodigo = $bean_ctacteservicio->getnPrdCodigo();

		$this->query = "CALL usp_Upd_ctacteservicio( $nSerCodigo,'$nBieCodigo','$nActCodigo','$fSerImporte','$nMonCodigo','$nSerAfecto','$nSerTipo','$nSerModalidad','$fSerTasa','$nSerPeriodicidad','$nUniOrgCodigo','$nPrdCodigo')";
		$this->execute_query();
		$data = $this->rows ;

	}
//Método Eliminar(Actualizar Estado)
	public function Upd_ctacteservicio_Estado($bean_ctacteservicio)
	{
		$nSerCodigo = $bean_ctacteservicio->getnSerCodigo();
		$nPrdCodigo = $bean_ctacteservicio->getnPrdCodigo();

		$this->query = "CALL usp_Set_ctacteservicio('$nSerCodigo','$nPrdCodigo')";
		$this->execute_query();
		$data = $this->rows ;
	}
//Método Buscar por ID
	public function Get_ctacteservicio_by_nSerCodigo($bean_ctacteservicio)
	{
		$nSerCodigo = $bean_ctacteservicio->getnSerCodigo();

		$this->query = "CALL usp_Set_ctacteservicio('$nSerCodigo')";
		$this->execute_query();
		$data = $this->rows ;
	}
}
?>