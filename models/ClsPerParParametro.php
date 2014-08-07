<?php

Class ClsPerParParametro extends ClsConexion
{
	#Funcion para cargar las provincias
	function Set_PerParParametro($bean_perparparametro)
	{
		$cPerCodigo    = $bean_perparparametro->getcPerCodigo();
		$nParSrcCodigo = $bean_perparparametro->getnParSrcCodigo();
		$nParSrcClase  = $bean_perparparametro->getnParSrcClase();
		$nParDstCodigo = $bean_perparparametro->getnParDstCodigo();
		$nParDstClase  = $bean_perparparametro->getnParDstClase();
		$cParParValor  = $bean_perparparametro->getcParParValor();
		$cParParGlosa  = $bean_perparparametro->getcParParGlosa();

		$this->query = "Call usp_Set_PerParParametro('$cPerCodigo', $nParSrcCodigo, $nParSrcClase, $nParDstCodigo, $nParDstClase, '$cParParValor', '$cParParGlosa')";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}
}



