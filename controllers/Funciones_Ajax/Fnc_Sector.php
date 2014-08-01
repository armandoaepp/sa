<?php

		$xajax->registerFunction("Listar_Sectores");
		$xajax->registerFunction("Filtrar_Sector");
		$xajax->registerFunction("Nuevo_Sector");
		$xajax->registerFunction("Insertar_Sector");
		$xajax->registerFunction("Editar_Sector");
		$xajax->registerFunction("Actualizar_Sector");
		$xajax->registerFunction("Eliminar_Sector");
		$xajax->registerFunction("ConfEliminar_Sector");
		$xajax->registerFunction("Cerrar_Sector");
		$xajax->registerFunction("ConfCerrar_Sector");
		$xajax->registerFunction("Rpt_Sector_Pdf");

	# LISTAR
		function Listar_Sectores($nOriRegistros, $nNumRegMostrar, $nPagRegistro, $nPagAct)
		{
			    	$objResponse = new xajaxResponse();

			   		$FuncionSearch = 'xajax_Filtrar_Sector('.$nOriRegistros.', '.$nNumRegMostrar.', '.$nPagRegistro.', '.$nPagAct.',  xajax.getFormValues(FrmPrincipal) );';
					$FuncionEnter = ' if(event.keyCode == 13 ){'.$FuncionSearch.'} ; if( (jq(this).val()).length  == 0){	'.$FuncionSearch.' }';

					$formulario ='';
					$formulario .= '<div class="ContenedorTable">

							<table style="width:100%;">
								<tr class="title-table text-left" >
									<th  style="width: 10%;">&nbsp; CÓDIGO </th>
									<th  style="width: 20%;">&nbsp; SECTOR  </th>
									<th  style="width: 20%;">&nbsp; CASERIO </th>
									<th  style="width: 20%;">&nbsp; DISTRITO </th>
									<th  style="width: 20%;">&nbsp; Provincia </th>
								</tr>
						    	<tr class="vform">
									<td>
						    		    <input type="search" name="cParNombre_" id="cParNombre_" placeholder="Buscar Codigo"
						    		    onkeyup="'.$FuncionEnter.'"
							    		onsearch="'.$FuncionSearch.'" />
									</td>
									<td>
						    		    <input type="search" name="cSector_" id="cSector_" placeholder="Buscar Sector"
						    		    onkeyup="'.$FuncionEnter.'"
							    		onsearch="'.$FuncionSearch.'" />
									</td>
									<td>
						    		    <input type="search" name="cCaserio_" id="cCaserio_" placeholder="Buscar Caserio"
						    		    onkeyup="'.$FuncionEnter.'"
							    		onsearch="'.$FuncionSearch.'" />
									</td>
									<td>
						    		    <input type="search" name="cDistrito_" id="cDistrito_" placeholder="Buscar Distrito"
						    		    onkeyup="'.$FuncionEnter.'"
							    		onsearch="'.$FuncionSearch.'" />
									</td>
									<td>
						    		    <input type="search" name="cProvincia_" id="cProvincia_" placeholder="Buscar Distrito"
						    		    onkeyup="'.$FuncionEnter.'"
							    		onsearch="'.$FuncionSearch.'" />
									</td>
								</tr>

								<tbody id="tbodyData" class="table table-hover table-border">

								</tbody>
						    </table>
						    </div>';
				    $objResponse->assign("ContenedorPrincipal","innerHTML",$formulario);
				    $objResponse->script("xajax_Filtrar_Sector('".$nOriRegistros."', '".$nNumRegMostrar."', '".$nPagRegistro."', '".$nPagAct."',  xajax.getFormValues(FrmPrincipal) );");
				return $objResponse;
		}

	#LISTAR LOS REGISTROS DE BD
		function Filtrar_Sector($nOriRegistros, $nNumRegMostrar, $nPagRegistro, $nPagAct,$frm)
		{
			$objResponse       = new xajaxResponse();
			$objSector         = new ClsSector();
			$bean_parametro    = new Bean_parametro();
			$bean_caserio      = new Bean_caserio();
			$bean_provincia    = new Bean_provincia();
			$bean_distrito     = new Bean_distrito();
			# validaciones
				if(empty($frm["cProvincia_"]))
				{
					$cProvincia = "-";
				}else{
					$cProvincia = $frm["cProvincia_"];
				}
				if(empty($frm["cDistrito_"]))
				{
					$cDistrito = "-";
				}else{
					$cDistrito = $frm["cDistrito_"];
				}
				if(empty($frm["cCaserio_"]))
				{
					$cCaserio = "-";
				}else{
					$cCaserio = $frm["cCaserio_"];
				}
				if(empty($frm["cSector_"]))
				{
					$cSector = "-";
				}else{
					$cSector = $frm["cSector_"];
				}
				if(empty($frm["cParNombre_"]))
				{
					$cParNombre = "-";
				}else{
					$cParNombre = $frm["cParNombre_"];
				}

			$bean_parametro->setnOriRegistros($nOriRegistros) ;
			$bean_parametro->setnNumRegMostrar($nNumRegMostrar) ;
			$bean_parametro->setnPagRegistro(0) ; # que no pagine
			$bean_parametro->setcParNombre($cParNombre) ;
			$bean_parametro->setcParDescripcion($cSector) ;
			$bean_provincia->setcProDescripcion($cProvincia) ;
			$bean_distrito->setcDisDescripcion($cDistrito) ;
			$bean_caserio->setcCasDescripcion($cCaserio) ;

		    $AdoRs = $objSector->Get_Sel_Sectores($bean_parametro ,$bean_caserio, $bean_distrito , $bean_provincia );
		    // $objResponse->alert( $AdoRs ) ;
	   		//  #Capturar el número de registros
	    	$nNumRegExist = count($AdoRs["cuerpo"]);

	    	 #Filtrar registros deacuerdo al origen de datos y y viene paginados
			$bean_parametro->setnPagRegistro($nPagRegistro) ; # para que pagine

		    #Filtrar registrar
	    	$data = $objSector->Get_Sel_Sectores($bean_parametro ,$bean_caserio, $bean_distrito , $bean_provincia );


			$formulario= "";
			$Paginacion="";
			if (count($data["cuerpo"]) > 0)
			{
				# se recorre el array y se extraer cada uno de los registros
				for ($i = 0; $i < count($data["cuerpo"]); $i++)
          		{
					$formulario.="<tr id='tr".$i."' onclick=\"js_seleccionar_fila(".$i.");\">";
                    $formulario.= 	"<td>";
                    $formulario.=      "  <input class='inputRadio' type='radio'
                    				value='".$data["cuerpo"][$i]["nParCodigo"]."-".$data["cuerpo"][$i]["nCasCodigo"] ."-".$data["cuerpo"][$i]["nDisCodigo"] ."-".$data["cuerpo"][$i]["nProCodigo"]."-".$data["cuerpo"][$i]["nDepCodigo"] ."'
                    				name='rdCodigo' id='rdCodigo".$i."'/>";
                    $formulario.=        $data["cuerpo"][$i]["cParNombre"];
                    $formulario.=  	"</td>";
				   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cParDescripcion"]."</td>";
				   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cCasDescripcion"]."</td>";
				   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cDisDescripcion"]."</td>";
				   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cProDescripcion"]."</td>";
				   	$formulario.="</tr>";
				}
					$objResponse->assign("tbodyData","innerHTML",$formulario);
				#Paginado
				     $Paginacion = Paginar($nNumRegExist, $nNumRegMostrar,  $nPagAct,  'xajax_Filtrar_Sector', 'xajax.getFormValues(FrmPrincipal)');
				    $objResponse->assign("ContenedorPaginado","innerHTML",$Paginacion);
			}else{
			  	$objResponse->assign("tbodyData","innerHTML",$formulario);
			  	$objResponse->assign("ContenedorPaginado","innerHTML",$Paginacion);
			}
			return $objResponse;
		}
	# NUEVO
		function Nuevo_Sector()
		{
			$objResponse = new xajaxResponse();
			#Formulario
			// LLAMAR A LA FUNCION QUE CREA EL FORMULARIO
			$formulario =  Frm_Sector("Insertar_Sector");
			# configurando emergente
				$FrmRpta = FrmEmergente("NUEVO SECTOR", $formulario);
				$objResponse->script("mostrar_emergente();");
				$objResponse->assign("emergente_contenido","innerHTML",$FrmRpta);

				# para hacer los combos recargables
				$selectDependiente ="Provincia-Distrito-Caserio" ;
				$objResponse->script("xajax_Combo_Provincia(xajax.$('Departamento_').value ,1, '".$selectDependiente."');");


				$objResponse->script("Calendar_Rango('dFechaIni', 'dFechaFin');");
			return $objResponse;
		}
	# INSERTAR
		function Insertar_Sector($frm)
		{
			$objResponse = new xajaxResponse();

			$MsjAlter = "";
			$Funcion = "";

			# VALIDACION
				if(empty($frm["Caserio_"]))
				{
					$MsjAlter = "Seleccionar Caserio ";
				}
				elseif(empty($frm["cParNombre_"]))
				{
					$MsjAlter = "Completar Codigo Sector ";
				}
				elseif(empty($frm["Sector_"]))
				{
					$MsjAlter = "Completar Sector";
				}

			if($MsjAlter=="")
			{
				$nCaserio   = $frm["Caserio_"] ;
				$cParNombre = Mayusc($frm["cParNombre_"]) ;
				$Sector     = Mayusc($frm["Sector_"] );

				$objSector      = new ClsSector();
				$objParametro   = new ClsParametro();
				$bean_parametro = new Bean_parametro() ;


				// $bean_parametro->setcParDescripcion($Sector );
				$bean_parametro->setcParJerarquia($nCaserio);
				$bean_parametro->setcParDescripcion("-" );
				$bean_parametro->setcParNombre($cParNombre );
				$bean_parametro->setnParClase( 2002 );

				# valida que el codigo sector no exista
		    	$data = $objParametro->Validar_Parametro($bean_parametro);

		        if(count($data["cuerpo"]) > 0)
		        {
		            $MsjAlter = "Código se encuentra registrado";
		        }
		        else
		        {
		        	# validar que la descripcion no exista para el distrio
		        	$bean_parametro->setcParDescripcion( $Sector  );
		        	$bean_parametro->setcParJerarquia( $nCaserio  );
		    		$data = $objParametro->Get_Parametro_cParDesc_by_cParJeranquia($bean_parametro);

		        	if(count($dataFecha["cuerpo"]) > 0)
		        	{

		            	$MsjAlter = "Ya Existe el nombre del Sector para el Distrito" ;
		        	}else
		        	{
			        		#	Registro datos de Sector
			        		try
				        	{	# iniciamos la transaccion
				        		$objSector->beginTransaction() ;

				        		# REGISTRAR EL Sector COMO PARAMETRO
				        		$data = $objParametro->Set_Parametro($bean_parametro);
								Insertar_Transaccion(1,"NUEVO SECTOR: nParCodigo : ".$data["cuerpo"][0]["nParCodigo"]." - nParClase : 2002","") ;
								# si todo a tendido exito
				        		$objSector->commit();
				        		$Funcion = "xajax_Listar_Sectores(0,20,1,1); ocultar_emergente();";

				        	}catch(Exception $e)
				        	{
				        		# si ha habido algun error
				        		$objSector->rollback();
				        		$MsjAlter =  "Error de registro.";
				        	}
			        }
		        }


			}
			$objResponse->assign("labelMsj","innerHTML",$MsjAlter);
			$objResponse->script($Funcion);
			return $objResponse;
		}

	# EDITAR
		function Editar_Sector($frm)
		{
			$objResponse = new xajaxResponse();
			#Formulario

			$formulario = "";
			$nPrdTipo = "";
					if (!empty($frm["rdCodigo"])) {
						$arr = explode('-', $frm["rdCodigo"]);
						$nParCodigo = $arr[0];
						$nCasCodigo = $arr[1];
						$nDisCodigo = $arr[2];
						$nProCodigo = $arr[3];
						$nDepCodigo = $arr[4];

						$objParametro   = new ClsParametro();
						$bean_parametro = new Bean_parametro() ;

						$bean_parametro->setnParCodigo($nParCodigo);
						$bean_parametro->setnParClase( 2002 );

						$dataParametro = $objParametro->Buscar_Parametro($bean_parametro) ;
						$cParNombre = $dataParametro["cuerpo"][0]["cParNombre"] ;
						$cParDescripcion = $dataParametro["cuerpo"][0]["cParDescripcion"] ;

							$formulario .= Frm_Sector("Actualizar_Sector", $nDepCodigo, $nParCodigo, $cParNombre , $cParDescripcion, $nDepCodigo);

						# configurando emergente
						$FrmRpta = FrmEmergente("ACTUALIZAR SECTOR", $formulario);
						$objResponse->script("mostrar_emergente();");
						// $objResponse->assign("emergente","style.height","180px");
						$objResponse->assign("emergente_contenido","innerHTML",$FrmRpta);

						# para hacer los combos recargables
						$selectDependiente ="" ;
						$objResponse->script("xajax_Combo_Provincia(".$nDepCodigo ." ,".$nProCodigo.", '".$selectDependiente."');");
						$objResponse->script("xajax_Combo_Distrito(".$nProCodigo." ,".$nDisCodigo.", '".$selectDependiente."');");
						$objResponse->script("xajax_Combo_Caserio(".$nDisCodigo." ,".$nCasCodigo.", '".$selectDependiente."');");
					}
					else{
						$formulario .="<div class='divContenedor'>";
		    			$formulario .=	"<div class='divFila' style='text-align:center; margin-top:10px;'>";
					    $formulario .= 		"<label style='color:#000000; font-family:Arial; font-size:12px; font-weight:bold;'>¡SELECCIONE UN REGISTRO DE LA LISTA!</label>";
					    $formulario .=	"</div>";
					    $formulario .="</div>";

					    $FrmRpta = FrmEmergente("ACTUALIZAR SECTOR", $formulario);
						$objResponse->script("mostrar_emergente();");
						// $objResponse->assign("emergente","style.height","180px");
						$objResponse->assign("emergente_contenido","innerHTML",$FrmRpta);
					}
				return $objResponse;
		}

	#ACTUALIZAR
		function Actualizar_Sector($frm)
		{
			$objResponse = new xajaxResponse();

			$MsjAlter = "";
			$Funcion = "";

			# VALIDACION
				if(empty($frm["Caserio_"]))
				{
					$MsjAlter = "Seleccionar Caserio ";
				}
				elseif(empty($frm["cParNombre_"]))
				{
					$MsjAlter = "Completar Codigo Sector ";
				}
				elseif(empty($frm["Sector_"]))
				{
					$MsjAlter = "Completar Sector";
				}

			if($MsjAlter==""){

				$nCaserio   = $frm["Caserio_"] ;
				$cParNombre = Mayusc($frm["cParNombre_"]) ;
				$Sector     = Mayusc($frm["Sector_"] );
				$nParCodigo = $frm["nParCodigo_"] ;

				$objParametro   = new ClsParametro();
				$bean_parametro = new Bean_parametro() ;


		        $bean_parametro->setnParCodigo( $nParCodigo  );
				$bean_parametro->setcParJerarquia($nCaserio);
				$bean_parametro->setcParDescripcion("-" );
				$bean_parametro->setcParNombre($cParNombre );
				$bean_parametro->setnParClase( 2002 );

				# valida que el codigo sector no exista
		    	$data = $objParametro->Validar_Parametro_Upd($bean_parametro);

		    	if(count($data["cuerpo"]) > 0)
		        {
		            $MsjAlter = "Código se encuentra registrado";
		        }
		        else
		        {
		        	# validar que la descripcion no exista para el distrio
		        	$bean_parametro->setcParDescripcion( $Sector  );
		        	$bean_parametro->setcParJerarquia( $nCaserio  );
		    		$data = $objParametro->Get_Parametro_cParDesc_by_cParJeranquia($bean_parametro);

		        	if(count($dataFecha["cuerpo"]) > 0)
		        	{

		            	$MsjAlter = "Ya Existe el nombre del Sector para el Distrito" ;
		        	}else
		        	{
			        		#	Registro datos de Sector
			        		try
				        	{	# iniciamos la transaccion
				        		$objParametro->beginTransaction() ;

				        		# REGISTRAR EL Sector COMO PARAMETRO
				        		$data = $objParametro->Upd_Parametro_and_cParJerarquia($bean_parametro);
								Insertar_Transaccion(2,"ACTUALIZO SECTOR: nParCodigo : ".$data["cuerpo"][0]["nParCodigo"]." - nParClase : 2002","") ;
								# si todo a tendido exito
				        		$objParametro->commit();
				        		$Funcion = "xajax_Listar_Sectores(0,20,1,1); ocultar_emergente();";

				        	}catch(Exception $e)
				        	{
				        		# si ha habido algun error
				        		$objParametro->rollback();
				        		$MsjAlter =  "Error de registro.";
				        	}
			        }
		        }

			}


			$objResponse->assign("labelMsj","innerHTML",$MsjAlter);
			$objResponse->script($Funcion);
			return $objResponse;
		}

	#MOSTRAR ELIMINAR
		function Eliminar_Sector($frm)
		{
			$objResponse = new xajaxResponse();

			if(empty($frm["rdCodigo"]))
			{
				$rdCodigo = "";
			}
			else
			{
				$arr = explode('-', $frm["rdCodigo"]);
				$rdCodigo = $arr[0]; # nParCodigo
			}


			$formulario = FrmEliminar("ConfEliminar_Sector",$rdCodigo);

			$FrmRpta = FrmEmergente("ELIMINAR SECTOR", $formulario);
			$objResponse->script("mostrar_emergente();");
			$objResponse->assign("emergente","style.height","130px");
			$objResponse->assign("emergente_contenido","innerHTML",utf8_encode($FrmRpta));

			return $objResponse;
		}

	#CONFIRMAR ELIMINACION
		function ConfEliminar_Sector($nParCodigo , $nEstado = 0 )
		{
			$objResponse = new xajaxResponse();
			$objSector = new ClsSector();

			$MsjAlter = "&nbsp;";
			$Funcion = "";

			$objParametro   = new ClsParametro();
			$bean_parametro = new Bean_parametro() ;

			$bean_parametro->setnParCodigo($nParCodigo);
			$bean_parametro->setnParClase( 2002 );
			$bean_parametro->setnParEstado(  $nEstado  );

			try
	    	{	# iniciamos la transaccion
	    		$objParametro->beginTransaction() ;
    			# Actulizar estado del paramentro  como Sector
				$objParametro->Upd_Parametro_Estado($bean_parametro);

				Insertar_Transaccion(3,"ELIMNO SECTOR: nParCodigo : ".$nParCodigo." - nParClase : 2002 ","") ;

				# si todo a tendido exito
	    		$objParametro->commit();

	    		$Funcion = "xajax_Listar_Sectores(0,20,1,1); ocultar_emergente();";

	    	}catch(Exception $e)
	    	{
	    		# si ha habido algun error
	    		$objParametro->rollback();
	    		$MsjAlter = "Error de registro: ";
	    		// $MsjAlter = "Error de registro: ". $e->getMessage() ;
	    	}

			$objResponse->assign("labelMsj","innerHTML",$MsjAlter);
			$objResponse->script($Funcion);
			return $objResponse;
		}

#FRM NUEVO
		function Frm_Sector($funcion="", $nDepCodigo = 6, $nParCodigo = -1 , $cParNombre = "", $cSecDescripcion = "")
		{
			$objDepartamento = new ClsDepartamento() ;
			$bean_departamento = new Bean_departamento() ;
			$bean_departamento->setnPaiCodigo(1) ;

			$dataOption = $objDepartamento->Get_Departamentos_by_nPaiCodigo($bean_departamento) ;
			$OptionDep = SelectOption($dataOption, "nDepCodigo","cDepDescripcion", $nDepCodigo );
				# para hacer los combos recargables
				$selectDependiente ="Provincia-Distrito-Caserio" ;
				$formulario = "";
			    $formulario .='
			    	<div class="vform vformContenedor">
			    		<fieldset class="c12">
				    		<input type="hidden" name="nParCodigo_" value="'.$nParCodigo.'" />
					    	<fieldset class="c6">
					    		<label for="Departamento_">Departamento</label>
					    		<select name="Departamento_" id="Departamento_" onchange="xajax_Combo_Provincia(xajax.$(\'Departamento_\').value ,-1,\''.$selectDependiente. '\');">
					    		'.$OptionDep.'
					    		</select>
					    	</fieldset>
					    	<fieldset class="c6">
					    		<label for="Provincia_">Provincia</label>
					    		<select name="Provincia_" id="Provincia_" onchange="xajax_Combo_Distrito(xajax.$(\'Provincia_\').value, -1 ,\''.$selectDependiente .'\');">
					    		</select>
					    	</fieldset>
					    	<fieldset class="c6">
					    		<label for="Distrito_">Distrito</label>
					    		<select name="Distrito_" id="Distrito_" onchange="xajax_Combo_Caserio(xajax.$(\'Distrito_\').value ,1);"></select>
					    	</fieldset>
					    	<fieldset class="c6">
					    		<label for="Caserio_">Caserio</label>
					    		<select name="Caserio_" id="Caserio_"></select>
					    	</fieldset>
							'.InputTextPre("Código Sector ","cParNombre_","INGRESE CODIGO SECTOR ",$cParNombre,"icon-text", "c6 ").'
							'.InputTextPre("SECTOR","Sector_","INGRESE SECTOR ",$cSecDescripcion,"icon-text", "c6 ").'
						</fieldset>
						'.botonRegistrar($funcion).'
					</div>
			    ';
				return $formulario;
		}

	# REPORTE EN PDF
		function Rpt_Sector_Pdf($frm="")
		{
			$objResponse       = new xajaxResponse();
			$objSector         = new ClsSector();
			$bean_parametro    = new Bean_parametro();
			$bean_caserio      = new Bean_caserio();
			$bean_provincia    = new Bean_provincia();
			$bean_distrito     = new Bean_distrito();
			# validaciones
				if(empty($frm["cProvincia_"]))
				{
					$cProvincia = "-";
				}else{
					$cProvincia = $frm["cProvincia_"];
				}
				if(empty($frm["cDistrito_"]))
				{
					$cDistrito = "-";
				}else{
					$cDistrito = $frm["cDistrito_"];
				}
				if(empty($frm["cCaserio_"]))
				{
					$cCaserio = "-";
				}else{
					$cCaserio = $frm["cCaserio_"];
				}
				if(empty($frm["cSector_"]))
				{
					$cSector = "-";
				}else{
					$cSector = $frm["cSector_"];
				}
				if(empty($frm["cParNombre_"]))
				{
					$cParNombre = "-";
				}else{
					$cParNombre = $frm["cParNombre_"];
				}

			$bean_parametro->setnOriRegistros(0) ;
			$bean_parametro->setnNumRegMostrar(0) ;
			$bean_parametro->setnPagRegistro(0) ; # que no pagine
			$bean_parametro->setcParNombre($cParNombre) ;
			$bean_parametro->setcParDescripcion($cSector) ;
			$bean_provincia->setcProDescripcion($cProvincia) ;
			$bean_distrito->setcDisDescripcion($cDistrito) ;
			$bean_caserio->setcCasDescripcion($cCaserio) ;

		    $data = $objSector->Get_Sel_Sectores($bean_parametro ,$bean_caserio, $bean_distrito , $bean_provincia );


			$formulario= "";

			if (count($data["cuerpo"]) > 0)
			{

				$formulario .= "<table class='table'>" ;
				$formulario .='
						<tr class="border-bottom">
							<th class="" style="width:10%;"> Num </th>
							<th class="" style="width: 20% ;"> Código </th>
							<th class="" style="width: 20% ;"> Sector </th>
							<th class="" style="width: 30%;"> Caserio </th>
							<th class="" style="width: 20% ;"> Distrito </th>
							<th class="" style="width: 20% ;"> Provincia </th>
						</tr>
					' ;

				$formulario .= "<tbody>" ;

				for ($i = 0; $i < count($data["cuerpo"]); $i++)
            	{
						$formulario.="<tr>";
	                    $formulario.= 	"<td>";
	                    $formulario.=         $i + 1 ;
	                    $formulario.=   "</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cParNombre"]."</td>";
					   	$formulario.= 	"<td> $i: ".$data["cuerpo"][$i]["cParDescripcion"]."</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cCasDescripcion"]."</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cDisDescripcion"]."</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cProDescripcion"]."</td>";
					   	$formulario.="</tr>";
				}
				$formulario .= "</tbody>" ;
				$formulario .= "<tfoot>" ;
				$formulario .= " 	<tr>" ;
				$formulario .= " 	<td  colspan='5' class='border-top'>   </td>" ;
				$formulario .= " 	</tr>" ;

				$formulario .= "</tfoot>" ;

				$formulario .= "</table>" ;
			}

			$HTML ="<html>
						<body>
						<br/>
							<h3 class='rounded text-center mayusc title'> Lista de Sectores </h3>
							<br/>
						<div>
							".$formulario."
						</div>
						</body>
						</html>";

					$mpdf = Rpt_Generar_Pdf("A4") ;
					$fichero = '../documents/pdf.pdf';
					$mpdf->WriteHTML($HTML);
					$mpdf->Output(  $fichero);
					$objResponse->script('window.open("'.$fichero.'", "_blank");');

		    return $objResponse;
		}
?>