<?php
	/*
		Autor			:	ARMANDO ENRIQUE PISFIL PUEMAPE
	  	Fecha			:	28/12/2013
	  	Clase			:	ClsParametro_Dat
		Estado			:	OK
	*/

	Class ClsParametro extends ClsConexion
	{

		#  FUNCIÓN PARA FILTRAR PARAMETRO
			function Filtrar_Parametro($bean_parametro)
			{
				$nOriReg         = $bean_parametro->getnOriRegistros() ;
				$nCanReg         = $bean_parametro->getnNumRegMostrar() ;
				$nPagRegistro    = $bean_parametro->getnPagRegistro() ;
				$nParClase       = $bean_parametro->getnParClase() ;
				$cParNombre      = $bean_parametro->getcParNombre() ;
				$cParDescripcion = $bean_parametro->getcParDescripcion() ;

				$this->query="Call usp_Filtrar_Parametro($nOriReg, $nCanReg, $nPagRegistro, '$cParNombre', '$cParDescripcion', $nParClase)";
				$this->execute_query();
				$data = $this->rows ;
				return $data;
			}
		# INSERTAR
			function Set_Parametro($bean_parametro ) {
				$nParClase       = $bean_parametro->getnParClase() ;
				$cParNombre      = $bean_parametro->getcParNombre() ;
				$cParDescripcion = $bean_parametro->getcParDescripcion() ;

				$this->query="Call usp_Set_Parametro($nParClase, '$cParNombre', '$cParDescripcion' )";
				$this->execute_query();
				$data = $this->rows ;
				return $data;
			}
		# INSERTAR PARAMETRO SIN GENERAR CODIGO
			function Ins_Parametro($bean_parametro ) {
				$nParCodigo      = $bean_parametro->getnParCodigo() ;
				$nParClase       = $bean_parametro->getnParClase() ;
				$cParNombre      = $bean_parametro->getcParNombre() ;
				$cParDescripcion = $bean_parametro->getcParDescripcion() ;

				$this->query="Call usp_Ins_Parametro($nParCodigo , $nParClase, '$cParNombre', '$cParDescripcion' )";
				$this->execute_query();
				$data = $this->rows ;
				return $data;
			}

		# Filtrar un parametro
			function Get_Parametro_By_Todos($bean_parametro ) {
				$nParCodigo      = $bean_parametro->getnParCodigo() ;
				$nParClase       = $bean_parametro->getnParClase() ;
				$cParJerarquia   = $bean_parametro->getcParJerarquia() ;
				$cParNombre      = $bean_parametro->getcParNombre() ;
				$cParDescripcion = $bean_parametro->getcParDescripcion() ;
				$nParEstado        = $bean_parametro->getnParEstado() ;

				$this->query="Call usp_Get_Parametro_By_Todos($nParCodigo, $nParClase, '$cParJerarquia' , '$cParNombre', '$cParDescripcion' , $nParEstado )";
				$this->execute_query();
				$data = $this->rows ;
				return $data;
			}
		# SELECCIONAR EL PARAMETRO PADRE (RAIZ) DE UNA DETERMINADA CLASE
			function Get_Parametro_Padre_nParClase($objParametroBean )
			{
				$nParClase       = $objParametroBean->getnParClase() ;
				$this->query="Call usp_Get_Parametro_Padre_nParClase($nParClase)";
				$this->execute_query();
				$data = $this->rows ;
				return $data;

			}

		#Función para validar parametro por descripcion
			function Validar_Parametro($bean_parametro)
			{
				$nParClase       = $bean_parametro->getnParClase() ;
				$cParNombre      = $bean_parametro->getcParNombre() ;
				$cParDescripcion = $bean_parametro->getcParDescripcion() ;

				$this->query = "Call usp_Validar_Parametro($nParClase, '$cParNombre', '$cParDescripcion')";
				$this->execute_query();
				$data = $this->rows ;
				return $data;
			}

		#Función para validar parametro por descripcion o cParNombre y que sea diferente del nParCodigo
			function Validar_Parametro_Upd($bean_parametro)
			{
				$nParCodigo      = $bean_parametro->getnParCodigo() ;
				$nParClase       = $bean_parametro->getnParClase() ;
				$cParNombre      = $bean_parametro->getcParNombre() ;
				$cParDescripcion = $bean_parametro->getcParDescripcion() ;

				$this->query = "Call usp_Validar_Parametro_Upd($nParCodigo, $nParClase, '$cParNombre', '$cParDescripcion')";
				$this->execute_query();
				$data = $this->rows ;
				return $data;
			}

		#Buscar un parametro por Clase y codigo
			function Buscar_Parametro($bean_parametro)
			{
				$nParCodigo      = $bean_parametro->getnParCodigo() ;
				$nParClase       = $bean_parametro->getnParClase() ;

				$this->query = "Call usp_Buscar_Parametro($nParCodigo  , $nParClase )";
				$this->execute_query();
				$data = $this->rows ;
				return $data;
				// return $this->query ;
			}

		#Buscar un parametro por Clase
			function Get_Parametro_By_cParClase($bean_parametro)
			{
				// $nParCodigo      = $bean_parametro->getnParCodigo() ;
				$nParClase       = $bean_parametro->getnParClase() ;

				$this->query = "Call usp_Get_Parametro_By_cParClase( $nParClase )";
				$this->execute_query();
				$data = $this->rows ;
				return $data;
				// return $this->query ;
			}


		# actualizar parametro
			function Upd_Parametro($bean_parametro )
			{
				$nParCodigo      = $bean_parametro->getnParCodigo() ;
				$nParClase       = $bean_parametro->getnParClase() ;
				$cParNombre      = $bean_parametro->getcParNombre() ;
				$cParDescripcion = $bean_parametro->getcParDescripcion() ;

				$this->query = "Call usp_Upd_Parametro($nParCodigo, $nParClase,  '$cParNombre', '$cParDescripcion' )";
				$this->execute_query();
				$data = $this->rows ;
				return $data;
			}
		# Función para eliminar parametro enviando codigo y clase =========
			function Upd_Parametro_Estado($bean_parametro)
			{
				$nParCodigo = $bean_parametro->getnParCodigo() ;
				$nParClase  = $bean_parametro->getnParClase() ;
				$nParEstado   = $bean_parametro->getnParEstado() ;
				$this->query = "Call usp_Upd_Parametro_Estado($nParCodigo, $nParClase ,  $nParEstado)";
				$this->execute_query();
				$data = $this->rows ;
				return $data;
			}

		# actualizar parametro y jerarquia
			function Upd_Parametro_and_cParJerarquia($bean_parametro )
			{
				$nParCodigo      = $bean_parametro->getnParCodigo() ;
				$nParClase       = $bean_parametro->getnParClase() ;
				$cParJerarquia   = $bean_parametro->getcParJerarquia() ;
				$cParNombre      = $bean_parametro->getcParNombre() ;
				$cParDescripcion = $bean_parametro->getcParDescripcion() ;

				$this->query = "Call usp_Upd_Parametro_and_cParJerarquia($nParCodigo, $nParClase, '$cParJerarquia' ,  '$cParNombre', '$cParDescripcion' )";
				$this->execute_query();
				$data = $this->rows ;
				return $data;
			}


		# Función para eliminar parametro enviando codigo y clase =========
			function Get_Parametro_cParDesc_by_cParJeranquia($bean_parametro)
			{
				$nParClase       = $bean_parametro->getnParClase() ;
				$cParJerarquia   = $bean_parametro->getcParJerarquia() ;
				$cParDescripcion = $bean_parametro->getcParDescripcion() ;

				// return "Call usp_Get_Parametro_cParDesc_by_cParJeranquia( $nParClase ,'$cParJerarquia' ,  '$cParDescripcion')";
				$this->query = "Call usp_Get_Parametro_cParDesc_by_cParJeranquia( $nParClase ,'$cParJerarquia' ,  '$cParDescripcion')";
				$this->execute_query();
				$data = $this->rows ;
				return $data;
			}


	}
?>