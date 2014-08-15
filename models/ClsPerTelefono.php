<?php
class ClsPerTelefono extends ClsConexion
{
# CONSTRUCTOR
	function ClsPerTelefono($cnx  = null  )
	{
			$this->conn = $cnx;
	}
		# Funcion INsERTAR
		function Set_PerTelefono($bean_pertelefono )
		{
			$cPerCodigo    = $bean_pertelefono->getcPerCodigo() ;
			$nPerTelTipo   = $bean_pertelefono->getnPerTelTipo() ;
			$cPerTelNumero = $bean_pertelefono->getcPerTelNumero() ;
			// $nPerTelItem   = $bean_pertelefono->getnPerTelItem() ;
			// $nPerTelEstado = $bean_pertelefono->getnPerTelEstado() ;

			$this->query = "CALL usp_Set_PerTelefono( '$cPerCodigo', $nPerTelTipo , '$cPerTelNumero')  ; ";
			$this->execute_query();
			$data = $this->rows ;
			return $data;
		}

		# Funcion Actualizar
		function Upd_PerTelefono($bean_pertelefono )
		{
			$cPerCodigo    = $bean_pertelefono->getcPerCodigo() ;
			$nPerTelTipo   = $bean_pertelefono->getnPerTelTipo() ;
			$cPerTelNumero = $bean_pertelefono->getcPerTelNumero() ;
			$nPerTelItem   = $bean_pertelefono->getnPerTelItem() ;
			$nPerTelTipNew = $bean_pertelefono->getnPerTelTipNew() ;

			// return "CALL usp_Upd_PerTelefono( '$cPerCodigo', $nPerTelTipo ,  $nPerTelItem ,'$cPerTelNumero', $nPerTelTipNew)  ; ";
			$this->query = "CALL usp_Upd_PerTelefono( '$cPerCodigo', $nPerTelTipo , '$cPerTelNumero', $nPerTelItem , $nPerTelTipNew)  ; ";
			$this->execute_query();
			$data = $this->rows ;
			return $data;
		}
}

?>