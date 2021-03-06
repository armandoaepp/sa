<?php
/* Clase Generada desde PlaneaTec-PHP - Creado por @armandaepp */
class ClsParParametro extends ClsConexion {

	# CONSTRUCTOR
	function ClsParParametro($cnx  = null  )
	{
			$this->conn = $cnx;
	}


	# Filtrar ParParametro por nParCodigo
	public function Filtrar_ParParametro_by_nParCodigos($bean_parparametro)
	{
		$nOriReg       = $bean_parparametro->getnOriRegistros() ;
		$nCanReg       = $bean_parparametro->getnNumRegMostrar() ;
		$nPagRegistro  = $bean_parparametro->getnPagRegistro() ;
		$nParSrcCodigo = $bean_parparametro->getnParSrcCodigo();
		$nParSrcClase  = $bean_parparametro->getnParSrcClase();
		$nParDstCodigo = $bean_parparametro->getnParDstCodigo();
		$nParDstClase  = $bean_parparametro->getnParDstClase();

		// return "CALL usp_Filtrar_ParParametro_by_nParCodigos($nOriReg , $nCanReg , $nPagRegistro ,$nParSrcCodigo,'$nParSrcClase','$nParDstCodigo','$nParDstClase')";
		$this->query = "CALL usp_Filtrar_ParParametro_by_nParCodigos($nOriReg , $nCanReg , $nPagRegistro ,$nParSrcCodigo,$nParSrcClase,$nParDstCodigo,$nParDstClase)";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}

# Método Insertar
	public function Set_ParParametro($bean_parparametro)
	{
		$nParSrcCodigo = $bean_parparametro->getnParSrcCodigo();
		$nParSrcClase = $bean_parparametro->getnParSrcClase();
		$nParDstCodigo = $bean_parparametro->getnParDstCodigo();
		$nParDstClase = $bean_parparametro->getnParDstClase();
		$cValor = $bean_parparametro->getcValor();
		// $nParParEstado = $bean_parparametro->getnParParEstado();

		$this->query = "CALL usp_Set_ParParametro($nParSrcCodigo, $nParSrcClase, $nParDstCodigo, $nParDstClase, '$cValor')";
		$this->execute_query();
		$data = $this->rows ;
		return $data;

	}
# Método Actualizar
	public function Upd_parparametro($bean_parparametro)
	{
		$nParSrcCodigo = $bean_parparametro->getnParSrcCodigo();
		$nParSrcClase = $bean_parparametro->getnParSrcClase();
		$nParDstCodigo = $bean_parparametro->getnParDstCodigo();
		$nParDstClase = $bean_parparametro->getnParDstClase();
		$cValor = $bean_parparametro->getcValor();
		$nParParEstado = $bean_parparametro->getnParParEstado();

		$this->query = "CALL usp_Upd_parparametro('$nParSrcCodigo','$nParSrcClase','$nParDstCodigo','$nParDstClase','$cValor','$nParParEstado')";
		$this->execute_query();
		$data = $this->rows ;

	}
# Método Eliminar(Actualizar Estado)
	public function Upd_parparametro_Estado($bean_parparametro)
	{
		$nParSrcCodigo = $bean_parparametro->getnParSrcCodigo();
		$nParParEstado = $bean_parparametro->getnParParEstado();

		$this->query = "CALL usp_Set_parparametro('$nParSrcCodigo','$nParParEstado')";
		$this->execute_query();
		$data = $this->rows ;
	}
# Método Buscar por ID
	public function Get_parparametro_by_nParSrcCodigo($bean_parparametro)
	{
		$nParSrcCodigo = $bean_parparametro->getnParSrcCodigo();

		$this->query = "CALL usp_Set_parparametro('$nParSrcCodigo')";
		$this->execute_query();
		$data = $this->rows ;
	}
}
?>