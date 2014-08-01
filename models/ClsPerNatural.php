<?php
class ClsPerNatural extends ClsConexion
{

		# Funcion para seleccionar Provincias por departamentos
		function Set_PerNatural($bean_pernatural )
		{
			$cPerCodigo        = $bean_pernatural->getcPerCodigo() ;
			$cPerNatApePaterno = $bean_pernatural->getcPerNatApePaterno() ;
			$cPerNatApeMaterno = $bean_pernatural->getcPerNatApeMaterno() ;
			$nPerNatSexo       = $bean_pernatural->getnPerNatSexo() ;
			$nPerNatEstCivil   = $bean_pernatural->getnPerNatEstCivil() ;

			// return "CALL usp_Set_PerNatural( '$cPerCodigo', '$cPerNatApePaterno' , '$cPerNatApeMaterno' , $nPerNatSexo , $nPerNatEstCivil)  ; ";
			$this->query = "CALL usp_Set_PerNatural( '$cPerCodigo', '$cPerNatApePaterno' , '$cPerNatApeMaterno' , $nPerNatSexo , $nPerNatEstCivil)  ; ";
			$this->execute_query();
			$data = $this->rows ;
			return $data;
		}
}

?>