<?php
class ClsPerTelefono extends ClsConexion
{

		# Funcion para seleccionar Provincias por departamentos
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
}

?>