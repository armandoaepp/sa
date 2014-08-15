<?php
/* Clase Generada desde PlaneaTec-PHP - Creado por @armandaepp */
class ClsParParExt extends ClsConexion {

# CONSTRUCTOR
	function ClsParParExt($cnx  = null  )
	{
			$this->conn = $cnx;
	}

# Método Insertar
	public function Set_ParParExt($bean_parparext)
	{
		$nParSrcCodigo   = $bean_parparext->getnParSrcCodigo();
		$nParSrcClase    = $bean_parparext->getnParSrcClase();
		$nParDstCodigo   = $bean_parparext->getnParDstCodigo();
		$nParDstClase    = $bean_parparext->getnParDstClase();
		$nObjCodigo      = $bean_parparext->getnObjCodigo();
		$nObjTipo        = $bean_parparext->getnObjTipo();
		$cParParExtValor = $bean_parparext->getcParParExtValor();
		$cParParExtGlosa = $bean_parparext->getcParParExtGlosa();

		$this->query = "CALL usp_Set_ParParExt($nParSrcCodigo, $nParSrcClase, $nParDstCodigo, $nParDstClase, $nObjCodigo, $nObjTipo, '$cParParExtValor','$cParParExtGlosa')";
		$this->execute_query();
		$data = $this->rows ;
		return $data;

	}
# Método Actualizar
	public function Upd_parparext($bean_parparext)
	{
		$nParSrcCodigo   = $bean_parparext->getnParSrcCodigo();
		$nParSrcClase    = $bean_parparext->getnParSrcClase();
		$nParDstCodigo   = $bean_parparext->getnParDstCodigo();
		$nParDstClase    = $bean_parparext->getnParDstClase();
		$nObjCodigo      = $bean_parparext->getnObjCodigo();
		$nObjTipo        = $bean_parparext->getnObjTipo();
		$cParParExtValor = $bean_parparext->getcParParExtValor();
		$cParParExtGlosa = $bean_parparext->getcParParExtGlosa();

		$this->query = "CALL usp_Upd_parparext('$nParSrcCodigo','$nParSrcClase','$nParDstCodigo','$nParDstClase','$nObjCodigo','$nObjTipo','$cParParExtValor','$cParParExtGlosa')";
		$this->execute_query();
		$data = $this->rows ;

	}
# Método Eliminar(Actualizar Estado)
	public function Upd_parparext_Estado($bean_parparext)
	{
		$nParSrcCodigo   = $bean_parparext->getnParSrcCodigo();
		$cParParExtGlosa = $bean_parparext->getcParParExtGlosa();

		$this->query = "CALL usp_Set_parparext('$nParSrcCodigo','$cParParExtGlosa')";
		$this->execute_query();
		$data = $this->rows ;
	}
# Método Buscar por ID
	public function Get_parparext_by_nParSrcCodigo($bean_parparext)
	{
		$nParSrcCodigo = $bean_parparext->getnParSrcCodigo();

		$this->query = "CALL usp_Set_parparext('$nParSrcCodigo')";
		$this->execute_query();
		$data = $this->rows ;
	}
}
?>