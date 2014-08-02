<?php

Class ClsPerParametro extends ClsConexion
{
	# INSERTAR
	function Set_PerParametro($bean_perparametro ){

		$cPerCodigo    = $bean_perparametro->getcPerCodigo() ;
		$nParCodigo    = $bean_perparametro->getnParCodigo() ;
		$nParClase     = $bean_perparametro->getnParClase() ;
		$cPerParValor  = $bean_perparametro->getcPerParValor() ;
		$cPerParGlosa  = $bean_perparametro->getcPerParGlosa() ;
		// $nPerParEstado = $bean_perparametro->getnPerParEstado() ;

		// return "Call usp_Set_PerParametro('$cPerCodigo' , $nParCodigo , $nParClase ,  '$cPerParValor' ,  '$cPerParGlosa')";
		$this->query = "Call usp_Set_PerParametro('$cPerCodigo' , $nParCodigo , $nParClase ,  '$cPerParValor' ,  '$cPerParGlosa')";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}
	# ACTUALIZAR
	function Upd_PerParametro($bean_perparametro ){

		$cPerCodigo    = $bean_perparametro->getcPerCodigo() ;
		$nParCodigo    = $bean_perparametro->getnParCodigo() ;
		$nParClase     = $bean_perparametro->getnParClase() ;
		$cPerParValor  = $bean_perparametro->getcPerParValor() ;
		$cPerParGlosa  = $bean_perparametro->getcPerParGlosa() ;
		$nParCodigoNew = $bean_perparametro->getnParCodigoNew() ;

		// return "Call usp_Set_PerParametro('$cPerCodigo' , $nParCodigo , $nParClase ,  '$cPerParValor' ,  '$cPerParGlosa')";
		$this->query = "Call usp_Upd_PerParametro('$cPerCodigo' , $nParCodigo , $nParClase ,  '$cPerParValor' ,  '$cPerParGlosa', $nParCodigoNew)";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}
}