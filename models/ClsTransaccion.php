<?php
	/*
		Autor			:	ARMANDO ENRIQUE PISFIL PUEMAPE
	  	Fecha			:	28/12/2013
	  	Clase			:	ClsParametro_Dat
		Estado			:	OK
	*/

	Class ClsTransaccion extends ClsConexion
	{
		# CONSTRUCTOR
	function ClsTransaccion($cnx  = null  )
	{
			$this->conn = $cnx;
	}

		# FUNCION PARA INSERTAR UN TRANSACION HECHA POR UN USUARIO
		// function Insertar_Transaccion($nOpeCodigo,$nPerCodigo,$cTraDescripcion,$cComputerName )
		function Set_Transaccion( $objBeanTransaccion)
		{
			$nOpeCodigo      = $objBeanTransaccion->getnOpeCodigo();
			$nPerCodigo      = $objBeanTransaccion->getcPerCodigo();
			$cComputerName   = $objBeanTransaccion->getcComputer();
			$cTraDescripcion = $objBeanTransaccion->getcTraDescripcion();

			$this->query="Call usp_Set_Transaccion($nOpeCodigo,$nPerCodigo,'$cComputerName','$cTraDescripcion')";
			$this->execute_single_query();
			return true;
		}



	}
?>