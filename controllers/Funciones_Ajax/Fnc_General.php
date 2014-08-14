<?php
	# extaer el codigo de la empresa por medio del usurio en linea
	function Get_cPerCodigo_PerJuridica()
	{
		$objPerJuridica   = new ClsPerJuridica() ;
		$bean_perjuridica = new Bean_perjuridica() ;

		$bean_perjuridica->setcPerCodigo($_SESSION['S_usuario']) ;

		$data = $objPerJuridica->Get_PerJuridica_by_cPerUsuario($bean_perjuridica ) ;
		$cPerCodigo = $data["cuerpo"][0]["cPerCodigo"] ;

		return $cPerCodigo ;
	}