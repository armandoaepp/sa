<?php
class ClsParcela extends ClsConexion
{
	# Funcion para seleccionar Provincias por departamentos
		function Get_Parcelas_by_cPerCodigo($bean_parametro ,$bean_perparametro   )
		{
			$nOriReg         = $bean_parametro->getnOriRegistros() ;
			$nCanReg         = $bean_parametro->getnNumRegMostrar() ;
			$nPagRegistro    = $bean_parametro->getnPagRegistro() ;
			$cParNombre      = $bean_parametro->getcParNombre() ;
			$cParDescripcion = $bean_parametro->getcParDescripcion() ;
			$cPerCodigo      = $bean_perparametro->getcPerCodigo() ;

			// return "CALL usp_Get_Parcelas_by_cPerCodigo($nOriReg , $nCanReg , $nPagRegistro , '$cParNombre', '$cParDescripcion'  ,'$cPerCodigo')  ; ";
			$this->query = "CALL usp_Get_Parcelas_by_cPerCodigo($nOriReg , $nCanReg , $nPagRegistro , '$cParNombre', '$cParDescripcion'  ,'$cPerCodigo')  ; ";
			$this->execute_query();
			$data = $this->rows ;
			return $data;
		}

		# Funcion para seleccionar Provincias por departamentos
		function Get_Sectores_by_nCasCodigo($bean_caserio )
		{
			$nCasCodigo = $bean_caserio->getnCasCodigo() ;
			$this->query = "CALL usp_Get_Sectores_by_nCasCodigo( $nCasCodigo)  ; ";
			$this->execute_query();
			$data = $this->rows ;
			return $data;
		}
}

?>