<?php
class ClsPerRelacion extends ClsConexion
{

		# Funcion para seleccionar Provincias por departamentos
		function Set_PerRelacion($bean_perrelacion )
		{
			$cPerCodigo      = $bean_perrelacion->getcPerCodigo() ;
			$nPerRelTipo     = $bean_perrelacion->getnPerRelTipo() ;
			$cPerJuridica    = $bean_perrelacion->getcPerJuridica() ;
			$dPerRelacion    = $bean_perrelacion->getdPerRelacion() ;
			$cPerObservacion = $bean_perrelacion->getcPerObservacion() ;
			// $nPerRelEstado   = $bean_perrelacion->getnPerRelEstado() ;

			$this->query = "CALL usp_Set_PerRelacion( '$cPerCodigo' , $nPerRelTipo , '$cPerJuridica' ,  '$dPerRelacion' , '$cPerObservacion' )  ; ";
			$this->execute_query();
			$data = $this->rows ;
			return $data;
		}
}

?>