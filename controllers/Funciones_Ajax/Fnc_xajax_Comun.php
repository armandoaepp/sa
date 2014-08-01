<?php
	#Registro de functiones GENERALES
	$xajax->registerFunction("Combo_Parametro");
	$xajax->registerFunction("Combo_Parametro_Option");

	$xajax->registerFunction("Combo_Departamento");
	$xajax->registerFunction("Combo_Provincia");
	$xajax->registerFunction("Combo_Distrito");
	$xajax->registerFunction("Combo_Caserio");
	$xajax->registerFunction("Combo_Sector");


	/**
	 * [Combo_Departamento Cargar Combos Departamentos ]
	 * @param [integer]  $idPais      [Id de pais ]
	 * @param integer $selectedValue  [value a seleccionar por defecto]
	 * @param string  $SelectsDependiente [es un string que contiene la cadena de select recargable(Departamento-Provincia-Distrito-caserio-...) ]
	 */
	function Combo_Departamento($idPais,$selectedValue=-1 , $SelectsDependiente = "" )
	{
		$objResponse = new xajaxResponse();
		$objUbigeo = new ClsUbigeo_Dat();
		$AdoDato= $objUbigeo->Get_Departamentos_Pais($idPais);
		#LLAMOS AL GENERARDO DEL CUERPO DEL SELECT
		$cboData= SelectOption($AdoDato,"IdDepartamento","cDepartamento",$selectedValue);
		#AGREGAMOS LOS OPTION AL SELECT
		$objResponse->assign("Departamento_","innerHTML",$cboData);

		$ComboDependiente =  false ;
		$arr = explode("-", $SelectsDependiente) ;
		for ($i=0; $i < count($arr); $i++)
		{
			if($arr[$i]== "Provincia")
			{
				$ComboDependiente = true ;
				 break;
			}
		}

		if($ComboDependiente)
		{
				$objResponse->script("xajax_Combo_Provincia(xajax.$('Departamento_').value, '-1' , '".$SelectsDependiente."'  );");
		}

		return $objResponse;
	}

	function Combo_Provincia($id, $selectedValue=-1 , $SelectsDependiente = "")
	{
		$objResponse = new xajaxResponse();
		$objProvincia = new ClsProvincia();
		$bean_provinica = new Bean_provincia() ;
		$bean_provinica->setnDepCodigo($id) ;

		$AdoDato= $objProvincia->Get_Provincias_by_nDepCodigo($bean_provinica);
		#LLAMOS AL GENERARDO DEL CUERPO DEL SELECT
		$cboData= SelectOption($AdoDato,"nProCodigo","cProDescripcion",$selectedValue);
		#AGREGAMOS LOS OPTION AL SELECT
		$objResponse->assign("Provincia_","innerHTML",$cboData);

		$ComboDependiente =  false ;
		$arr = explode("-", $SelectsDependiente) ;
		for ($i=0; $i < count($arr); $i++)
		{
			if($arr[$i]== "Distrito")
			{
				$ComboDependiente = true ;
				 break;
			}
		}

		if($ComboDependiente)
		{
				$objResponse->script("xajax_Combo_Distrito(xajax.$('Provincia_').value, '-1' , '".$SelectsDependiente."'  );");
		}

		return $objResponse;
	}

	function Combo_Distrito($IdProv,$selectedValue=-1, $SelectsDependiente = "")
	{
		$objResponse = new xajaxResponse();
		$objDistrito = new ClsDistrito();
		$bean_distrito = new Bean_distrito() ;
		$bean_distrito->setnProCodigo($IdProv) ;

		$dataOption = $objDistrito->Get_Distritos_by_nProCodigo( $bean_distrito );
				 #LLAMOS AL GENERARDO DEL CUERPO DEL SELECT

		$Optiontext = "";
		$cboData = $Optiontext ;
		$cboData .= SelectOption($dataOption,"nDisCodigo","cDisDescripcion",$selectedValue);
				 #AGREGAMOS LOS OPTION AL SELECT
		$objResponse->assign("Distrito_","innerHTML",$cboData);

		$ComboDependiente =  false ;
		$arr = explode("-", $SelectsDependiente) ;
		for ($i=0; $i < count($arr); $i++)
		{
			if($arr[$i]== "Caserio")
			{
				$ComboDependiente = true ;
				 break;
			}
		}

		if($ComboDependiente)
		{
				$objResponse->script("xajax_Combo_Caserio(xajax.$('Distrito_').value ,1, '".$SelectsDependiente."' )");
		}
		return $objResponse;
	}


	function Combo_Caserio($IdDistrito = 0 , $selectedValue=-1 , $SelectsDependiente = "")
	{
		$objResponse  = new xajaxResponse();
		$objCaserio   = new ClsCaserio();
		$bean_caserio = new Bean_caserio() ;
		$bean_caserio->setnDisCodigo($IdDistrito) ;

		$dataOption = $objCaserio->Get_Caserios_by_nDisCodigo( $bean_caserio );


			#LLAMOS AL GENERARDO DEL CUERPO DEL SELECT
			$cboData = SelectOption($dataOption,"nCasCodigo","cCasDescripcion",$selectedValue);
			#AGREGAMOS LOS OPTION AL SELECT
			$objResponse->assign("Caserio_" ,"innerHTML",$cboData);

			if(count($dataOption["cuerpo"]) > 0 )
			{
				$ComboDependiente = Validar_Select_Dependiente($SelectsDependiente , "Sector") ;
				if($ComboDependiente)
				{
					$objResponse->script("xajax_Combo_Sector(xajax.$('Caserio_').value ,1, '".$SelectsDependiente."' )");
				}
			}else
			{
					$objResponse->assign("Sector_" , "innerHTML", "");
			}

		return $objResponse;
	}

	function Combo_Sector($IdCaserio = 0 , $selectedValue=-1 , $SelectsDependiente = "")
	{
		$objResponse  = new xajaxResponse();
		$objSector    = new ClsSector();
		$bean_caserio = new Bean_caserio() ;
		$bean_caserio->setnCasCodigo($IdCaserio) ;

		$dataOption = $objSector->Get_Sectores_by_nCasCodigo( $bean_caserio );

		#LLAMOS AL GENERARDO DEL CUERPO DEL SELECT
		$cboData = SelectOption($dataOption,"nParCodigo","cParDescripcion",$selectedValue);
		#AGREGAMOS LOS OPTION AL SELECT
		$objResponse->assign("Sector_" , "innerHTML", $cboData);
		return $objResponse;
	}

/**
 * [Validar_Select_Dependiente validar los combos dependiente de un padre]
 * @param [type] $SelectsDependiente [cadena que contine los combos recargable ("Provincia-Distrito-Caserio-Sector")]
 * @param string $nameSelect         [Nombre del combo dependiente ("Distrito")]
 */
	function Validar_Select_Dependiente($SelectsDependiente , $nameSelect = "")
	{
		$ComboDependiente =  false ;
		$arr = explode("-", $SelectsDependiente) ;
		for ($i=0; $i < count($arr); $i++)
		{
			if($arr[$i] == "Sector")
			{
				$ComboDependiente = true ;
				 break;
			}
		}
		return $ComboDependiente ;
	}

	/** CARGAR UN COMBO CONSULTADO DESDE LA TABLA PARAMENTRO
	 	* $IdSelect:  ID COMBO DONDE SE VA INSERTAR LOS OPTION
	 	* $nParClase : CODIGO DE LA CLASES
		* $selectedValue: VALOR QUE SELECCIONA EN ESTE CASO PARA CUANDO SE CARGA EL COMBO PARA MODIFICAR
	 */
		function Combo_Parametro($IdSelect, $nParClase, $selectedValue=-1){
			$objResponse = new xajaxResponse();
			$objUbigeo = new ClsParametro_Dat();

			$AdoDato= $objUbigeo->Seleccionar_Parametro($nParClase);

			$cboData="";
		 #LLAMOS AL GENERARDO DEL CUERPO DEL SELECT
			$cboData= SelectOption($AdoDato,"nParCodigo","cParDescripcion",$selectedValue);
		 #AGREGAMOS LOS OPTION AL SELECT
			$objResponse->assign($IdSelect,"innerHTML",$cboData);
			return $objResponse;
		}

	/** CARGAR UN COMBO CONSULTADO DESDE LA TABLA PARAMENTRO AGREGANDOLE OPTION VACIO
	 	* $IdSelect:  ID COMBO DONDE SE VA INSERTAR LOS OPTION
	 	* $nParClase : CODIGO DE LA CLASES
		* $selectedValue: VALOR QUE SELECCIONA EN ESTE CASO PARA CUANDO SE CARGA EL COMBO PARA MODIFICAR
	 */
		function Combo_Parametro_Option($IdSelect,$nParClase,$selectedValue=-1,$Optiontext="Seleccionar"){
			$objResponse = new xajaxResponse();
			$objUbigeo = new ClsParametro_Dat();

			$AdoDato= $objUbigeo->Seleccionar_Parametro($nParClase);

			$cboData="";
			$cboData.='<option value="0"> '.$Optiontext.' </option>';
		 // $cboData.='<option value="0"> '.$Optiontext.' </option>';
		 #LLAMOS AL GENERARDO DEL CUERPO DEL SELECT
			$cboData.= SelectOption($AdoDato,"nParCodigo","cParDescripcion",$selectedValue);
		 #AGREGAMOS LOS OPTION AL SELECT
			$objResponse->assign($IdSelect,"innerHTML",$cboData);
			return $objResponse;
		}



			?>