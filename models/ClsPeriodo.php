<?php
/*
	Autor			:	Armando Pisfil Puemape -> @armandoaepp
  	Fecha			:	19/07/2014
  	Clase			:	ClsPeriodo_Dat
	Institucion		:	PlaneaTec
	Estado			:	Desarrollo
*/
	Class ClsPeriodo extends ClsConexion{
		# CONSTRUCTOR
	function ClsPeriodo($cnx  = null  )
	{
			$this->conn = $cnx;
	}

	# function Get_Sel_Periodos($nOriReg, $nCanReg,  $nPagRegistro,  $cPrdDescripcion="-")
		function Get_Sel_Periodos($bean_periodo)
		{
			$nOriReg         = $bean_periodo->getnOriRegistros() ;
			$nCanReg         = $bean_periodo->getnNumRegMostrar() ;
			$nPagRegistro    = $bean_periodo->getnPagRegistro() ;
			$cPrdDescripcion = $bean_periodo->getcPrdDescripcion() ;

			$this->query="Call usp_Get_Sel_Periodos($nOriReg, $nCanReg, $nPagRegistro,'$cPrdDescripcion') ;";
			$this->execute_query();
			$data = $this->rows ;
			return $data;
		}
	# EXTRAER PERIODO ACTIVO
		function Get_Periodo_Activo()
		{
			$this->query="call ups_Get_Periodo_Activo() ;";
			$this->execute_query();
			$data = $this->rows ;
			return $data;
		}

    # INSERTA PERIODO
		function Set_Periodo($bean_periodo)
		{
			// $nPrdCodigo      = $bean_periodo->getnPrdCodigo();
			$cPrdDescripcion = $bean_periodo->getcPrdDescripcion();
			$dPrdFecInic     = $bean_periodo->getdPrdFecInic();
			$dPrdFecFin      = $bean_periodo->getdPrdFecFin();
			$nPrdTipo        = $bean_periodo->getnPrdTipo();
			$nPrdEstado      = $bean_periodo->getnPrdEstado();

			// return "CALL usp_Set_Periodo('$cPrdDescripcion' ,  '$dPrdFecInic' ,  '$dPrdFecFin' , $nPrdTipo ,$nPrdEstado) ;";
			$this->query="call usp_Set_Periodo('$cPrdDescripcion' ,  '$dPrdFecInic' ,  '$dPrdFecFin' , $nPrdTipo ,$nPrdEstado) ;";
			$this->execute_query();
			$data = $this->rows ;
			return $data;
		}
	 # UPDATE PERIODO
		function Upd_Periodo($bean_periodo)
		{
			$nPrdCodigo 	 = $bean_periodo->getnPrdCodigo();
			$cPrdDescripcion = $bean_periodo->getcPrdDescripcion();
			$dPrdFecInic     = $bean_periodo->getdPrdFecInic();
			$dPrdFecFin      = $bean_periodo->getdPrdFecFin();
			$nPrdTipo        = $bean_periodo->getnPrdTipo();
			// $nPrdEstado      = $bean_periodo->getnPrdEstado();

			$this->query="call usp_Upd_Periodo($nPrdCodigo , '$cPrdDescripcion' , '$dPrdFecInic' , '$dPrdFecFin', $nPrdTipo ) ;";
			$this->execute_query();
			$data = $this->rows ;
			return $data;

			# return "call usp_Upd_Periodo($nPrdCodigo , '$cPrdDescripcion' , '$dPrdFecInic' , '$dPrdFecFin', $nPrdTipo ) ;";

		}
	# ELIMINAR PERIODO
		function Upd_Periodo_Estado( $bean_periodo )
		{
			$nPrdCodigo 	 = $bean_periodo->getnPrdCodigo();
			$nPrdEstado      = $bean_periodo->getnPrdEstado();

			$this->query="call usp_Upd_Periodo_Estado($nPrdCodigo, $nPrdEstado );";
			$this->execute_query();
			$data = $this->rows ;
			return $data;
		}

	function Validar_Periodo ($bean_periodo )
	{
		$nPrdCodigo      = $bean_periodo->getnPrdCodigo();
		$cPrdDescripcion = $bean_periodo->getcPrdDescripcion();
		$dPrdFecInic     = $bean_periodo->getdPrdFecInic();
		$dPrdFecFin      = $bean_periodo->getdPrdFecFin();
		// $nPrdTipo        = $bean_periodo->getnPrdTipo();
		// $nPrdEstado      = $bean_periodo->getnPrdEstado();

		$this->query="call usp_Validar_Periodo($nPrdCodigo , '$cPrdDescripcion' ,  '$dPrdFecInic' ,  '$dPrdFecFin') ;";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
		// return "call usp_Get_Periodo_Validar($nPrdCodigo , '$cPrdDescripcion' ,  '$dPrdFecInic' ,  '$dPrdFecFin') ";
	}

	# Funcion que los datos de una determinada marca en base a su codigo
	function Get_Periodo_by_nPrdCodigo($nPrdCodigo)
	{
		$vConsulta="Call usp_Get_Periodo_By_nPrdCodigo($nPrdCodigo)";
		$oConexion= new ClsAcceso_Datos();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if($rs)
		{
			return $rs;
		}else{
			return false;
		}
	}

	# VALIDAR EL PERIDO POR UNA FECHA
	function Validar_Periodo_by_Fecha($bean_periodo)
	{
		$dPrdFecInic     = $bean_periodo->getdPrdFecInic();
		$nPrdTipo        = $bean_periodo->getnPrdTipo();

		$this->query="call usp_Validar_Periodo_by_Fecha('$dPrdFecInic' , $nPrdTipo) ;";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}

		# ACTUALIZAR TODOS LOS PERIODOS AL ESTADO 2: CERRADOS
	function Cerrar_Periodos()
	{
		$this->query="call usp_Cerrar_Periodos() ;";
		$this->execute_query();
		$data = $this->rows ;
		return $data;
	}


}
