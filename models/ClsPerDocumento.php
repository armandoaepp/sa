<?php
class ClsPerDocumento extends ClsConexion
{
		# Funcion para seleccionar Provincias por departamentos
		function Set_PerDocumento($bean_perdocumento )
		{
			$cPerCodigo       = $bean_perdocumento->getcPerCodigo() ;
			$nPerDocTipo      = $bean_perdocumento->getnPerDocTipo() ;
			$cPerDocNumero    = $bean_perdocumento->getcPerDocNumero() ;
			$dPerDocCaducidad = $bean_perdocumento->getdPerDocCaducidad() ;
			$nPerDocCategoria = $bean_perdocumento->getnPerDocCategoria() ;
			// $nPerDocEstado    = $bean_perdocumento->getnPerDocEstado() ;
			$this->query = "CALL usp_Set_PerDocumento('$cPerCodigo' ,  $nPerDocTipo , '$cPerDocNumero', '$dPerDocCaducidad' , $nPerDocCategoria)  ; ";
			$this->execute_query();
			$data = $this->rows ;
			return $data;
		}

		# VALIDAR DOCUMENTO DE PERSONA
		function Validar_PerDocumento($bean_perdocumento )
		{
			$cPerCodigo    = $bean_perdocumento->getcPerCodigo() ;
			$nPerDocTipo   = $bean_perdocumento->getnPerDocTipo() ;
			$cPerDocNumero = $bean_perdocumento->getcPerDocNumero() ;
			$this->query = "CALL usp_Validar_PerDocumento('$cPerCodigo' ,  $nPerDocTipo , '$cPerDocNumero')  ; ";
			$this->execute_query();
			$data = $this->rows ;
			return $data;
		}
}

?>