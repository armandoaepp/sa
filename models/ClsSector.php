<?php
class ClsSector extends ClsConexion
{
	# Funcion para seleccionar Provincias por departamentos
		function Get_Sel_Sectores($bean_parametro , $bean_caserio, $bean_distrito , $bean_provincia   )
		{
			$nOriReg         = $bean_parametro->getnOriRegistros() ;
			$nCanReg         = $bean_parametro->getnNumRegMostrar() ;
			$nPagRegistro    = $bean_parametro->getnPagRegistro() ;
			$cProDescripcion = $bean_provincia->getcProDescripcion() ;
			$cDisDescripcion = $bean_distrito->getcDisDescripcion() ;
			$cCasDescripcion = $bean_caserio->getcCasDescripcion() ;
			$cParDescSector  = $bean_parametro->getcParDescripcion() ;
			$cParNombre      = $bean_parametro->getcParNombre() ;

			// return "CALL usp_Get_Sel_Sectores($nOriReg , $nCanReg , $nPagRegistro , '$cProDescripcion' ,'$cDisDescripcion','$cCasDescripcion' , '$cParDescSector'  , '$cParNombre'  )  ; ";
			 $this->query = "CALL usp_Get_Sel_Sectores($nOriReg , $nCanReg , $nPagRegistro , '$cProDescripcion' ,'$cDisDescripcion','$cCasDescripcion' , '$cParDescSector'  , '$cParNombre'  )  ; ";
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