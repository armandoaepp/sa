<?php
class clsPerMail extends ClsConexion
{

		# Funcion para seleccionar Provincias por departamentos
		function Set_PerMail($bean_permail )
		{
			$cPerCodigo = $bean_permail->getcPerCodigo() ;
			$cPerMail = $bean_permail->getcPerMail() ;
			// $nPerMailItem = $bean_permail->getnPerMailItem() ;
			// $nPerMailEstado = $bean_permail->getnPerMailEstado() ;

			// return "CALL usp_Set_PerMail( '$cPerCodigo' , '$cPerMail' )  ; ";
			$this->query = "CALL usp_Set_PerMail( '$cPerCodigo' , '$cPerMail' )  ; ";
			$this->execute_query();
			$data = $this->rows ;
			return $data;
		}
}

?>