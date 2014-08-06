<?php

Class ClsProductor extends ClsConexion
{
	#Funcion, extraer Productores
	function Get_Productores($bean_persona , $bean_perdocumento , $bean_parametro ){


		$nOriReg       = $bean_persona->getnOriRegistros() ;
		$nCanReg       = $bean_persona->getnNumRegMostrar() ;
		$nPagRegistro  = $bean_persona->getnPagRegistro() ;
		$cPerDocNumero = $bean_perdocumento->getcPerDocNumero() ;
		$cPerApellidos = $bean_persona->getcPerApellidos() ;
		$cPerNombre    = $bean_persona->getcPerNombre() ;
		$nParCodStatus    = $bean_parametro->getnParCodigo() ; # codigo de status
		$cParDescSector   = $bean_parametro->getcParDescripcion() ; # descripcion del sector

		// return "Call usp_Get_Productores($nOriReg, $nCanReg, $nPagRegistro, '$cPerDocNumero' , '$cPerApellidos', '$cPerNombre')";
		$this->query = "Call usp_Get_Productores($nOriReg, $nCanReg, $nPagRegistro, '$cPerDocNumero' , '$cPerApellidos', '$cPerNombre',$nParCodStatus ,'$cParDescSector' )";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}

	#Funcion, extraer Productores
	function Get_Productor_by_cPerCodigo($bean_persona  )
	{
		$cPerCodigo    = $bean_persona->getcPerCodigo() ;
		// return "Call usp_Get_Productores($nOriReg, $nCanReg, $nPagRegistro, '$cPerDocNumero' , '$cPerApellidos', '$cPerNombre')";
		$this->query = "Call usp_Get_Productor_by_cPerCodigo( '$cPerCodigo')";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}


}



