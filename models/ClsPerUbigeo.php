<?php

Class ClsPerUbigeo extends ClsConexion
{
	# INSERTAR
	function Set_PerUbigeo($bean_perubigeo){

		$cPerCodigo    = $bean_perubigeo->getcPerCodigo() ;
		$nPerUbiCodigo = $bean_perubigeo->getnPerUbiCodigo() ;
		$cPerUbiGlosa  = $bean_perubigeo->getcPerUbiGlosa() ;
		// $nPerUbiEstado = $bean_perubigeo->getnPerUbiEstado() ;

		$this->query = "Call usp_Set_PerUbigeo('$cPerCodigo', $nPerUbiCodigo , '$cPerUbiGlosa')";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}

	# ACTUALIZAR
	function Upd_PerUbigeo($bean_perubigeo){

		$cPerCodigo       = $bean_perubigeo->getcPerCodigo() ;
		$nPerUbiCodigo    = $bean_perubigeo->getnPerUbiCodigo() ;
		$cPerUbiGlosa     = $bean_perubigeo->getcPerUbiGlosa() ;
		$nPerUbiCodigoNew = $bean_perubigeo->getnPerUbiCodigoNew() ;

		// return "Call usp_Upd_PerUbigeo('$cPerCodigo', $nPerUbiCodigo , '$cPerUbiGlosa', $nPerUbiCodigoNew)";
		$this->query = "Call usp_Upd_PerUbigeo('$cPerCodigo', $nPerUbiCodigo , '$cPerUbiGlosa', $nPerUbiCodigoNew)";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}


}



