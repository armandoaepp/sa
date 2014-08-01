<?php
class ClsPerJuridica extends ClsConexion
{

		# Funcion para seleccionar Provincias por departamentos
		function Get_Sectores_by_nCasCodigo($bean_caserio )
		{
			$nCasCodigo = $bean_caserio->getnCasCodigo() ;
			$this->query = "CALL usp_Get_Sectores_by_nCasCodigo( $nCasCodigo)  ; ";
			$this->execute_query();
			$data = $this->rows ;
			return $data;
		}
}

?>