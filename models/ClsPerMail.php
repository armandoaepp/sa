<?php
class clsPerMail extends ClsConexion
{
# CONSTRUCTOR
	function clsPerMail($cnx  = null  )
	{
			$this->conn = $cnx;
	}
		# Funcion MaiL
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

		# Funcion
		function Upd_PerMail($bean_permail )
		{
			$cPerCodigo   = $bean_permail->getcPerCodigo() ;
			$cPerMail     = $bean_permail->getcPerMail() ;
			$nPerMailItem = $bean_permail->getnPerMailItem() ;
			// $nPerMailEstado = $bean_permail->getnPerMailEstado() ;

			// return "CALL usp_Upd_PerMail( '$cPerCodigo'  , $nPerMailItem, '$cPerMail'  )  ; ";
			$this->query = "CALL usp_Upd_PerMail( '$cPerCodigo'  , $nPerMailItem, '$cPerMail' )  ; ";
			$this->execute_query();
			$data = $this->rows ;
			return $data;
		}
}

?>