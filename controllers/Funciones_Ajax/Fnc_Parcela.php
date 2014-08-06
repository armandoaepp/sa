<?php

	$xajax->registerFunction("Listar_Parcelas");
	$xajax->registerFunction("Filtrar_Parcela");
	$xajax->registerFunction("Nuevo_Parcela");
	$xajax->registerFunction("Insertar_Parcela");
	$xajax->registerFunction("Editar_Parcela");
	$xajax->registerFunction("Actualizar_Parcela");
	$xajax->registerFunction("Eliminar_Parcela");
	$xajax->registerFunction("ConfEliminar_Parcela");
	$xajax->registerFunction("Rpt_Parcela_Pdf");


	# LISTAR
		// recibe el formulario Principal
		function Listar_Parcelas($nOriRegistros, $nNumRegMostrar, $nPagRegistro, $nPagAct )
		{
			    	$objResponse = new xajaxResponse();

			   		// $FuncionSearch = 'xajax_Filtrar_Caserio('.$nOriRegistros.', '.$nNumRegMostrar.', '.$nPagRegistro.', '.$nPagAct.',  xajax.getFormValues(FrmPrincipal) );';
			   		$FuncionSearch = 'xajax_Filtrar_();';
					$FuncionEnter = ' if(event.keyCode == 13 ){'.$FuncionSearch.'} ; if( (jq(this).val()).length  == 0){	'.$FuncionSearch.' }';

					$formulario ='';
					$formulario .= '<div class="ContenedorTable">

							<table style="width:100%;">
								<tr class="title-table text-left" >
									<th  style="width: 15%;">&nbsp; CÓDIGO </th>
									<th  style="width: 50%;">&nbsp; Parcela </th>
									<th  style="width: 10%;">&nbsp; Área(ha) </th>
									<th  style="width: 15%;">&nbsp; Fecha Incorporación </th>
								</tr>';
					$formulario .='<tr class="vform">
									<td>
						    		    <input type="search" name="s_cCodigoParcela_" id="s_cCodigoParcela_" placeholder="Buscar por Codigo Parcela" disabled
						    		    onkeyup="'.$FuncionEnter.'"
							    		onsearch="'.$FuncionSearch.'" />
									</td>
									<td>
						    		    <input type="search" name="s_cParcela_" id="s_cParcela_" placeholder="Buscar Parcela" disabled
						    		    onkeyup="'.$FuncionEnter.'"
							    		onsearch="'.$FuncionSearch.'" />
									</td>
									<td>
						    		    <input type="search" name="s_cArea_" id="s_cArea_" placeholder="Buscar Área" disabled
						    		    onkeyup="'.$FuncionEnter.'"
							    		onsearch="'.$FuncionSearch.'" />
									</td>
									<td>
						    		    <input type="search" name="" id="" placeholder="Buscar Fecha de Incorporación " disabled />
									</td>
								</tr>' ;

					$formulario .=' <tbody id="tbody_Parcela" class="table table-hover table-border">

								</tbody>
						    </table>
						    </div>';
				    $objResponse->assign("Tab_Parcela","innerHTML",$formulario);
				    $objResponse->script("xajax_Menus_Botonera('100202');" ) ;
				    $objResponse->script("xajax_Filtrar_Parcela('".$nOriRegistros."', '".$nNumRegMostrar."', '".$nPagRegistro."', '".$nPagAct."',  xajax.getFormValues(FrmPrincipal) );");
					return $objResponse;
		}

		function Filtrar_Parcela($nOriRegistros, $nNumRegMostrar, $nPagRegistro, $nPagAct,$frm)
		{
			$objResponse = new xajaxResponse();
			$objParcela  =  new ClsParcela() ;

			$bean_parametro    = new Bean_parametro();
			$bean_perparametro = new Bean_perparametro();

			# validaciones
				if(empty($frm["rdCodigo"]))
				{
					$cPerCodigo = "-";
				}else{
					$cPerCodigo = $frm["rdCodigo"];
				}
				if(empty($frm["s_cCodigoParcela_"]))
				{
					$cCodigoParcela = "-";
				}else{
					$cCodigoParcela = $frm["s_cCodigoParcela_"];
				}
				if(empty($frm["s_cParcela_"]))
				{
					$cParcela = "-";
				}else{
					$cParcela = $frm["s_cParcela_"];
				}


			$bean_parametro->setnOriRegistros($nOriRegistros) ;
			$bean_parametro->setnNumRegMostrar($nNumRegMostrar) ;
			$bean_parametro->setnPagRegistro(0) ; # que no pagine
			$bean_parametro->setcParNombre($cCodigoParcela) ;
			$bean_parametro->setcParDescripcion($cParcela) ;

			$bean_perparametro->setcPerCodigo($cPerCodigo) ;


		    $AdoRs = $objParcela->Get_Parcelas_by_cPerCodigo($bean_parametro ,$bean_perparametro );
		    // $objResponse->alert( $AdoRs ) ;
	   		//  #Capturar el número de registros
	    	$nNumRegExist = count($AdoRs["cuerpo"]);

	    	 #Filtrar registros deacuerdo al origen de datos y y viene paginados
			$bean_parametro->setnPagRegistro($nPagRegistro) ; # para que pagine

		    #Filtrar registrar
	    	$data = $objParcela->Get_Parcelas_by_cPerCodigo($bean_parametro ,$bean_perparametro );

			$formulario= "";
			$Paginacion="&nbsp";
			if (count($data["cuerpo"]) > 0)
			{
				# se recorre el array y se extraer cada uno de los registros
				for ($i = 0; $i < count($data["cuerpo"]); $i++)
          		{
					$formulario.="<tr id='tr".$i."' onclick=\"js_selected_rd_tr(".$i.",'tbody_Parcela','rdCodigo_Parcela');\">";
                    $formulario.= 	"<td>";
                    $formulario.=      "  <input class='inputRadio' type='radio'
                    				value='".$data["cuerpo"][$i]["nParCodigo"]."'
                    				name='rdCodigo_Parcela' id='rdCodigo_Parcela".$i."'/>";
                    $formulario.=        $data["cuerpo"][$i]["cParNombre"];
                    $formulario.=  	"</td>";
				   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cParDescripcion"]."</td>";
				   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cPerParValor"]."</td>";
				   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cPerParGlosa"]."</td>";
				   	$formulario.="</tr>";
				}
					$objResponse->assign("tbody_Parcela","innerHTML",$formulario);

				#Paginado
				     $Paginacion = Paginar($nNumRegExist, $nNumRegMostrar,  $nPagAct,  'xajax_Filtrar_Sector', 'xajax.getFormValues(FrmPrincipal)');
				    $objResponse->assign("Cont_Pag_Parcela_","innerHTML",$Paginacion);
			}else{
			  	$objResponse->assign("tbody_Parcela","innerHTML",$formulario);
			  	$objResponse->assign("Cont_Pag_Parcela_","innerHTML",$Paginacion);
			}
			return $objResponse;
		}

	# NUEVO
		function Nuevo_Parcela()
		{
			$objResponse = new xajaxResponse();
			#Formulario
			$funcion = "Insertar_Parcela";
			$formulario = Frm_Parcela($funcion);

			# configurando emergente
			$FrmRpta = FrmEmergente("NUEVO Parcela", $formulario);
			$objResponse->assign("emergente_contenido","innerHTML",$FrmRpta);

			$objResponse->script("Calendar_Load('dFechaIncorParcela_');");
			// $objResponse->assign("emergente","style.height","420px");
			$objResponse->script("mostrar_emergente();");

			return $objResponse;
		}

	# INSERTAR
		function Insertar_Parcela($frmE , $frmP)
		{
			$objResponse = new xajaxResponse();


			$MsjAlter = "";
			$Funcion = "";
			#VALIDACION

				if(empty($frmP['rdCodigo'])){
					$MsjAlter = "Seleccionar Productor";
				}
				if(empty($frmE['cParNomCodParcela_'])){
					$MsjAlter = "Ingrese Codigo de Parcela.";
				}
				if(empty($frmE['cParNomCodParcela_'])){
					$MsjAlter = "Ingrese Codigo de Parcela.";
				}
				if(empty($frmE['cParDescParcela_'])){
					$MsjAlter = "Ingrese Nombre de Parcela";
				}
				if(empty($frmE['nAreaParecela_'])){
					$MsjAlter = "Ingrese Área de Parcela.";
				}
				if(empty($frmE['dFechaIncorParcela_'])){
					$MsjAlter = "Seleccione Fecha de Incorporación";
				}

			if($MsjAlter == "")
			{
				# OBJETOS
					$bean_persona      =  new Bean_persona() ;
					$bean_perparametro =  new Bean_perparametro() ;
					$bean_parametro    =  new Bean_parametro() ;

					$objPersona      = new ClsPersona();
					$objPerParametro = new ClsPerParametro();
					$objParametro    = new ClsParametro();

				# DATOS FRM
					$cPerCodigo         = $frmP['rdCodigo'] ;
					$cParNomCodParcela  = $frmE['cParNomCodParcela_'] ;
					$cParDescParcela    = Mayusc($frmE['cParDescParcela_']) ;
					$nAreaParecela      = $frmE['nAreaParecela_'] ;
					$dFechaIncorParcela = $frmE['dFechaIncorParcela_'] ;
					// $objResponse->alert($cPerCodigo);

				// $bean_parametro->setcParJerarquia($nCaserio);
				$bean_parametro->setnParClase( 2006 );
				$bean_parametro->setcParNombre($cParNomCodParcela );
				$bean_parametro->setcParDescripcion("-" );

				# valida que el codigo sector no exista
		    	$data = $objParametro->Validar_Parametro($bean_parametro);

		        if(count($data["cuerpo"]) > 0)
		        {
		            $MsjAlter = "Código se encuentra registrado";
		        }

				# validacion en BD
				if($MsjAlter=="")
				{
					# REGISTRAR DATA
						try
						{
							# iniciamos la transaccion
					        	$objPersona->beginTransaction() ;

					        # REGISTRAR PARCELA COMO PARAMETRO
								$bean_parametro->setcParNombre($cParNomCodParcela );
								$bean_parametro->setcParDescripcion($cParDescParcela );
								$bean_parametro->setnParClase( 2006 );
			        			$data = $objParametro->Set_Parametro($bean_parametro);

			        			$nParCodigo = $data["cuerpo"][0]["nParCodigo"] ;

							# REGISTRAR PERPARAMETROS
								$bean_perparametro->setcPerCodigo($cPerCodigo) ;
								$bean_perparametro->setnParClase(2006) ;
								$bean_perparametro->setnParCodigo($nParCodigo) ;
								$bean_perparametro->setcPerParValor($nAreaParecela) ;
								$bean_perparametro->setcPerParGlosa($dFechaIncorParcela) ;
								# Fecha Incorporacion
								$dat1 = $objPerParametro->Set_PerParametro($bean_perparametro ) ;

							# INSERTAMOS LA TRANSACCION
								Insertar_Transaccion(1,"NUEVO PARCELA nParCodigo: ".$nParCodigo.", cPerCodigo:".$cPerCodigo.", cParDescParcela:".$cParDescParcela ,"") ;

							# si todo a tendido exito
				        		$objPersona->commit();
				        		$Funcion = "xajax_Listar_Parcelas( 0,15,1,1 ) ; ocultar_emergente();";
						}catch(Exception $e)
			        	{
			        		# si ha habido algun error
			        		$objPersona->rollback();
			        		// $MsjAlter =  "Error de registro.".$e->getMessage() ;
			        		$MsjAlter =  "Error de registro.";
			        	}
				}
			}

			$objResponse->assign("labelMsj","innerHTML",$MsjAlter);
			$objResponse->script($Funcion);
			return $objResponse;
		}

	# Editar
		function Editar_Parcela($frm)
		{
			$objResponse = new xajaxResponse();

			$formulario = "";
			$nPrdTipo = "";
				if (!empty($frm["rdCodigo_Parcela"]))
				{
					$nParCodigo =  $frm["rdCodigo_Parcela"];
					$cPerCodigo =  $frm["rdCodigo"];

					$objParametro   = new ClsParametro();
					$objPerParametro =  new ClsPerParametro() ;

					$bean_parametro = new Bean_parametro() ;
					$bean_perparametro = new Bean_perparametro() ;

					$bean_parametro->setnParCodigo($nParCodigo);
					$bean_parametro->setnParClase( 2006 );

					$dataParametro = $objParametro->Buscar_Parametro($bean_parametro) ;
					$cParNombre      = $dataParametro["cuerpo"][0]["cParNombre"] ;
					$cParDescripcion = $dataParametro["cuerpo"][0]["cParDescripcion"] ;

					# Buscar PerParametro
						$bean_perparametro->setcPerCodigo($cPerCodigo) ;
						$bean_perparametro->setnParCodigo($nParCodigo) ;
						$bean_perparametro->setnParClase(2006) ;
						$dataPerPar = $objPerParametro->Buscar_PerParametro($bean_perparametro ) ;

						$nAreaParecela = $dataPerPar["cuerpo"][0]["cPerParValor"] ;
						$dFechaIncorParcela = $dataPerPar["cuerpo"][0]["cPerParGlosa"] ;

						$formulario .= Frm_Parcela("Actualizar_Parcela", $nParCodigo , $cParNombre , $cParDescripcion , $nAreaParecela , $dFechaIncorParcela ) ;

					# configurando emergente
					$FrmRpta = FrmEmergente("ACTUALIZAR Parcela", $formulario);
					$objResponse->script("mostrar_emergente();");

					$objResponse->assign("emergente_contenido","innerHTML",$FrmRpta);
					$objResponse->script("Calendar_Load('dFechaIncorParcela_');");
				}
				else
				{
					$formulario .="<div class='divContenedor'>";
	    			$formulario .=	"<div class='divFila' style='text-align:center; margin-top:10px;'>";
				    $formulario .= 		"<label style='color:#000000; font-family:Arial; font-size:12px; font-weight:bold;'>¡SELECCIONE UN REGISTRO DE LA LISTA!</label>";
				    $formulario .=	"</div>";
				    $formulario .="</div>";

				    $FrmRpta = FrmEmergente("ACTUALIZAR Parcela", $formulario);
					$objResponse->script("mostrar_emergente();");
					// $objResponse->assign("emergente","style.height","180px");
					$objResponse->assign("emergente_contenido","innerHTML",$FrmRpta);
				}

			return $objResponse;
		}

	# Actualizar
		function Actualizar_Parcela($frmE , $frmP)
		{
			$objResponse = new xajaxResponse();


			$MsjAlter = "";
			$Funcion = "";
			#VALIDACION

				if(empty($frmP['rdCodigo'])){
					$MsjAlter = "Seleccionar Productor";
				}
				if(empty($frmE['nParCodParcela_'])){
					$MsjAlter = "No Existe Parcela Seleccionada";
				}
				if(empty($frmE['cParNomCodParcela_'])){
					$MsjAlter = "Ingrese Codigo de Parcela.";
				}
				if(empty($frmE['cParNomCodParcela_'])){
					$MsjAlter = "Ingrese Codigo de Parcela.";
				}
				if(empty($frmE['cParDescParcela_'])){
					$MsjAlter = "Ingrese Nombre de Parcela";
				}
				if(empty($frmE['nAreaParecela_'])){
					$MsjAlter = "Ingrese Área de Parcela.";
				}
				if(empty($frmE['dFechaIncorParcela_'])){
					$MsjAlter = "Seleccione Fecha de Incorporación";
				}
				//
			if($MsjAlter == "")
			{
				# OBJETOS
					// $bean_persona      =  new Bean_persona() ;
					$bean_perparametro =  new Bean_perparametro() ;
					$bean_parametro    =  new Bean_parametro() ;

					// $objPersona      = new ClsPersona();
					$objPerParametro = new ClsPerParametro();
					$objParametro    = new ClsParametro();

				# DATOS FRM
					$cPerCodigo         = $frmP['rdCodigo'] ;
					$nParCodigo         = $frmE['nParCodParcela_'] ;
					$cParNomCodParcela  = $frmE['cParNomCodParcela_'] ;
					$cParDescParcela    = Mayusc($frmE['cParDescParcela_']) ;
					$nAreaParecela      = $frmE['nAreaParecela_'] ;
					$dFechaIncorParcela = $frmE['dFechaIncorParcela_'] ;
					// $objResponse->alert($cPerCodigo);

				// $bean_parametro->setcParJerarquia($nCaserio);
				$bean_parametro->setnParClase( 2006 );
				$bean_parametro->setcParNombre($cParNomCodParcela );
				$bean_parametro->setcParDescripcion("-" );

				# valida que el codigo sector no exista
		    	$data = $objParametro->Validar_Parametro($bean_parametro);

		        if(count($data["cuerpo"]) > 0)
		        {
		            $MsjAlter = "Código se encuentra registrado";
		        }

				# validacion en BD
				if($MsjAlter=="")
				{
					# REGISTRAR DATA
						try
						{
							# iniciamos la transaccion
					        	$objParametro->beginTransaction() ;

					        # REGISTRAR PARCELA COMO PARAMETRO
								$bean_parametro->setnParCodigo($nParCodigo);
								$bean_parametro->setnParClase( 2006 );
								$bean_parametro->setcParNombre($cParNomCodParcela );
								$bean_parametro->setcParDescripcion($cParDescParcela );

			        			$data = $objParametro->Upd_Parametro($bean_parametro);

			        			// $nParCodigo = $data["cuerpo"][0]["nParCodigo"] ;

							# REGISTRAR PERPARAMETROS
								$bean_perparametro->setcPerCodigo($cPerCodigo) ;
								$bean_perparametro->setnParClase(2006) ;
								$bean_perparametro->setnParCodigo($nParCodigo) ;
								$bean_perparametro->setcPerParValor($nAreaParecela) ;
								$bean_perparametro->setcPerParGlosa($dFechaIncorParcela) ;
								# Fecha Incorporacion
								$dat1 = $objPerParametro->Upd_PerParametro($bean_perparametro ) ;

							# INSERTAMOS LA TRANSACCION
								Insertar_Transaccion(2,"ACTUALIZAR PARCELA nParCodigo: ".$nParCodigo.", cPerCodigo:".$cPerCodigo.", cParDescParcela:".$cParDescParcela ,"") ;

							# si todo a tendido exito
				        		$objParametro->commit();
				        		$Funcion = "xajax_Listar_Parcelas( 0,15,1,1 ) ; ocultar_emergente();";
						}catch(Exception $e)
			        	{
			        		# si ha habido algun error
			        		$objParametro->rollback();
			        		// $MsjAlter =  "Error de registro.".$e->getMessage() ;
			        		$MsjAlter =  "Error de registro.";
			        	}
				}
			}

			$objResponse->assign("labelMsj","innerHTML",$MsjAlter);
			$objResponse->script($Funcion);
			return $objResponse;
		}

	#ELIMINAR
		function Eliminar_Parcela($frm)
		{
			$objResponse = new xajaxResponse();

			if(empty($frm["rdCodigo"]))
			{
				$nPerCodigo = "";
			}
			else
			{

				$nPerCodigo = $frm["rdCodigo"];
				$nParCodigo = $frm["rdCodigo_Parcela"];

			}


			$formulario = FrmEliminar("ConfEliminar_Parcela",$nPerCodigo."-".$nParCodigo);

			$FrmRpta = FrmEmergente("ELIMINAR SECTOR", $formulario);
			$objResponse->script("mostrar_emergente();");
			$objResponse->assign("emergente","style.height","130px");
			$objResponse->assign("emergente_contenido","innerHTML",utf8_encode($FrmRpta));

			return $objResponse;
		}

	#CONFIRMAR ELIMINACION
		function ConfEliminar_Parcela($nParCodigo , $nEstado = 0 )
		{
			$objResponse = new xajaxResponse();

			$MsjAlter = "&nbsp;";
			$Funcion = "";

			$objPerParametro = new ClsPerParametro();
			$objParametro   = new ClsParametro();

			$bean_parametro    = new Bean_parametro();
			$bean_perparametro = new Bean_perparametro();

			$arr = explode('-', $nParCodigo);
			$cPerCodigo = $arr[0];
			$nParCodigo = $arr[1];


			$bean_parametro->setnParCodigo($nParCodigo);
			$bean_parametro->setnParClase( 2006 );
			$bean_parametro->setnParEstado($nEstado);

			$bean_perparametro->setcPerCodigo($cPerCodigo) ;
			$bean_perparametro->setnParCodigo($nParCodigo) ;
			$bean_perparametro->setnParClase(2006) ;
			$bean_perparametro->setnPerParEstado($nEstado) ;



			try
	    	{	# iniciamos la transaccion
	    		$objParametro->beginTransaction() ;
    			# Actulizar estado del paramentro  como Sector
				$objParametro->Upd_Parametro_Estado($bean_parametro);
				$objPerParametro->Upd_PerParametro_Estado($bean_perparametro);

				Insertar_Transaccion(3,"ELIMNO PARCELA: cPerCodigo: ".$cPerCodigo." nParCodigo : ".$nParCodigo." - nParClase : 2006 ","") ;

				# si todo a tendido exito
	    		$objParametro->commit();

	    		$Funcion = "xajax_Listar_Parcelas(0,15,1,1); ocultar_emergente();";

	    	}catch(Exception $e)
	    	{
	    		# si ha habido algun error
	    		$objParametro->rollback();
	    		// $MsjAlter = "Error de registro: ";
	    		$MsjAlter = "Error de registro: ".$e->getMessage();
	    		// $MsjAlter = "Error de registro: ". $e->getMessage() ;
	    	}

			$objResponse->assign("labelMsj","innerHTML",$MsjAlter);
			$objResponse->script($Funcion);
			return $objResponse;
		}
	# FRM PARCELA
		function Frm_Parcela($funcion, $nParCodParcela = 0 , $cParNomCodParcela = "" , $cParDescParcela = "" , $nAreaParecela = "" , $dFechaIncorParcela = "" )
		{
			if(empty($dFechaIncorParcela))
			{
				$dFechaIncorParcela = date("d/m/Y") ;
			}
			$formulario = '
		    	<div class="vform vformContenedor">
		    		<fieldset class="c12">
		    		<input type="hidden" name="nParCodParcela_" value="'.$nParCodParcela.'" />' ;

		    	$formulario .='<fieldset class="c6 ">
	                                <label for="cParNomCodParcela_">Codigo</label>
	                                <span class="pre  icon-text"></span>
	                                <input type="text" class="pre " name="cParNomCodParcela_" id="cParNomCodParcela_" value="'.$cParNomCodParcela.'" placeholder="INGRESE Codigo Parcela "  maxlength="8">
	                            </fieldset>';
	            $formulario .='<fieldset class="c6 ">
	                                <label for="cParDescParcela_">Parcela </label>
	                                <span class="pre  icon-text"></span>
	                                <input type="text" class="pre " name="cParDescParcela_" id="cParDescParcela_" value="'.$cParDescParcela.'" placeholder="INGRESE  Nombre Parcela ">
	                            </fieldset>';
	            $formulario .='<fieldset class="c6 ">
	                                <label for="nAreaParecela_">Área </label>
	                                <span class="pre  icon-text"></span>
	                                <input type="text" class="pre " name="nAreaParecela_" id="nAreaParecela_" value="'.$nAreaParecela.'" placeholder="INGRESE Area Parcela " onfocus="Validar_Decimal(this) ;" maxlength="4">
	                            </fieldset>';
	            $formulario .='<fieldset class="c6 ">
	                                <label for="dFechaIncorParcela_">Fecha Incorporación </label>
	                                <span class="pre  icon-calendar"></span>
	                                <input type="text" class="pre " name="dFechaIncorParcela_" id="dFechaIncorParcela_" value="'.$dFechaIncorParcela.'" placeholder="INGRESE Fecha de Incorporación ">
	                            </fieldset>';

	            $formulario .=' <div id="labelMsj" class="c12 MsjAlert "></div>
					            <div id="botonCancelar" class="c2 text-right hide">
					               <a href="#" onclick="ocultar_emergente();">
					               <span class="boton-cancelar">Cancelar</span>
					               <span class="boton-cancelar"></span>
					               </a>
					            </div>
					            <div id="botonGuardar" class="c3 text-right">
					               <a href="#" onclick="xajax_'.trim($funcion).'(xajax.getFormValues(frmEmergente),xajax.getFormValues(FrmPrincipal) );" class="boton">
					               <span class="nav-btn-nombre"> Guardar </span>
					               <span class=" post icon-save "></span>
					               </a>
					            </div>';

			// $formulario .=botonRegistrar($funcion) ;
			$formulario .='	</div>';
			return $formulario;
		}

	# REPORTE EN PDF
		function Rpt_Parcela_Pdf($frm="")
		{
			$objResponse = new xajaxResponse();
			$objParcela  =  new ClsParcela() ;
			$objPersona  =  new ClsPersona() ;

			$bean_parametro    = new Bean_parametro();
			$bean_perparametro = new Bean_perparametro();
			$bean_persona = new Bean_persona();

			# validaciones
				if(empty($frm["rdCodigo"]))
				{
					$cPerCodigo = "-";
				}else{
					$cPerCodigo = $frm["rdCodigo"];
				}
				if(empty($frm["s_cCodigoParcela_"]))
				{
					$cCodigoParcela = "-";
				}else{
					$cCodigoParcela = $frm["s_cCodigoParcela_"];
				}
				if(empty($frm["s_cParcela_"]))
				{
					$cParcela = "-";
				}else{
					$cParcela = $frm["s_cParcela_"];
				}

			# parametro
			$bean_parametro->setnOriRegistros(0) ;
			$bean_parametro->setnNumRegMostrar(0) ;
			$bean_parametro->setnPagRegistro(0) ; # que no pagine
			$bean_parametro->setcParNombre($cCodigoParcela) ;
			$bean_parametro->setcParDescripcion($cParcela) ;
			# perparametro
			$bean_perparametro->setcPerCodigo($cPerCodigo) ;

		    $data = $objParcela->Get_Parcelas_by_cPerCodigo($bean_parametro ,$bean_perparametro );

		 	$bean_persona->setcPerCodigo($cPerCodigo) ;
			$dataPersona = $objPersona->Buscar_Persona_By_cPerCodigo($bean_persona) ;

			$formulario= "";



			if (count($data["cuerpo"]) > 0)
			{

				$formulario .= "<table class='table'>" ;

				$formulario .='
						<tr class="border-bottom">
							<th class="" style="width:10%;"  colspan="5" > Productor </th>
						</tr>
					' ;
				$formulario .='
						<tr class="border-bottom">
							<td class="" style="width:10%;"  colspan="5" > '.$dataPersona["cuerpo"][0]["cPerApellidos"].' '.$dataPersona["cuerpo"][0]["cPerNombre"]. ' </td>
						</tr>
					' ;

				$formulario .='
						<tr class="border-bottom">
							<th class="" style="width:10%;"> Num </th>
							<th class="" style="width: 20% ;"> Código </th>
							<th class="" style="width: 20% ;"> Parcela </th>
							<th class="" style="width: 30%;"> Area(Ha) </th>
							<th class="" style="width: 20% ;"> Fecha Icorp. </th>
						</tr>
					' ;

				$formulario .= "<tbody>" ;

				for ($i = 0; $i < count($data["cuerpo"]); $i++)
            	{
						$formulario.="<tr>";
		                    $formulario.= 	"<td>".($i + 1 )."</td>";
						   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cParNombre"]."</td>";
						   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cParDescripcion"]."</td>";
						   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cPerParValor"]."</td>";
						   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cPerParGlosa"]."</td>";
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
							<h3 class='rounded text-center mayusc title'> Lista de Parcelas  </h3>
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

