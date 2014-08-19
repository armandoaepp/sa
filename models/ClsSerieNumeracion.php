<?php

Class ClsSerieNumeracion extends ClsConexion
{
	# CONSTRUCTOR
	function ClsSerieNumeracion($cnx  = null  )
	{
			$this->conn = $cnx;
	}
	#EXTRAER UN PARAMETRO POR nParClase que este relacionada
	# con cPerCodigo(codigo de la empresa)
	function Get_Parametro_by_cPerJuridica($bean_parametro)
	{
		$nParClase       = $bean_parametro->getnParClase() ;
		$cPerJuridica = $bean_parametro->getcParJerarquia() ;

		$this->query="Call usp_Get_Parametro_by_cPerJuridica('$nParClase','$cPerJuridica')";
		$this->execute_query();
		$data = $this->rows ;
		return $data;

	}
	# filtra la numeracion por empresa :D
	function Filtrar_SerieNumeracion($bean_ctactenumeracion, $bean_parparext)
	{
		$nOriRegistros  = $bean_ctactenumeracion->getnOriRegistros() ;
		$nNumRegMostrar = $bean_ctactenumeracion->getnNumRegMostrar() ;
		$nPagRegistro   = $bean_ctactenumeracion->getnPagRegistro() ; # que no pagine
		$nParSrcCodigo  = $bean_parparext->getnParSrcCodigo();
		$nParSrcClase   = $bean_parparext->getnParSrcClase();
		$nParDstCodigo  = $bean_parparext->getnParDstCodigo();
		$nParDstClase   = $bean_parparext->getnParDstClase();
		$nObjCodigo  = $bean_parparext->getnObjCodigo();
		$nObjClase  	= $bean_parparext->getnObjTipo();
		$cPerJuridica 	= $bean_ctactenumeracion->getcPerJuridica() ;

		$this->query= "Call usp_Filtrar_SerieNumeracion($nOriRegistros, $nNumRegMostrar, $nPagRegistro, $nParSrcCodigo, $nParSrcClase, $nParDstCodigo, $nParDstClase, $nObjCodigo, $nObjClase, '$cPerJuridica')";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}

}



