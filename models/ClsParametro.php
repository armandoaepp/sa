<?php
	/*
		Autor			:	ARMANDO ENRIQUE PISFIL PUEMAPE
	  	Fecha			:	15/08/2014
	  	Clase			:	ClsParametro
		Estado			:	OK
		twitter			: 	@armandoaepp
	*/

	Class ClsParametro extends ClsConexion
	{
		# CONSTRUCTOR
			function ClsParametro($cnx  = null  )
			{
					$this->conn = $cnx;
			}
		#  FUNCIÓN PARA FILTRAR PARAMETRO
			function Filtrar_Parametro($bean_parametro)
			{
				$nOriReg         = $bean_parametro->getnOriRegistros() ;
				$nCanReg         = $bean_parametro->getnNumRegMostrar() ;
				$nPagRegistro    = $bean_parametro->getnPagRegistro() ;
				$nParClase       = $bean_parametro->getnParClase() ;
				$cParNombre      = $bean_parametro->getcParNombre() ;
				$cParDescripcion = $bean_parametro->getcParDescripcion() ;

				// return "Call usp_Filtrar_Parametro($nOriReg, $nCanReg, $nPagRegistro, $nParClase, '$cParNombre', '$cParDescripcion')";
				$this->query="Call usp_Filtrar_Parametro($nOriReg, $nCanReg, $nPagRegistro, $nParClase, '$cParNombre', '$cParDescripcion')";
				$this->execute_query();
				$data = $this->rows ;
				return $data;
			}

		# INSERTAR
			function Set_Parametro($bean_parametro )
			{
				$nParClase       = $bean_parametro->getnParClase() ;
				$cParNombre      = $bean_parametro->getcParNombre() ;
				$cParDescripcion = $bean_parametro->getcParDescripcion() ;

				$this->query="Call usp_Set_Parametro($nParClase, '$cParNombre', '$cParDescripcion' )";
				$this->execute_query();
				$data = $this->rows ;
				return $data;
			}
		# INSERTAR PARAMETRO SIN GENERAR CODIGO
			function Ins_Parametro($bean_parametro )
			{
				$nParCodigo      = $bean_parametro->getnParCodigo() ;
				$nParClase       = $bean_parametro->getnParClase() ;
				$cParNombre      = $bean_parametro->getcParNombre() ;
				$cParDescripcion = $bean_parametro->getcParDescripcion() ;

				$this->query="Call usp_Ins_Parametro($nParCodigo , $nParClase, '$cParNombre', '$cParDescripcion' )";
				$this->execute_query();
				$data = $this->rows ;
				return $data;
			}

		# INSERTAR UN PARAMETRO CON nParCodigo generado
			function Set_Parametro_nParCodigo($bean_parametro)
			{
				$nParClase       = $bean_parametro->getnParClase() ;
				$cParJerarquia   = $bean_parametro->getcParJerarquia() ;
				$cParNombre      = $bean_parametro->getcParNombre() ;
				$cParDescripcion = $bean_parametro->getcParDescripcion() ;

				$this->query = "Call usp_Set_Parametro_nParCodigo( $nParClase ,'$cParJerarquia' ,  '$cParNombre', '$cParDescripcion' )";
				$this->execute_query();
				$data = $this->rows ;
				return $data;
			}

		# INSERTAR un parametro enviado todos los parametros
			function Set_Parametro_All($bean_parametro )
			{
				$nParCodigo      = $bean_parametro->getnParCodigo() ;
				$nParClase       = $bean_parametro->getnParClase() ;
				$cParJerarquia   = $bean_parametro->getcParJerarquia() ;
				$cParNombre      = $bean_parametro->getcParNombre() ;
				$cParDescripcion = $bean_parametro->getcParDescripcion() ;

				$this->query="Call usp_Set_Parametro_All($nParCodigo, $nParClase, '$cParJerarquia', '$cParNombre', '$cParDescripcion' )";
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

		# SELECCIONAR EL PARAMETRO PADRE (RAIZ) DE UNA DETERMINADA CLASE 0_0
			function Get_Parametro_Padre_nParClase($objParametroBean )
			{
				$nParClase       = $objParametroBean->getnParClase() ;
				$this->query="Call usp_Get_Parametro_Padre_nParClase($nParClase)";
				$this->execute_query();
				$data = $this->rows ;
				return $data;

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

		# Función para extraer un paramentro por clase Jerarquia y cParDescripcion(opcional ) - se cambio -> Get_Parametro_cParDesc_by_cParJeranquia
			function Get_Parametro_by_cPar_Desc_Jeranquia($bean_parametro)
			{
				$nParClase       = $bean_parametro->getnParClase() ;
				$cParJerarquia   = $bean_parametro->getcParJerarquia() ;
				$cParDescripcion = $bean_parametro->getcParDescripcion() ;

				// return "Call usp_Get_Parametro_by_cParDesc_cParJeranquia( $nParClase ,'$cParJerarquia' ,  '$cParDescripcion')";
				$this->query = "Call usp_Get_Parametro_by_cPar_Desc_Jeranquia( $nParClase ,'$cParJerarquia' ,  '$cParDescripcion')";
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

		#VALIDAR cParDescripcion QUE NO EXITA PARA UN  nParCodigo DIFERENTE AL QUE SE ENVIA Y QUE PERTENSCA  A LA MISMA cParJerarquia
			function Validar_Parametro_by_cPar_Desc_Jera_Upd($bean_parametro)
			{
				$nParCodigo      = $bean_parametro->getnParCodigo() ;
				$nParClase       = $bean_parametro->getnParClase() ;
				$cParJerarquia   = $bean_parametro->getcParJerarquia() ;
				$cParDescripcion = $bean_parametro->getcParDescripcion() ;

				$this->query = "Call usp_Validar_Parametro_by_cPar_Desc_Jera_Upd($nParCodigo, $nParClase, '$cParJerarquia', '$cParDescripcion')";
				$this->execute_query();
				$data = $this->rows ;
				return $data;
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
	}