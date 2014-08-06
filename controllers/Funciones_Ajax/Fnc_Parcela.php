<?php

	$xajax->registerFunction("Listar_Parcelas");
	$xajax->registerFunction("Nuevo_Parcela");
	$xajax->registerFunction("Insertar_Parcela");

	# LISTAR
		// recibe el formulario Principal
		function Listar_Parcelas($frm )
		{
			    	$objResponse = new xajaxResponse();

			   		// $FuncionSearch = 'xajax_Filtrar_Caserio('.$nOriRegistros.', '.$nNumRegMostrar.', '.$nPagRegistro.', '.$nPagAct.',  xajax.getFormValues(FrmPrincipal) );';
			   		$FuncionSearch = 'xajax_Filtrar_();';
					$FuncionEnter = ' if(event.keyCode == 13 ){'.$FuncionSearch.'} ; if( (jq(this).val()).length  == 0){	'.$FuncionSearch.' }';

					$formulario ='';
					$formulario .= '<div class="ContenedorTable">

							<table style="width:100%;">
								<tr class="title-table text-left" >
									<th  style="width: 10%;">&nbsp; CÓDIGO </th>
									<th  style="width: 20%;">&nbsp; Parcela </th>
									<th  style="width: 20%;">&nbsp; Área(ha) </th>
									<th  style="width: 20%;">&nbsp; Producto </th>
								</tr>
						    	<tr class="vform">
									<td>
						    		    <input type="search" name="s_cCodigoParcela_" id="s_cCodigoParcela_" placeholder="Buscar por Codigo Parcela"
						    		    onkeyup="'.$FuncionEnter.'"
							    		onsearch="'.$FuncionSearch.'" />
									</td>
									<td>
						    		    <input type="search" name="s_cParcela_" id="s_cParcela_" placeholder="Buscar Parcela"
						    		    onkeyup="'.$FuncionEnter.'"
							    		onsearch="'.$FuncionSearch.'" />
									</td>
									<td>
						    		    <input type="search" name="s_cArea_" id="s_cArea_" placeholder="Buscar Área"
						    		    onkeyup="'.$FuncionEnter.'"
							    		onsearch="'.$FuncionSearch.'" />
									</td>
									<td>
						    		    <input type="search" name="s_ProductoParcela_" id="s_ProductoParcela_" placeholder="Buscar Producto"
						    		    onkeyup="'.$FuncionEnter.'"
							    		onsearch="'.$FuncionSearch.'" />
									</td>



								</tr>

								<tbody id="tbodyData" class="table table-hover table-border">

								</tbody>
						    </table>
						    </div>';
				    $objResponse->assign("Tab_Parcela","innerHTML",$formulario);
				    $objResponse->script("xajax_Menus_Botonera('100202');" ) ;
				    // $objResponse->script("xajax_Filtrar_Caserio('".$nOriRegistros."', '".$nNumRegMostrar."', '".$nPagRegistro."', '".$nPagAct."',  xajax.getFormValues(FrmPrincipal) );");
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
					$cPerCodigo  = $frmP['rdCodigo'] ;
					$cParNomCodParcela  = $frmE['cParNomCodParcela_'] ;
					$cParDescParcela    = Mayusc($frmE['cParDescParcela_']) ;
					$nAreaParecela      = $frmE['nAreaParecela_'] ;
					$dFechaIncorParcela = $frmE['dFechaIncorParcela_'] ;
					// $objResponse->alert($cPerCodigo);

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
				        		// $Funcion = " ocultar_emergente();";
				        		$Funcion = "xajax_Listar_Parcelas(xajax.getFormValues(FrmPrincipal)); ocultar_emergente();";
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
	                                <input type="text" class="pre " name="cParNomCodParcela_" id="cParNomCodParcela_" value="'.$cParNomCodParcela.'" placeholder="INGRESE Codigo Parcela ">
	                            </fieldset>';
	            $formulario .='<fieldset class="c6 ">
	                                <label for="cParDescParcela_">Parcela </label>
	                                <span class="pre  icon-text"></span>
	                                <input type="text" class="pre " name="cParDescParcela_" id="cParDescParcela_" value="'.$cParDescParcela.'" placeholder="INGRESE  Nombre Parcela ">
	                            </fieldset>';
	            $formulario .='<fieldset class="c6 ">
	                                <label for="nAreaParecela_">Área </label>
	                                <span class="pre  icon-text"></span>
	                                <input type="text" class="pre " name="nAreaParecela_" id="nAreaParecela_" value="'.$nAreaParecela.'" placeholder="INGRESE Area Parcela ">
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