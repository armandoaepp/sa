<?php
# funcition general para insertar una transaccion
	function Insertar_Transaccion($nOpeCodigo = 0 , $cTraDescripcion ,$cComputerName ){
		# cargamos el bean
		$objBeanTransaccion = new Bean_transaccion() ;
		$objBeanTransaccion->setnOpeCodigo($nOpeCodigo) ;
		$objBeanTransaccion->setcPerCodigo($_SESSION['S_usuario'] ) ;
		$objBeanTransaccion->setcComputer($cComputerName) ;
		$objBeanTransaccion->setcTraDescripcion($cTraDescripcion) ;
		# llamamos a la calse transaccion
		$objTransaccion = new ClsTransaccion() ;
		$objTransaccion->Ins_Transaccion( $objBeanTransaccion) ;

	}
?>