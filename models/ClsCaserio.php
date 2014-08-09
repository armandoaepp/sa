<?php
class ClsCaserio extends ClsConexion
{

	# Funcion para seleccionar Provincias por departamentos
		function Get_Sel_Caserios($bean_caserio, $bean_distrito , $bean_provincia,$bean_departamento )
		{
				$nOriReg         = $bean_caserio->getnOriRegistros() ;
				$nCanReg         = $bean_caserio->getnNumRegMostrar() ;
				$nPagRegistro    = $bean_caserio->getnPagRegistro() ;
				$cDepDescripcion = $bean_departamento->getcDepDescripcion() ;
				$cProDescripcion = $bean_provincia->getcProDescripcion() ;
				$cDisDescripcion = $bean_distrito->getcDisDescripcion() ;
				$cCasDescripcion = $bean_caserio->getcCasDescripcion() ;

			// return "CALL usp_Get_Sel_Caserios($nOriReg , $nCanReg , $nPagRegistro , '$cDepDescripcion' , '$cProDescripcion' ,'$cDisDescripcion','$cCasDescripcion' )  ; ";
			$this->query ="CALL usp_Get_Sel_Caserios($nOriReg , $nCanReg , $nPagRegistro , '$cDepDescripcion' , '$cProDescripcion' ,'$cDisDescripcion','$cCasDescripcion' )  ; ";
			$this->execute_query();
			$data = $this->rows ;
			return $data;

		}


		function Set_Caserio($bean_caserio )
		{
			$cCasDescripcion = $bean_caserio->getcCasDescripcion() ;
			$nDisCodigo      = $bean_caserio->getnDisCodigo() ;

			$this->query ="CALL usp_Set_Caserio('$cCasDescripcion',$nDisCodigo)  ; ";
			$this->execute_query();
			$data = $this->rows ;
			return $data;
		}

		function Upd_Caserio($bean_caserio )
		{
			$nCasCodigo      = $bean_caserio->getnCasCodigo() ;
			$cCasDescripcion = $bean_caserio->getcCasDescripcion() ;
			$nDisCodigo      = $bean_caserio->getnDisCodigo() ;

			// return "CALL usp_Upd_Caserio($nCasCodigo , '$cCasDescripcion',$nDisCodigo)  ; ";
			$this->query ="CALL usp_Upd_Caserio($nCasCodigo , '$cCasDescripcion',$nDisCodigo)  ; ";
			$this->execute_query();
			$data = $this->rows ;
			return $data;
		}

		function Upd_Caserio_Estado($bean_caserio )
		{
			$nCasCodigo      = $bean_caserio->getnCasCodigo() ;
			$nCasEstado      = $bean_caserio->getnCasEstado() ;

			$this->query ="CALL usp_Upd_Caserio_Estado($nCasCodigo , $nCasEstado)  ; ";
			$this->execute_query();
			$data = $this->rows ;
			return $data;
		}

		function Validar_Caserio($bean_caserio )
		{
			$cCasDescripcion = $bean_caserio->getcCasDescripcion() ;
			$nDisCodigo      = $bean_caserio->getnDisCodigo() ;

			$this->query ="CALL usp_Validar_Caserio('$cCasDescripcion',$nDisCodigo)  ; ";
			$this->execute_query();
			$data = $this->rows ;
			return $data;
		}

		function Get_Caserio_by_nCasCodigo($bean_caserio )
		{
			$nCasCodigo      = $bean_caserio->getnCasCodigo() ;
			// $nCasEstado      = $bean_caserio->getnCasEstado() ;

			$this->query ="CALL usp_Get_Caserio_by_nCasCodigo($nCasCodigo )  ; ";
			$this->execute_query();
			$data = $this->rows ;
			return $data;
		}

		function Get_Caserios_by_nDisCodigo($bean_caserio )
		{
			$nDisCodigo      = $bean_caserio->getnDisCodigo() ;
			// $nDisCodigo      =	1900 ;

			 // return "CALL usp_Get_Caserios_by_nDisCodigo($nDisCodigo )  ; ";
			$this->query ="CALL usp_Get_Caserios_by_nDisCodigo($nDisCodigo )  ; ";
			$this->execute_query();
			$data = $this->rows ;
			return $data;
		}

}

?>