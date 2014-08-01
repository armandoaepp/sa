<?php

		$xajax->registerFunction("Listar_Caserios");
		$xajax->registerFunction("Filtrar_Caserio");
		$xajax->registerFunction("Nuevo_Caserio");
		$xajax->registerFunction("Insertar_Caserio");
		$xajax->registerFunction("Editar_Caserio");
		$xajax->registerFunction("Actualizar_Caserio");
		$xajax->registerFunction("Eliminar_Caserio");
		$xajax->registerFunction("ConfEliminar_Caserio");
		$xajax->registerFunction("Cerrar_Caserio");
		$xajax->registerFunction("ConfCerrar_Caserio");
		$xajax->registerFunction("Rpt_Caserio_Pdf");

	# LISTAR
		function Listar_Caserios($nOriRegistros, $nNumRegMostrar, $nPagRegistro, $nPagAct)
		{
			    	$objResponse = new xajaxResponse();

			   		$FuncionSearch = 'xajax_Filtrar_Caserio('.$nOriRegistros.', '.$nNumRegMostrar.', '.$nPagRegistro.', '.$nPagAct.',  xajax.getFormValues(FrmPrincipal) );';
					$FuncionEnter = ' if(event.keyCode == 13 ){'.$FuncionSearch.'} ; if( (jq(this).val()).length  == 0){	'.$FuncionSearch.' }';

					$formulario ='';
					$formulario .= '<div class="ContenedorTable">

							<table style="width:100%;">
								<tr class="title-table text-left" >
									<th  style="width: 10%;">&nbsp; CÓDIGO </th>
									<th  style="width: 20%;">&nbsp; Departamento </th>
									<th  style="width: 20%;">&nbsp; Provincia </th>
									<th  style="width: 20%;">&nbsp; Distrito </th>
									<th  style="width: 30%;">&nbsp; Sector  </th>
								</tr>
						    	<tr class="vform">
									<td>
									    <input  type="search" disabled="disabled" name="" placeholder="" />
									</td>
									<td>
						    		    <input type="search" name="cDepartamento_" id="cDepartamento_" placeholder="Buscar Departamento"
						    		    onkeyup="'.$FuncionEnter.'"
							    		onsearch="'.$FuncionSearch.'" />
									</td>
									<td>
						    		    <input type="search" name="cProvincia_" id="cProvincia_" placeholder="Buscar Provincia"
						    		    onkeyup="'.$FuncionEnter.'"
							    		onsearch="'.$FuncionSearch.'" />
									</td>
									<td>
						    		    <input type="search" name="cDistrito_" id="cDistrito_" placeholder="Buscar Distrito"
						    		    onkeyup="'.$FuncionEnter.'"
							    		onsearch="'.$FuncionSearch.'" />
									</td>
									<td>
						    		    <input type="search" name="cCaserio_" id="cCaserio_" placeholder="Buscar Caserio"
						    		    onkeyup="'.$FuncionEnter.'"
							    		onsearch="'.$FuncionSearch.'" />
									</td>


								</tr>

								<tbody id="tbodyData" class="table table-hover table-border">

								</tbody>
						    </table>
						    </div>';
				    $objResponse->assign("ContenedorPrincipal","innerHTML",$formulario);
				    $objResponse->script("xajax_Filtrar_Caserio('".$nOriRegistros."', '".$nNumRegMostrar."', '".$nPagRegistro."', '".$nPagAct."',  xajax.getFormValues(FrmPrincipal) );");
					return $objResponse;
		}

	#LISTAR LOS REGISTROS DE BD
		function Filtrar_Caserio($nOriRegistros, $nNumRegMostrar, $nPagRegistro, $nPagAct,$frm)
		{
			$objResponse       = new xajaxResponse();
			$objCaserio        = new ClsCaserio();
			$bean_caserio      = new Bean_caserio();
			$bean_departamento = new Bean_departamento();
			$bean_provincia    = new Bean_provincia();
			$bean_distrito     = new Bean_distrito();
			# validaciones

				if(empty($frm["cDepartamento_"]))
				{
					$cDepartamento = "-";
				}else{
					$cDepartamento = $frm["cDepartamento_"];
				}
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

			$bean_caserio->setnOriRegistros(0) ;
			$bean_caserio->setnNumRegMostrar(0) ;
			$bean_caserio->setnPagRegistro(0) ; # que no pagine
			$bean_departamento->setcDepDescripcion($cDepartamento) ;
			$bean_provincia->setcProDescripcion($cProvincia) ;
			$bean_distrito->setcDisDescripcion($cDistrito) ;
			$bean_caserio->setcCasDescripcion($cCaserio) ;

		    $dataNum =$objCaserio->Get_Sel_Caserios($bean_caserio, $bean_distrito , $bean_provincia,$bean_departamento);
			//  #Capturar el número de registros
	    	$nNumRegExist = count($dataNum["cuerpo"]);

	    	 #Filtrar registros deacuerdo al origen de datos y y viene paginados
		    $bean_caserio->setnOriRegistros($nOriRegistros) ;
			$bean_caserio->setnNumRegMostrar($nNumRegMostrar) ;
			$bean_caserio->setnPagRegistro($nPagRegistro) ;

		    #Filtrar registrar
	    	$data = $objCaserio->Get_Sel_Caserios($bean_caserio, $bean_distrito , $bean_provincia,$bean_departamento);

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
	                    					value='".$data["cuerpo"][$i]["nDepCodigo"]."-".$data["cuerpo"][$i]["nProCodigo"]."-".$data["cuerpo"][$i]["nDisCodigo"]."-".$data["cuerpo"][$i]["nCasCodigo"]. "'
	                    					name='rdCodigo' id='rdCodigo".$i."'/>";
	                    $formulario.=          substr("0000".$data["cuerpo"][$i]["nCasCodigo"],-5) ;
	                    $formulario.=   "</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cDepDescripcion"]."</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cProDescripcion"]."</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cDisDescripcion"]."</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cCasDescripcion"]."</td>";
					   	$formulario.="</tr>";

				}
					$objResponse->assign("tbodyData","innerHTML",$formulario);
				#Paginado
				    $Paginacion = Paginar($nNumRegExist, $nNumRegMostrar,  $nPagAct,  'xajax_Filtrar_Caserio', 'xajax.getFormValues(FrmPrincipal)');
				    $objResponse->assign("ContenedorPaginado","innerHTML",$Paginacion);
			}else{
			  	$objResponse->assign("tbodyData","innerHTML",$formulario);
			  	$objResponse->assign("ContenedorPaginado","innerHTML",$Paginacion);
			}
			return $objResponse;
		}
	# NUEVO
		function Nuevo_Caserio()
		{
			$objResponse = new xajaxResponse();
			#Formulario
			// LLAMAR A LA FUNCION QUE CREA EL FORMULARIO
			$formulario =  Frm_Caserio("Insertar_Caserio");
			# configurando emergente
				$FrmRpta = FrmEmergente("NUEVO CASERIO", $formulario);
				$objResponse->script("mostrar_emergente();");
				$objResponse->assign("emergente_contenido","innerHTML",$FrmRpta);

				# recargar combos dependientes
				$selectDependiente ="Provincia-Distrito" ;
				$objResponse->script("xajax_Combo_Provincia(xajax.$('Departamento_').value ,61, '".$selectDependiente."');");

				// $objResponse->script("xajax_Combo_Provincia(xajax.$('Departamento_').value ,61,true);");


			return $objResponse;
		}
	# INSERTAR
		function Insertar_Caserio($frm)
		{
			$objResponse = new xajaxResponse();

			$MsjAlter = "";
			$Funcion = "";

			# VALIDACION
				if(empty($frm["Departamento_"]))
				{
					$MsjAlter = "Seleccionar Departamento";
				}
				elseif(empty($frm["Provincia_"]))
				{
					$MsjAlter = "Seleccionar Provincia";
				}
				elseif(empty($frm["Distrito_"]))
				{
					$MsjAlter = "Seleccionar Distrito " ;
				}
				elseif(empty($frm["txtCaserio"]))
				{
					$MsjAlter = "Completar Caserio ";
				}


			if($MsjAlter=="")
			{
				$Departamento = $frm["Departamento_"] ;
				$Provincia    = $frm["Provincia_"];
				$Distrito     = $frm["Distrito_"] ;
				$txtCaserio   = Mayusc($frm["txtCaserio"]) ;

				$objCaserio        = new ClsCaserio();
				$bean_caserio      = new Bean_caserio();

				// $bean_caserio->setnCasCodigo(0);
				$bean_caserio->setcCasDescripcion($txtCaserio);
				$bean_caserio->setnDisCodigo($Distrito);

		    	$data = $objCaserio->Validar_Caserio($bean_caserio);

		        if(count($data["cuerpo"]) > 0)
		        {
		            $MsjAlter = "Registro ya existe para el Distrito ";
		        }
		        else
		        {
		        		#	Registro datos de Caserio
		        		try
			        	{	# iniciamos la transaccion
			        		$objCaserio->beginTransaction() ;
			        		$dataCaserio = $objCaserio->Set_Caserio($bean_caserio);
			        		$nCasCodigo  = $dataCaserio["cuerpo"][0]["nCasCodigo"] ;

							Insertar_Transaccion(1,"NUEVO CASERIO: ".$nCasCodigo." Nombre Caserio ".$txtCaserio,"") ;
							# si todo a tendido exito
			        		$objCaserio->commit();
			        		$Funcion = "xajax_Listar_Caserios(0,20,1,1); ocultar_emergente();";

			        	}catch(Exception $e)
			        	{
			        		# si ha habido algun error
			        		$objCaserio->rollback();
			        		$MsjAlter =  "Error de registro.";
			        	}
		         }

		        // $MsjAlter .= $data ;
			}
			$objResponse->assign("labelMsj","innerHTML",$MsjAlter);
			$objResponse->script($Funcion);
			return $objResponse;
		}

	# EDITAR
		function Editar_Caserio($frm)
		{
			$objResponse = new xajaxResponse();
			#Formulario

			$formulario = "";
			$nPrdTipo = "";
					if (!empty($frm["rdCodigo"]))
					{
						$arr = explode('-', $frm["rdCodigo"]);
						$nDepCodigo = $arr[0];
						$nProCodigo = $arr[1];
						$nDisCodigo = $arr[2];
						$nCasCodigo = $arr[3];

						$objCaserio   = new ClsCaserio();
						$bean_caserio = new Bean_caserio();

						$bean_caserio->setnCasCodigo($nCasCodigo);


							$data = $objCaserio->Get_Caserio_by_nCasCodigo($bean_caserio) ;
				    		$cCasDescripcion = $data["cuerpo"][0]["cCasDescripcion"];

							$formulario .= Frm_Caserio("Actualizar_Caserio",$nDepCodigo , $cCasDescripcion );

						# configurando emergente
						$FrmRpta = FrmEmergente("ACTUALIZAR CASERIO", $formulario);
						$objResponse->script("mostrar_emergente();");
						// $objResponse->assign("emergente","style.height","180px");
						$objResponse->assign("emergente_contenido","innerHTML",$FrmRpta);

						# para hacer los combos recargables
						$selectDependiente ="" ;
						$objResponse->script("xajax_Combo_Provincia(".$nDepCodigo ." ,".$nProCodigo.", '".$selectDependiente."');");
						$objResponse->script("xajax_Combo_Distrito(".$nProCodigo." ,".$nDisCodigo.", '".$selectDependiente."');");

					}
					else{
						$formulario .="<div class='divContenedor'>";
		    			$formulario .=	"<div class='divFila' style='text-align:center; margin-top:10px;'>";
					    $formulario .= 		"<label style='color:#000000; font-family:Arial; font-size:12px; font-weight:bold;'>¡SELECCIONE UN REGISTRO DE LA LISTA!</label>";
					    $formulario .=	"</div>";
					    $formulario .="</div>";

					    $FrmRpta = FrmEmergente("ACTUALIZAR CASERIO", $formulario);
						$objResponse->script("mostrar_emergente();");
						// $objResponse->assign("emergente","style.height","180px");
						$objResponse->assign("emergente_contenido","innerHTML",$FrmRpta);
					}



			return $objResponse;
		}

	#ACTUALIZAR
		function Actualizar_Caserio($frm)
		{
			$objResponse = new xajaxResponse();

			$MsjAlter = "";
			$Funcion = "";

			# VALIDACION
				if(empty($frm["Departamento_"]))
				{
					$MsjAlter = "Seleccionar Departamento";
				}
				elseif(empty($frm["Provincia_"]))
				{
					$MsjAlter = "Seleccionar Provincia";
				}
				elseif(empty($frm["Distrito_"]))
				{
					$MsjAlter = "Seleccionar Distrito " ;
				}
				elseif(empty($frm["txtCaserio"]))
				{
					$MsjAlter = "Completar Caserio ";
				}

			if($MsjAlter=="")
			{
					// $Departamento = $frm["Departamento_"] ;
					// $Provincia    = $frm["Provincia_"];
					$Distrito     = $frm["Distrito_"] ;
					$txtCaserio   = Mayusc($frm["txtCaserio"]) ;
					$nCasCodigo =  $frm["nCasCodigo"] ;

					$bean_caserio   = new Bean_caserio();
					$bean_caserio->setnCasCodigo($nCasCodigo);
					$bean_caserio->setcCasDescripcion($txtCaserio);
					$bean_caserio->setnDisCodigo($Distrito);
					$objCaserio       = new ClsCaserio();

				try
	        	{	# iniciamos la transaccion
	        		$objCaserio->beginTransaction() ;
	        		$data =  $objCaserio->Upd_Caserio($bean_caserio) ;

					Insertar_Transaccion(2,"ACTUALIZO CASERIO : ".$nCasCodigo." DESCRIPCIÓN  ".$txtCaserio,"") ;

					# si todo a tendido exito
	        		$objCaserio->commit();
	        		$Funcion = "xajax_Listar_Caserios(0,20,1,1); ocultar_emergente();";

	        	}catch(Exception $e)
	        	{
	        		# si ha habido algun error
	        		$objCaserio->rollback();
	        		$MsjAlter = "Error de registro: " ;
	        	}
			}


			$objResponse->assign("labelMsj","innerHTML",$MsjAlter);
			$objResponse->script($Funcion);
			return $objResponse;
		}

	#MOSTRAR ELIMINAR
		function Eliminar_Caserio($frm)
		{
			$objResponse = new xajaxResponse();

			if(empty($frm["rdCodigo"]))
			{
				$rdCodigo = "";
			}
			else
			{
						$arr = explode('-', $frm["rdCodigo"]);
						$nDepCodigo = $arr[0] ;
						$nProCodigo = $arr[1] ;
						$nDisCodigo = $arr[2] ;
						$rdCodigo = $arr[3] ; # nCasCodigo
			}


			$formulario = FrmEliminar("ConfEliminar_Caserio",$rdCodigo);

			$FrmRpta = FrmEmergente("ELIMINAR CASERIO", $formulario);
			$objResponse->script("mostrar_emergente();");
			$objResponse->assign("emergente","style.height","130px");
			$objResponse->assign("emergente_contenido","innerHTML",utf8_encode($FrmRpta));

			return $objResponse;
		}

	#CONFIRMAR ELIMINACION
		function ConfEliminar_Caserio($nCasCodigo , $nEstado = 0 )
		{
			$objResponse = new xajaxResponse();


			$MsjAlter = "&nbsp;";
			$Funcion = "";

			$objCaserio       = new ClsCaserio();
			$bean_caserio   = new Bean_caserio();
			$bean_caserio->setnCasCodigo($nCasCodigo);
			$bean_caserio->setnCasEstado($nEstado);

			try
	    	{	# iniciamos la transaccion
	    		$objCaserio->beginTransaction() ;

	    		$data = $objCaserio->Upd_Caserio_Estado($bean_caserio);

				Insertar_Transaccion(3,"ELIMNO CASERIO: ".$nCasCodigo,"") ;

				# si todo a tendido exito
	    		$objCaserio->commit();

	    		$Funcion = "xajax_Listar_Caserios(0,20,1,1); ocultar_emergente();";

	    	}catch(Exception $e)
	    	{
	    		# si ha habido algun error
	    		$objCaserio->rollback();
	    		$MsjAlter = "Error de registro: ";
	    		// $MsjAlter = "Error de registro: ". $e->getMessage() ;
	    	}

			$objResponse->assign("labelMsj","innerHTML",$MsjAlter);
			$objResponse->script($Funcion);
			return $objResponse;
		}

	#FRM NUEVO
		function Frm_Caserio($funcion="",$nDepCodigo = 6 ,  $cCasDescripcion = "")
		{
			$objDepartamento = new ClsDepartamento() ;
			$bean_departamento = new Bean_departamento() ;
			$bean_departamento->setnPaiCodigo(1) ;

			$dataOption = $objDepartamento->Get_Departamentos_by_nPaiCodigo($bean_departamento) ;
			$OptionDep = SelectOption($dataOption, "nDepCodigo","cDepDescripcion", $nDepCodigo );
				# recargar combos dependientes
				$selectDependiente ="Provincia-Distrito" ;
				$formulario = "";
			    $formulario .='
			    	<div class="vform vformContenedor">
			    		<fieldset class="c12">
				    		<input type="hidden" name="nCasCodigo" value="'.$nCasCodigo.'" />
					    	<fieldset class="c6">
					    		<label for="Departamento_">Departamento</label>
					    		<select name="Departamento_" id="Departamento_" onchange="xajax_Combo_Provincia(xajax.$(\'Departamento_\').value ,-1,\''.$selectDependiente.'\');">
					    		'.$OptionDep.'
					    		</select>
					    	</fieldset>
					    	<fieldset class="c6">
					    		<label for="Provincia_">Provincia</label>
					    		<select name="Provincia_" id="Provincia_" onchange="xajax_Combo_Distrito(xajax.$(\'Provincia_\').value, -1, \''.$selectDependiente. '\');">
					    		</select>
					    	</fieldset>
					    	<fieldset class="c6">
					    		<label for="Distrito_">Distrito</label>
					    		<select name="Distrito_" id="Distrito_"></select>
					    	</fieldset>
							'.InputTextPre("Caserio","txtCaserio","INGRESE Caserio ",$cCasDescripcion,"icon-text", "c6 ").'
						</fieldset>
						'.botonRegistrar($funcion).'
					</div>
			    ';
				return $formulario;
		}

	# REPORTE EN PDF
		function Rpt_Caserio_Pdf($frm="")
		{
			$objResponse       = new xajaxResponse();
			$objCaserio        = new ClsCaserio();
			$bean_caserio      = new Bean_caserio();
			$bean_departamento = new Bean_departamento();
			$bean_provincia    = new Bean_provincia();
			$bean_distrito     = new Bean_distrito();


			# validacion
				if(empty($frm["cDepartamento_"]))
				{
					$cDepartamento = "-";
				}else{
					$cDepartamento = $frm["cDepartamento_"];
				}
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

			$bean_caserio->setnOriRegistros(0) ;
			$bean_caserio->setnNumRegMostrar(0) ;
			$bean_caserio->setnPagRegistro(0) ; # que no pagine
			$bean_departamento->setcDepDescripcion($cDepartamento) ;
			$bean_provincia->setcProDescripcion($cProvincia) ;
			$bean_distrito->setcDisDescripcion($cDistrito) ;
			$bean_caserio->setcCasDescripcion($cCaserio) ;

		    $data =$objCaserio->Get_Sel_Caserios($bean_caserio, $bean_distrito , $bean_provincia,$bean_departamento);

			$formulario= "";

			if (count($data["cuerpo"]) > 0)
			{
				$i=1;
				$formulario .= "<table class='table'>" ;
				$formulario .='
						<tr class="border-bottom">
							<th class="" style="width:10%;"> Num </th>
							<th class="" style="width: 20% ;"> Departamento </th>
							<th class="" style="width: 20% ;"> Provincia </th>
							<th class="" style="width: 20% ;"> Distrito </th>
							<th class="" style="width: 30%;"> Caserio </th>
						</tr>
					' ;

				$formulario .= "<tbody>" ;

				for ($i = 0; $i < count($data["cuerpo"]); $i++)
            	{
						$formulario.="<tr>";
	                    $formulario.= 	"<td>";
	                    $formulario.=         $i + 1 ;
	                    $formulario.=   "</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cDepDescripcion"]."</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cProDescripcion"]."</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cDisDescripcion"]."</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cCasDescripcion"]."</td>";
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
							<h3 class='rounded text-center mayusc title'> Lista de Caserios </h3>
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