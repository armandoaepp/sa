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
	# ACTUALIZAR cuando hay parametros seleccionble (Combos )
	function Upd_PerParametro_nParCodigoNew($bean_perparametro ){

		$cPerCodigo    = $bean_perparametro->getcPerCodigo() ;
		$nParCodigo    = $bean_perparametro->getnParCodigo() ;
		$nParClase     = $bean_perparametro->getnParClase() ;
		$cPerParValor  = $bean_perparametro->getcPerParValor() ;
		$cPerParGlosa  = $bean_perparametro->getcPerParGlosa() ;
		$nParCodigoNew = $bean_perparametro->getnParCodigoNew() ;

		// return "Call usp_Set_PerParametro('$cPerCodigo' , $nParCodigo , $nParClase ,  '$cPerParValor' ,  '$cPerParGlosa')";
		$this->query = "Call usp_Upd_PerParametro_nParCodigoNew('$cPerCodigo' , $nParCodigo , $nParClase ,  '$cPerParValor' ,  '$cPerParGlosa', $nParCodigoNew)";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}

	# ACTUALIZAR solomente -> cPerParValor , cPerParGlosa ;
	function Upd_PerParametro($bean_perparametro ){

		$cPerCodigo    = $bean_perparametro->getcPerCodigo() ;
		$nParCodigo    = $bean_perparametro->getnParCodigo() ;
		$nParClase     = $bean_perparametro->getnParClase() ;
		$cPerParValor  = $bean_perparametro->getcPerParValor() ;
		$cPerParGlosa  = $bean_perparametro->getcPerParGlosa() ;

		$this->query = "Call usp_Upd_PerParametro('$cPerCodigo' , $nParCodigo , $nParClase ,  '$cPerParValor' ,  '$cPerParGlosa')";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}

	# ACTUALIZAR
	function Buscar_PerParametro($bean_perparametro )
	{
		$cPerCodigo    = $bean_perparametro->getcPerCodigo() ;
		$nParCodigo    = $bean_perparametro->getnParCodigo() ;
		$nParClase     = $bean_perparametro->getnParClase() ;

		$this->query = "Call usp_Buscar_PerParametro('$cPerCodigo' , $nParCodigo , $nParClase )";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}

	# ACTUALIZAR ESTADO
	function Upd_PerParametro_Estado($bean_perparametro )
	{
		$cPerCodigo    = $bean_perparametro->getcPerCodigo() ;
		$nParCodigo    = $bean_perparametro->getnParCodigo() ;
		$nParClase     = $bean_perparametro->getnParClase() ;
		$nPerParEstado = $bean_perparametro->getnPerParEstado() ;

		$this->query = "Call usp_Upd_PerParametro_Estado('$cPerCodigo' , $nParCodigo , $nParClase , $nPerParEstado )";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}
	# EXTRAER PARAMETRO - PERPARAMETRO POR (cPerCodigo - nParCodigo)
	function Get_PerParametro_by_cPer_nPar_Codigo($bean_perparametro )
	{
		$cPerCodigo    = $bean_perparametro->getcPerCodigo() ;
		$nParClase     = $bean_perparametro->getnParClase() ;

		$this->query = "Call usp_Get_PerParametro_by_cPer_nPar_Codigo('$cPerCodigo' , $nParClase )";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}




}