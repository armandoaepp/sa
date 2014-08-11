<?php

Class ClsPerCosecha extends ClsConexion
{
	#SELECCIONAR COSECHA POR PERSONA
	function Get_PerCoseha_by_cPerCodigo($bean_percosecha)
	{

		$nOriReg      = $bean_percosecha->getnOriRegistros() ;
		$nCanReg      = $bean_percosecha->getnNumRegMostrar() ;
		$nPagRegistro = $bean_percosecha->getnPagRegistro() ;
		$cPerCodigo   = $bean_percosecha->getcPerCodigo() ;

		 // return "Call usp_ubg_Get_Distritos_by_nProCodigo('$nProCodigo')";
		$this->query = "Call usp_Get_PerCoseha_by_cPerCodigo($nOriReg, $nCanReg, $nPagRegistro, '$cPerCodigo')";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}

	#INSERTAR PERCOSECHA
	function Set_PerCosecha($bean_percosecha)
	{
		$cPerCodigo  = $bean_percosecha->getcPerCodigo() ;
		$nParcCodigo = $bean_percosecha->getnParcCodigo() ;
		$nProdCodigo = $bean_percosecha->getnProdCodigo() ;
		$nPrdCodigo  = $bean_percosecha->getnPrdCodigo() ;
		$cCosCodigo  = $bean_percosecha->getcCosCodigo() ;
		$fHectareas  = $bean_percosecha->getfHectareas() ;
		$fQuintales  = $bean_percosecha->getfQuintales() ;
		$fKilogramos = $bean_percosecha->getfKilogramos() ;
		$fHolgura    = $bean_percosecha->getfHolgura() ;
		$cGlosa      = $bean_percosecha->getcGlosa() ;

		$this->query = "Call usp_Set_PerCosecha('$cPerCodigo', $nParcCodigo, $nProdCodigo, $nPrdCodigo, '$cCosCodigo', '$fHectareas' ,'$fQuintales', '$fKilogramos', '$fHolgura', '$cGlosa')";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}

	#VALIDAR PERCOSECHA
	function Validar_PerCosecha($bean_percosecha)
	{
		$cPerCodigo  = $bean_percosecha->getcPerCodigo() ;
		$nParcCodigo = $bean_percosecha->getnParcCodigo() ;
		$nProdCodigo = $bean_percosecha->getnProdCodigo() ;
		$nPrdCodigo  = $bean_percosecha->getnPrdCodigo() ;

		$this->query = "Call usp_Validar_PerCosecha('$cPerCodigo', $nParcCodigo, $nProdCodigo, $nPrdCodigo)";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}

	#VALIDAR PERCOSECHA
	function Validar_PerCosecha_Upd($bean_percosecha)
	{
		$nPerCosCodigo = $bean_percosecha->getnPerCosCodigo() ;
		$cPerCodigo    = $bean_percosecha->getcPerCodigo() ;
		$nParcCodigo   = $bean_percosecha->getnParcCodigo() ;
		$nProdCodigo   = $bean_percosecha->getnProdCodigo() ;
		$nPrdCodigo    = $bean_percosecha->getnPrdCodigo() ;

		$this->query = "Call usp_Validar_PerCosecha_Upd($nPerCosCodigo,'$cPerCodigo', $nParcCodigo, $nProdCodigo, $nPrdCodigo)";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}

	#BUSCAR PERCOSECHA
	function Buscar_PerCosecha_by_nPerCosCodigo($bean_percosecha)
	{
		$nPerCosCodigo  = $bean_percosecha->getnPerCosCodigo() ;

		$this->query = "Call usp_Buscar_PerCosecha_by_nPerCosCodigo($nPerCosCodigo)";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}
	# ACTUALIZAR
	function Upd_PerCosecha($bean_percosecha)
	{
		$nPerCosCodigo  = $bean_percosecha->getnPerCosCodigo() ;
		$nParcCodigo = $bean_percosecha->getnParcCodigo() ;
		$nProdCodigo = $bean_percosecha->getnProdCodigo() ;
		// $nPrdCodigo  = $bean_percosecha->getnPrdCodigo() ;
		$cCosCodigo  = $bean_percosecha->getcCosCodigo() ;
		$fHectareas  = $bean_percosecha->getfHectareas() ;
		$fQuintales  = $bean_percosecha->getfQuintales() ;
		$fKilogramos = $bean_percosecha->getfKilogramos() ;
		$fHolgura    = $bean_percosecha->getfHolgura() ;

		// return "Call usp_Upd_PerCosecha($nPerCosCodigo, $nParcCodigo, $nProdCodigo,  '$cCosCodigo', '$fHectareas' ,'$fQuintales', '$fKilogramos', '$fHolgura' )";
		$this->query = "Call usp_Upd_PerCosecha($nPerCosCodigo, $nParcCodigo, $nProdCodigo,  '$cCosCodigo', '$fHectareas' ,'$fQuintales', '$fKilogramos', '$fHolgura' )";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}

	# ELIMINAR
	function Upd_PerCosecha_Estado($bean_percosecha)
	{
		$nPerCosCodigo = $bean_percosecha->getnPerCosCodigo() ;
		$nPerCosEstado = $bean_percosecha->getnPerCosEstado() ;

		$this->query = "Call usp_Upd_PerCosecha_Estado($nPerCosCodigo, $nPerCosEstado )";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}



}



