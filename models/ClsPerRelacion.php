<?php
class ClsPerRelacion extends ClsConexion
{
# CONSTRUCTOR
	function ClsPerRelacion($cnx  = null  )
	{
			$this->conn = $cnx;
	}
		# INSERTAR
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

		# UPDATE ESTADO
		function Upd_PerRelacion_Estado($bean_perrelacion )
		{
			$cPerCodigo      = $bean_perrelacion->getcPerCodigo() ;
			$nPerRelTipo     = $bean_perrelacion->getnPerRelTipo() ;
			$cPerJuridica    = $bean_perrelacion->getcPerJuridica() ;
			$nPerRelEstado   = $bean_perrelacion->getnPerRelEstado() ;

			// return "CALL usp_Upd_PerRelacion_Estado( '$cPerCodigo' , $nPerRelTipo , '$cPerJuridica' , $nPerRelEstado )  ; ";
			$this->query = "CALL usp_Upd_PerRelacion_Estado( '$cPerCodigo' , $nPerRelTipo , '$cPerJuridica' , $nPerRelEstado )  ; ";
			$this->execute_query();
			$data = $this->rows ;
			return $data;
		}
}

?>