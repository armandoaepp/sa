<?php
# funcition general para insertar una transaccion
	function Insertar_Transaccion($nOpeCodigo = 0 , $cTraDescripcion ,$cComputerName ){
		# cargamos el bean
		$bean_transaccion = new Bean_transaccion() ;
		$bean_transaccion->setnOpeCodigo($nOpeCodigo) ;
		$bean_transaccion->setcPerCodigo($_SESSION['S_usuario'] ) ;
		$bean_transaccion->setcComputer($cComputerName) ;
		$bean_transaccion->setcTraDescripcion($cTraDescripcion) ;
		# llamamos a la calse transaccion
		$objTransaccion = new ClsTransaccion() ;
		$objTransaccion->Ins_Transaccion( $bean_transaccion) ;

	}
?>