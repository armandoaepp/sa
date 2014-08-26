<?php
	#REGISTRO DE FUNCTIONs PARA DAR MANTENIMIENTO A CUALQUIER PARAMETRO
		$xajax->registerFunction("Listar_Comprob_Entradas");
		$xajax->registerFunction("Filtrar_Comprob_Entrada");
		$xajax->registerFunction("Nuevo_Comprob_Entrada");
		$xajax->registerFunction("Insertar_Comprob_Entrada");
		$xajax->registerFunction("Editar_Comprob_Entrada");
		$xajax->registerFunction("Actualizar_Comprob_Entrada");
		$xajax->registerFunction("Eliminar_Comprob_Entrada");
		$xajax->registerFunction("ConfEliminar_Comprob_Entrada");
		$xajax->registerFunction("Rpt_Comprob_Entrada_Pdf");
		$xajax->registerFunction("Configurar_Comprob_Entrada");
		$xajax->registerFunction("Buscar_Productor");
		$xajax->registerFunction("Agregar_Persona");
		$xajax->registerFunction("Cargar_Numeracion_Serie");



		# LISTA PARAMETRO
			function Listar_Comprob_Entradas($nOriRegistros, $nNumRegMostrar, $nPagRegistro, $nPagAct)
			{

					$objResponse = new xajaxResponse();

			   		$FuncionSearch = 'xajax_Filtrar_Comprob_Entrada('.$nOriRegistros.', '.$nNumRegMostrar.', '.$nPagRegistro.', '.$nPagAct.',  xajax.getFormValues(FrmPrincipal) );';
					$FuncionEnter = ' if(event.keyCode == 13 ){'.$FuncionSearch.'} ; if( (jq(this).val()).length  == 0){	'.$FuncionSearch.' }';


					$formulario ='';
					$formulario .= ' <div class="ContenedorTable">
							<table style="width:100%;" >
								<tr class="title-table" >
									<td  style="width:20%;">&nbsp; C&oacute;digo</td>
									<td  style="width:30%;">&nbsp;abreviatura </td>
									<td  style="width:50%;">&nbsp; Comprob_Entradas</td>
								</tr>
						    	<tr class="vform">
									<td>
									    <input  type="search" disabled="disabled" name="" placeholder="" />
									</td>
									<td>
						    		    <input type="search" name="B_cParNombre_" id="B_cParNombre_" placeholder=""
						    		    onkeyup="'.$FuncionEnter.'"
							    		onsearch="'.$FuncionSearch.'" />

									</td>
									<td>
						    		    <input type="search" name="B_cParDescripcion_" id="B_cParDescripcion_" placeholder="Buscar Comprob_Entrada"
						    		   onkeyup="'.$FuncionEnter.'"
							    		onsearch="'.$FuncionSearch.'" />
									</td>
								</tr>
								<tbody id="tbodyData" class="table table-hover table-border">

								</tbody>
						    </table>
						    </div>';

					// $formulario="<center>".$formulario."</center>";
				    $objResponse->assign("ContenedorPrincipal","innerHTML",$formulario);
				    $objResponse->script("xajax_Filtrar_Comprob_Entrada('".$nOriRegistros."', '".$nNumRegMostrar."', '".$nPagRegistro."', '".$nPagAct."',  xajax.getFormValues(FrmPrincipal) );");

					return $objResponse;
			}

		# FILTAR PARAMETRO
			function Filtrar_Comprob_Entrada($nOriRegistros, $nNumRegMostrar, $nPagRegistro, $nPagAct, $frm)
			{
				$objResponse = new xajaxResponse();


				if(empty($frm["B_cParDescripcion_"]))
				{
					 $cParDescripcion="-";
				}else{
					$cParDescripcion=$frm["B_cParDescripcion_"];
				}
				if(empty($frm["B_cParNombre_"]))
				{
					 $cParNombre="-";
				}else{
					 $cParNombre=$frm["B_cParNombre_"];
				}
					#Se Instrancia la clase Bean_parametro en un objeto y se encapasula los con los datos
					$objParametro = new ClsParametro() ;
					$bean_parametro = new Bean_parametro() ;


					$bean_parametro->setnOriRegistros($nOriRegistros) ;
					$bean_parametro->setnNumRegMostrar($nNumRegMostrar) ;
					$bean_parametro->setnPagRegistro(0) ;//que no pagine
					$bean_parametro->setnParClase(2007) ;

					$bean_parametro->setcParNombre($cParNombre) ;
					$bean_parametro->setcParDescripcion($cParDescripcion) ;


					# se llama a la funciona(sin paginado) y se le envia el objeto
			    	$AdoRs =$objParametro->Filtrar_Parametro($bean_parametro);

			   		#Capturar el número de registros de acuerdo al objeto que se le envia y los datos qye recibe es un array
			    	$nNumRegExist = count($AdoRs["cuerpo"]);

				    #Filtrar registros deacuerdo al origen de datos y y viene paginados
					$bean_parametro->setnPagRegistro($nPagRegistro) ;

			    	$data =$objParametro->Filtrar_Parametro($bean_parametro);

			    $formulario= "";
				$Paginacion="&nbsp;";
				# se verifica que el array tenga datos
				if (count($data["cuerpo"]) > 0)
				{
					# se recorre el array y se extraer cada uno de los registros
					for ($i = 0; $i < count($data["cuerpo"]); $i++)
		            {
	            		$formulario.="<tr id='tr".$i."' onclick=\"js_seleccionar_fila(".$i.");\">";
	                    $formulario.= 	"<td>";
	                    // $formulario.=      "<label for='rdCodigo".$i."'> ";
	                    $formulario.=      "<label > ";
	                    $formulario.=	   		'<input type="radio" value="'.$data["cuerpo"][$i]["nParCodigo"].'" name="rdCodigo" id="rdCodigo'.$i.'"  />';
	                    $formulario.=      "".substr("0000".($i+1),-5)."</label>";
	                    $formulario.=  	"</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cParNombre"]."</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cParDescripcion"]."</td>";
						$formulario.="</tr>";
			        }
			        #$nNumRegExist, $nNumRegMostrarxPag, $nPagAct,  $cNameFunction, $frm , $ncantlink = 10
					$Paginacion= Paginar($nNumRegExist, $nNumRegMostrar,  $nPagAct, 'xajax_Filtrar_Comprob_Entrada', 'xajax.getFormValues(FrmPrincipal)');

					$objResponse->assign("tbodyData","innerHTML",$formulario);
			   		$objResponse->assign("ContenedorPaginado","innerHTML",$Paginacion);
				}
				else
				{
					$objResponse->assign("tbodyData","innerHTML",$formulario);
			   		$objResponse->assign("ContenedorPaginado","innerHTML",$Paginacion);
				}

				return $objResponse;
			}

		#MOSTRAR FRM NUEVO
			function Nuevo_Comprob_Entrada()
			{
				$objResponse = new xajaxResponse();
				#Formulario
				$formulario = Frm_Comprob_Entrada("Insertar_Comprob_Entrada");
				# configurando emergente
					$FrmRpta = FrmEmergente("NUEVO Comprobante de Entrada  ", $formulario);
					$objResponse->assign("emergente_contenido","innerHTML",$FrmRpta);

					$objResponse->assign("emergente","style.width","620px");
					# MOSTRAR EL EMERGENTE AL FINAL PARA PODER REDIMENSIONAR

					$objResponse->script("mostrar_emergente();");

				return $objResponse;
			}

		#INSERTAR
			function Insertar_Comprob_Entrada($frm)
			{
				$objResponse = new xajaxResponse();
				$MsjAlter = "";
				$Funcion = "#";

				// nParCodigo_
				// nComprobante_
				// nSerie_
				// NumeroSerie_
				// FechaRegistro_
				// Persona_
				// nPerCodigo_
				// nSector_
				// nSacos_
				// LibrasBruta_
				// LibrasTara_
				// LibrasNetas_
				// QuintalesNetos_
				// KgNetos_
				// Rendimiento_
				// HUmedad_
				// PrecioQuintal_
				// Total_
				// Premio_
				// Obsevacion_

				# VALIDACIONES
					/*if(empty($frm["nSerie_"]))
					{
						$MsjAlter = "Selecionar Serie.";
					}
					elseif(empty($frm["NumeroSerie_"]))
					{
						$MsjAlter = "Debe de Ingresar el Numero de Serie " ;
					}
					elseif(empty($frm["nPerCodigo_"]))
					{
						$MsjAlter = "Debe Seleccionar un Productor" ;
					}

					elseif(empty($frm["nSector_"]))
					{
						$MsjAlter = "Seleccionar Sector." ;
					}elseif(empty($frm["nSacos_"]))
					{
						$MsjAlter = "Ingrese el Número de Sacos " ;
					}
					elseif(empty($frm["LibrasBruta_"]))
					{
						$MsjAlter = "Ingrese Libras Brutas " ;
					}
					elseif(empty($frm["Rendimiento_"]))
					{
						$MsjAlter = "Ingrese el Rendimiento." ;
					}
					elseif(empty($frm["HUmedad_"]))
					{
						$MsjAlter = "Ingrese el HUmedad." ;
					}
					elseif(empty($frm["PrecioQuintal_"]))
					{
						$MsjAlter = "Ingrese el Precio Quintal." ;
					}*/

				if($MsjAlter=="")
				{

					// $nParCodigo     = $frm["nParCodigo_"];
					// $nComprobante   = $frm["nComprobante_"];
					$nSerie         = $frm["nSerie_"];
					$NumeroSerie    = $frm["NumeroSerie_"];
					$FechaRegistro  = $frm["FechaRegistro_"];
					$Persona        = $frm["Persona_"];
					$nPerCodigo     = $frm["nPerCodigo_"];
					$nSector        = $frm["nSector_"];
					$nSacos         = $frm["nSacos_"];
					$LibrasBruta    = $frm["LibrasBruta_"];
					$LibrasTara     = $nSacos * 0.5 ; #  $frm["LibrasTara_"];
					$LibrasNetas    = $LibrasBruta - $LibrasTara ; #  $frm["LibrasNetas_"];
					$QuintalesNetos = $LibrasNetas / 120; # $frm["QuintalesNetos_"];
					$KgNetos        = $QuintalesNetos * 55.2; # $frm["KgNetos_"];
					$Rendimiento    = $frm["Rendimiento_"];
					$HUmedad        = $frm["HUmedad_"];
					$PrecioQuintal  = $frm["PrecioQuintal_"];

					$Total          = $QuintalesNetos * $PrecioQuintal; # $frm["Total_"];
					$Total          = truncateFloat($Total, 2) ;

					$Premio         = $frm["Premio_"];
					$Obsevacion     = Mayusc($frm["Obsevacion_"]);

					$objResponse->alert($Total) ;

					$cPerJuridica = Get_cPerCodigo_PerJuridica() ; # codigo de empresa deacuerdo al usuario en linea

					$bean_parametro = new  Bean_parametro() ;
					$bean_percuenta = new Bean_PerCuenta() ;
					$bean_cuentacorriente = new  Bean_cuentacorriente() ;

					$objPerCuenta = new ClsPerCuenta();
					$objPeriodo = new ClsPeriodo();


					$bean_percuenta->setcPerCodigo($nPerCodigo );
					$bean_percuenta->setcPerJurCodigo($cPerJuridica);


					$data = $objPerCuenta->Get_PerCuenta_cPerCodigo_cPerJuridica($bean_percuenta) ;
					$nPerCtaCodigo = $data["cuerpo"][0]["nPerCtaCodigo"];

					$dataPeriodo = $objPeriodo->Get_Periodo_Activo();
					$nPrdCodigo = $dataPeriodo["cuerpo"][0]["nPrdCodigo"];

					$fechaActual = Fecha_Actual_BD() ;


					$bean_cuentacorriente->setnPerCtaCodigo($nPerCtaCodigo);
					$bean_cuentacorriente->setnCtaCteTipo(1);
					$bean_cuentacorriente->setnCtaCteItem(1);
					$bean_cuentacorriente->setfCtaCteImporte($Total );
					$bean_cuentacorriente->setnCtaCteCuota(1);
					$bean_cuentacorriente->setnCtaCteEstado(2); # pago pendiente
					$bean_cuentacorriente->setdCtaCteFecVence($fechaActual);
					$bean_cuentacorriente->setdCtaCteFecPago($fechaActual);
					$bean_cuentacorriente->setdCtaCteFecEmis($fechaActual);
					$bean_cuentacorriente->setcCtaCteGlosa("Comprobante de Entrada");
					$bean_cuentacorriente->setnPrdCodigo($nPrdCodigo);
					$bean_cuentacorriente->setnMonCodigo(1); # soles


					// $objParametro   = new ClsParametro();
			  //   	$dataValida = $objParametro->Get_Parametro_by_cPar_Desc_Jeranquia($bean_parametro);
			  //       #VALIDAR
				 //        if(count($dataValida["cuerpo"])>0){
	  			  //$MsjAlter= ".::YA EXISTE UN REGISTRO IDENTICO::.";
				 //        }
				 //        else{
				        	try
				        	{
				        		# INSTANCIOAMOS EL OBJECTO INICIAL
					        		$objCuentaCorriente   = new ClsCuentaCorriente();
								# LLAMAMOS AL METODO QUE RETORNA LA CONEXION
									$cnx = $objCuentaCorriente->get_connection() ;
								# INICIAMOS LA TRANSACCION
				        			$objCuentaCorriente->beginTransaction() ;
				        			$data = $objCuentaCorriente->Set_CuentaCorriente($bean_cuentacorriente) ;
				        			$objResponse->alert($data ) ;

									# Insertar_Transaccion(1,"NUEVO PRODUCTO: nParCodigo : ".$nParCodigo." nSerCodigo -".$nSerCodigo."- nParClase : ".$nParClase." - cParDescripcion : ".$cParDescripcion,"",$cnx) ;
								# si todo a tendido exito
				        		$objCuentaCorriente->commit();

								// $Funcion = " xajax_Listar_Comprob_Entradas(0,20,1,1) ;ocultar_emergente();";
				        	}catch(Exception $e)
				        	{
				        		# si ha habido algun error
				        		$objCuentaCorriente->rollback();
				        		$MsjAlter =  "Error de registro.".$e->getMessage();
				        	}
			        	// }
				}

				$objResponse->assign("labelMsj","innerHTML",$MsjAlter);
				$objResponse->script($Funcion);
				return $objResponse;
			}

		# MOSTRAR FRM EDITAR
			function Editar_Comprob_Entrada($frm)
			{
				$objResponse = new xajaxResponse();

				$formulario = "";
				if (isset($frm["rdCodigo"])) {

					$bean_parametro = new  Bean_parametro() ;
				  	$bean_parametro->setnParClase(2007) ;
					$bean_parametro->setnParCodigo($frm["rdCodigo"]);

					$objParametro = new ClsParametro();
					$data	= $objParametro->Buscar_Parametro($bean_parametro);

					if(count($data["cuerpo"])>0)
					{
						$nnParCodigo     = $data["cuerpo"][0]["nParCodigo"];
						$cParDescripcion = Mayusc($data["cuerpo"][0]["cParDescripcion"]);
						$cParNombre      = Mayusc($data["cuerpo"][0]["cParNombre"]);

						// Llamamo al la Funcion del Formulario Modal Parameto enviadoles los datos
						$formulario .= Frm_Comprob_Entrada("Actualizar_Comprob_Entrada",$nnParCodigo,$cParDescripcion,$cParNombre);
					 }
				}
				else{
					# muesta el mensaje de seleccionar registro
				    $formulario = SeleccionarRegistro() ;
				}
				$FrmRpta = FrmEmergente("ACTUALIZAR PRODUCTO", $formulario);

				$objResponse->script("mostrar_emergente();");
				$objResponse->assign("emergente_contenido","innerHTML",$FrmRpta);

				return $objResponse;
			}

		#ACTUALIZAR
			function Actualizar_Comprob_Entrada($frm)
			{
				$objResponse = new xajaxResponse();

				$MsjAlter = "";
				$Funcion = "";

				if(empty($frm["cParNombre_"])){
					$MsjAlter = "Completar Abreviatura.";
				}
				if(empty($frm["cParDescripcion_"])){
					$MsjAlter = "Completar Serie Comprobante";
				}

				if($MsjAlter=="")
				{
					$bean_parametro = new  Bean_parametro() ;
					$objParametro = new ClsParametro();

					$nParCodigo 	 = $frm["nParCodigo_"] ;
					$nParClase       =	2007 ;
					$cParNombre      = $frm["cParNombre_"];
					$cParDescripcion = $frm["cParDescripcion_"];


					$cPerJuridica = Get_cPerCodigo_PerJuridica() ; # clas general -> cParJeraquia

				  	$bean_parametro->setnParCodigo($nParCodigo ) ;
				  	$bean_parametro->setnParClase($nParClase ) ;
				  	$bean_parametro->setcParJerarquia($cPerJuridica) ;
					$bean_parametro->setcParNombre($cParNombre );
					$bean_parametro->setcParDescripcion($cParDescripcion) ;

			    	$dataValida = $objParametro->Validar_Parametro_by_cPar_Desc_Jera_Upd($bean_parametro);
			        #VALIDAR
				        if(count($dataValida["cuerpo"])>0){
	        				$MsjAlter= ".::YA EXISTE UN REGISTRO IDENTICO::.";
				        }
				        else{

							try
				        	{
								# INSTANCIOAMOS EL OBJECTO INICIAL
									$objParametro = new ClsParametro();
								# LLAMAMOS AL METODO QUE RETORNA LA CONEXION
									$cnx = $objParametro->get_connection() ;
								# INICIAMOS LA TRANSACCION
									$objParametro->beginTransaction() ;

					        		$objParametro->Upd_Parametro($bean_parametro);
									Insertar_Transaccion(2,"ACTUALIZO PRODUCTO: - nParCodigo : ".$nParCodigo."- nParClase : ".$nParClase." - cParDescripcion : ".$cParDescripcion,"",$cnx) ;
								# si todo a tendido exito
				        			$objParametro->commit();

								$Funcion =" xajax_Listar_Comprob_Entradas(0,20,1,1) ; ocultar_emergente();";
				        	}catch(Exception $e)
				        	{
				        		# si ha habido algun error
				        			$objParametro->rollback();
				        		$MsjAlter =  "Error de registro.";
				        	}
				        }
				}


				$objResponse->assign("labelMsj","innerHTML",$MsjAlter);
				$objResponse->script($Funcion);
				return $objResponse;
			}

		#MOSTRAR ELIMINAR
			function Eliminar_Comprob_Entrada($frm)
			{
				$objResponse = new xajaxResponse();

				if(empty($frm["rdCodigo"]))
					$rdCodigo = "";
				else
					$rdCodigo = $frm["rdCodigo"];

				$formulario = FrmEliminar("ConfEliminar_Comprob_Entrada",$rdCodigo);

				$FrmRpta = FrmEmergente("ELIMINAR PRODUCTO", $formulario);
				$objResponse->script("mostrar_emergente();");
				$objResponse->assign("emergente_contenido","innerHTML",$FrmRpta);

				return $objResponse;
			}

		#CONFIRMAR ELIMINACION
			function ConfEliminar_Comprob_Entrada($nParCodigo,$Estado = 0 )
			{
				$objResponse = new xajaxResponse();

				$MsjAlter = "";
				$Funcion = "#";

				$bean_parametro = new  Bean_parametro() ;
			  	// $bean_parametro->setnParClase(2007) ;
				$bean_parametro->setnParCodigo($nParCodigo);
				$bean_parametro->setnParEstado($Estado);

				try
	        	{
					$objParametro = new ClsParametro();
					# LLAMAMOS AL METODO QUE RETORNA LA CONEXION
						$cnx = $objParametro->get_connection() ;
	        		# iniciamos la transaccion
	        			$objParametro->beginTransaction() ;

					$objParametro->Upd_Parametro_Estado($bean_parametro);
					// Insertar_Transaccion(3 ,"ELIMINO PRODUCTO: nParCodigo : ".$nParCodigo."- nParClase : 2007 ","",$cnx ) ;

					# si todo a tendido exito
	        		$objParametro->commit();

					$Funcion = " xajax_Listar_Comprob_Entradas(0,20,1,1) ; ocultar_emergente();";
	        	}
	        	catch(Exception $e)
	        	{
	        		# si ha habido algun error
	        		$objParametro->rollback();
	        		$MsjAlter =  "Error de registro.";
	        	}

				$objResponse->assign("labelMsj","innerHTML",$MsjAlter);
				$objResponse->script($Funcion);
				return $objResponse;
			}

		#FRM NUEVO / ACTUALIZAR
			function Frm_Comprob_Entrada($funcion="",$nParCodigo="",$cParDescripcion="",$cParNombre="")
			{
				$bean_parametro        = new  Bean_parametro() ;
				$bean_ctactenumeracion = new Bean_ctactenumeracion() ;

				$objParametro       = new ClsParametro();
				$objSerieNumeracion = new  ClsSerieNumeracion() ;
				$objComprobEntrada  = new ClsComprobEntrada() ;

				# PUNTO DE EMISION
				/*	$bean_parametro->setnParClase(1007 );
					$dataPuntos= $objParametro->Get_Parametro_By_cParClase($bean_parametro) ;
					$optionPE = SelectOption($dataPuntos, 'nParCodigo', 'cParDescripcion',-1);
				*/
				#  TIPOS DE COMPROBANTES DE PAGO
					$bean_parametro->setnParClase(1008 );
					$dataComprobante= $objParametro->Get_Parametro_By_cParClase($bean_parametro) ;
					$optionComprobante = SelectOption($dataComprobante, 'nParCodigo', 'cParDescripcion',2);

				#  SERIES
					$cPerJuridica = Get_cPerCodigo_PerJuridica() ;
					$bean_ctactenumeracion->setcPerJuridica($cPerJuridica) ;
					$bean_ctactenumeracion->setnComTipo(2);
					$dataSerie = $objComprobEntrada->Get_Series_cPerJuridica_nComTipo($bean_ctactenumeracion) ;
					$optionSerie = SelectOption($dataSerie , 'nParCodigo', 'cParDescripcion',1);

					$numeracionSerie = $dataSerie["cuerpo"][0]["Numero"] ;

				# SECTORES
					$bean_parametro->setnParClase(2002 );
					$dataSector = $objParametro->Get_Parametro_By_cParClase($bean_parametro) ;
					$optionSector = SelectOption($dataSector , 'nParCodigo', 'cParDescripcion',1);

					$FechaNow = Fecha_Actual_Barra();

					$FuncionSearch = 'xajax_Buscar_Productor(this.value, \'-\') ;' ;
					$FuncionEnter = ' if(event.keyCode == 13 ){'.$FuncionSearch.'} ;if( (jq(this).val()).length  == 0){	'.$FuncionSearch.' }';


					$formulario ="";
				    $formulario .=' <div class="vform vformContenedor">
				    				<input type="hidden" name="nParCodigo_" value="'.$nParCodigo.'" /> ' ;
					$formulario .='	<fieldset class="c12" > ' ;

						$formulario .=' <fieldset class="c4">
								    		<label for="nComprobante_">Comprobante</label>
								    		<select name="nComprobante_" id="nComprobante_" disabled>
								    		'.$optionComprobante.'
								    		</select>
								    	</fieldset> ';

						$formulario .=' <fieldset class="c2">
								    		<label for="nSerie_">Serie</label>
								    		<select name="nSerie_" id="nSerie_" onchange="xajax_Cargar_Numeracion_Serie(this.value, 2)">
								    		'.$optionSerie.'
								    		</select>
								    	</fieldset> ';

						$formulario .=' <fieldset class="c3" >
											<label for="NumeroSerie_"> Número de Serie </label>
											<input class="" type="text" id="NumeroSerie_" name="NumeroSerie_" placeholder ="INGRESE NUMERO SERIE " value="'.$numeracionSerie.'"style="padding-left:5px" readonly>
										</fieldset>';

						$formulario .=' <fieldset class="c3" >
											<label for="FechaRegistro_">Fecha de Acopio</label>
											<input class="" type="text" id="FechaRegistro_" name="FechaRegistro_" placeholder ="INGRESE Fecha Acopio " value="'.$FechaNow.'" style="padding-left:5px" readonly>
										</fieldset>';

						$formulario .=' <fieldset class="c7" >
											<label for="Persona_">Productor</label>
	                                		<span class="pre icon-search-right"></span>
											<input class="pre" type="text" id="Persona_" name="Persona_" placeholder ="Ingrese Apellidos Nombres / DNI" value="" onkeyup = "'.$FuncionEnter.'">
											<input type="hidden" id="nPerCodigo_" name="nPerCodigo_" >
											<div class="clear" ></div>

											' ;

							$formulario .= 	'<div class="divdesplegableBuscar">
												<div class="close-desplegable right" id="closeBusqueda_" style="display:none ;">
													<a href="#" onclick="js_Close_Desplegable(\'divLoadPersona_\'); ">
														<span class="icon-cross"></span>
													</a>
												</div>
												<div class="clear" ></div> ' ;

						$formulario .= 	'	<div class="ContenedorListaDesplegable" id="divLoadPersona_" style="display:none;" >
												</div>
											</div>
										</fieldset>';

						$formulario .=' <fieldset class="c5">
								    		<label for="nSector_">Sector</label>
								    		<select name="nSector_" id="nSector_">
								    		'.$optionSector.'
								    		</select>
								    	</fieldset> ';

						$formulario .=' <hr> ';

						$formulario .=' <fieldset class="c6">
								    		<label for="nSacos_">Sacos</label>
	                                		<span class="pre icon-text"></span>
											<input class="pre" type="text" id="nSacos_" name="nSacos_" placeholder ="Ingrese Numero de Sacos"  >
								    	</fieldset> ';

						$formulario .=' <fieldset class="c6">
								    		<label for="LibrasBruta_">Libras Brutas</label>
								    		<span class="pre icon-text"></span>
											<input class="pre" type="text" id="LibrasBruta_" name="LibrasBruta_" placeholder ="ingrese Libras brutas"  >
								    	</fieldset> ';

						$formulario .=' <fieldset class="c6">
								    		<label for="LibrasTara_"> Libras Tara </label>
								    		<span class="pre icon-text"></span>
											<input class="pre" type="text" id="LibrasTara_" name="LibrasTara_" placeholder ="ingrese Libras Tara "  >
								    	</fieldset> ';

						$formulario .=' <fieldset class="c6">
								    		<label for="LibrasNetas_">Libras Netas</label>
								    		<span class="pre icon-text"></span>
											<input class="pre" type="text" id="LibrasNetas_" name="LibrasNetas_" placeholder ="Libras Netas"  >
								    	</fieldset> ';

						$formulario .=' <fieldset class="c6">
								    		<label for="QuintalesNetos_">Quintales Netos </label>
								    		<span class="pre icon-text"></span>
											<input class="pre" type="text" id="QuintalesNetos_" name="QuintalesNetos_" placeholder ="Libras Netas"  >
								    	</fieldset> ';

						$formulario .=' <fieldset class="c6">
								    		<label for="KgNetos_">Kiligramos Netos </label>
								    		<span class="pre icon-text"></span>
											<input class="pre" type="text" id="KgNetos_" name="KgNetos_" placeholder ="Kiligramos Netos "  >
								    	</fieldset> ';

						$formulario .=' <fieldset class="c6">
								    		<label for="Rendimiento_"> Rendimiento </label>
								    		<span class="pre icon-text"></span>
											<input class="pre" type="text" id="Rendimiento_" name="Rendimiento_" placeholder ="Ingrese Rendimiento "  >
								    	</fieldset> ';

						$formulario .=' <fieldset class="c6">
								    		<label for="HUmedad_">Humedad</label>
								    		<span class="pre icon-text"></span>
											<input class="pre" type="text" id="HUmedad_" name="HUmedad_" placeholder ="Ingrese Humedad"  >
								    	</fieldset> ';

						$formulario .=' <fieldset class="c6">
								    		<label for="PrecioQuintal_">Precio por Quintal </label>
								    		<span class="pre icon-text"></span>
											<input class="pre" type="text" id="PrecioQuintal_" name="PrecioQuintal_" placeholder ="Ingrese Precion Quintal"  >
								    	</fieldset> ';

						$formulario .=' <fieldset class="c6">
								    		<label for="Total_"> Total</label>
								    		<span class="pre icon-text"></span>
											<input class="pre" type="text" id="Total_" name="Total_" placeholder ="Total"  >
								    	</fieldset> ';

						$formulario .=' <fieldset class="c6">
								    		<label for="Premio_"> Premio</label>
								    		<span class="pre icon-text"></span>
											<input class="pre" type="text" id="Premio_" name="Premio_" placeholder ="Premio Certificación "  >
								    	</fieldset> ';

						$formulario .=' <fieldset class="c6">
								    		<label for="Obsevacion_"> Observación</label>
								    		<span class="pre icon-text"></span>
											<input class="pre" type="text" id="Obsevacion_" name="Obsevacion_" placeholder ="Obsevacion "  >
								    	</fieldset> ';


					$formulario .='	</fieldset> ' ;
					$formulario .= botonRegistrar($funcion) ;
					$formulario .=' </div>';

					return $formulario;
			}

		# REPORTE DE ARTES DEPESCA
			function Rpt_Comprob_Entrada_Pdf($frm="")
			{
				$objResponse = new xajaxResponse();


					if(empty($frm["B_cParDescripcion_"]))
					{
						 $cParDescripcion="-";
					}else{
						$cParDescripcion=$frm["B_cParDescripcion_"];
					}
					if(empty($frm["B_cParNombre_"]))
					{
						 $cParNombre="-";
					}else{
						 $cParNombre=$frm["B_cParNombre_"];
					}
					#Se Instrancia la clase Bean_parametro en un objeto y se encapasula los con los datos
					$objParametro = new ClsParametro() ;
					$bean_parametro = new Bean_parametro() ;


					$bean_parametro->setnOriRegistros(0) ;
					$bean_parametro->setnNumRegMostrar(0) ;
					$bean_parametro->setnPagRegistro(0) ;//que no pagine
					$bean_parametro->setnParClase(2007) ;

					$bean_parametro->setcParNombre($cParNombre) ;
					$bean_parametro->setcParDescripcion($cParDescripcion) ;

					# se llama a la funciona(sin paginado) y se le envia el objeto
			    	$data = $objParametro->Filtrar_Parametro($bean_parametro);

				$formulario= "";

				if (count($data["cuerpo"]) > 0)
				{
					$i=1;
					$formulario .= "<table class='table'>" ;
					$formulario .='
							<tr class="border-bottom">
								<th class="" style="width:10%;"> Número</th>
								<th class="" style="width: 30% ;">Abreviatura</th>
								<th class="" style="width: 60%;"> Comprob_Entradas </th>
							</tr>
						' ;

					$formulario .= "<tbody>" ;

					for ($i = 0; $i < count($data["cuerpo"]); $i++)
	            	{
							$formulario.="<tr>";
		                    $formulario.= 	"<td style='text-align: center ;'>".($i+1)." </td>";
						   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cParNombre"]."</td>";
						   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cParDescripcion"]."</td>";
							$formulario.="</tr>";

					}
					$formulario .= "</tbody>" ;
					$formulario .= "<tfoot>" ;
					$formulario .= " 	<tr>" ;
					$formulario .= " 	<td  colspan='3' class='border-top'>   </td>" ;
					$formulario .= " 	</tr>" ;

					$formulario .= "</tfoot>" ;

					$formulario .= "</table>" ;
				}

				$HTML ="<html>
							<body>
							<br/>
								<h3 class='rounded text-center mayusc title'> Lista de Comprob_Entradas </h3>
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

		# BUSQUEDA DE PRODUCTOR
			# BUSCAR PRODUCTOR
				function Buscar_Productor($cPerApellidos_Nombres = "-" , $cPerDocNumero = "-")
				{
					# objetos
						$objResponse 	= new xajaxResponse();
						$objPerRelacion 	= new ClsPerRelacion();
					# variables
						$formulario = "";
						$display	= "none";

						if($cPerApellidos_Nombres != "-")
						{
							$Buscarx = $cPerApellidos_Nombres ;
							if(is_numeric($cPerApellidos_Nombres))
							{
								$longuitud = 3 ;
								$cPerDocNumero = $cPerApellidos_Nombres ;
								$cPerApellidos_Nombres = "-" ;
							}else
							{
								$longuitud = 2 ;
							}
						}else
						{
							$longuitud = 2 ;
						}

						if(strlen(trim($Buscarx))>= $longuitud)
						{
							$bean_persona     =  new Bean_persona() ;
							$bean_perrelacion =  new Bean_perrelacion() ;


							$cPerJuridica = Get_cPerCodigo_PerJuridica() ;
							$bean_perrelacion->setnPerRelTipo(2002) ;
							$bean_perrelacion->setcPerJuridica($cPerJuridica) ;

							$bean_persona->setcPerApellidos($cPerApellidos_Nombres) ; # viene encapsulado en cPerApellidos
							$bean_persona->setcPerNombre($cPerDocNumero) ; # recuperamos numero de documento que viene encapsulado en  cPerNombre

							$data = $objPerRelacion->Buscar_Persona_nPerRelTipo_cPerJuridica($bean_perrelacion , $bean_persona ) ;
							// $objResponse->alert($data ) ;

							if(count($data["cuerpo"]) > 0)
							{
									for ($i=0; $i < count($data["cuerpo"]) ; $i++)
									{
										$cPerCodigo 	= $data["cuerpo"][$i]['cPerCodigo'];
										$cPerApellidos = Mayusc($data["cuerpo"][$i]["cPerApellidos"]." " .$data["cuerpo"][$i]["cPerNombre"]);
										$cPerDocNumero = $data["cuerpo"][$i]["cPerDocNumero"];


										$formulario .=	"<div class='divListaDesplegable' style='top:-13px' onClick=\"xajax_Agregar_Persona('$cPerCodigo');\">";
								      	$formulario .= 		"<p>DNI: ".$cPerDocNumero." - : ".$cPerApellidos."  <span class='icon-user right space-small-right'></span></p>";
								      	$formulario .= 	"</div>";
									}
									$display="block";
					       	}

						}else
				       	{
						    $objResponse->assign("nPerCodigo_","value","");
						    // $objResponse->assign("Codigo_Propietario_","value","");
				       	}

		           	$objResponse->assign("divLoadPersona_","innerHTML",$formulario);
			       	$objResponse->assign("divLoadPersona_","style.display",$display);
			       	$objResponse->assign("closeBusqueda_","style.display",$display);


					return $objResponse;
				}

			# AGREGAR PRODUCTOR
				function Agregar_Persona($cPerCodigo = "" , $IdtextPersona = "nPerCodigo_")
				{
				    $objResponse 	= new xajaxResponse();
				    $objPersona	= new ClsPersona();
				    $bean_persona= new Bean_persona();

				    $bean_persona->setcPerCodigo($cPerCodigo) ;

				    $data 	= $objPersona->Buscar_Persona_By_cPerCodigo($bean_persona);

				    $objResponse->assign("Persona_","value",$data["cuerpo"][0]["cPerApellidos"]." ".$data["cuerpo"][0]["cPerNombre"]);

				    $objResponse->assign("nPerCodigo_","value",$cPerCodigo);

				    $objResponse->assign("divLoadPersona_","style.display","none");
				    $objResponse->assign("divLoadPersona_","innerHTML","");
			       	$objResponse->assign("closeBusqueda_","style.display","none");

					return $objResponse;
				}

		# CARGAR LA NUMERACION PARA UNA SERIE
			function Cargar_Numeracion_Serie($nSerieCod = 0 , $nComTipo = 2 )
			{
				$objResponse 	= new xajaxResponse();

				$bean_ctactenumeracion = new Bean_ctactenumeracion() ;
				$objComprobEntrada     = new ClsComprobEntrada() ;
				#  SERIES
					$cPerJuridica = Get_cPerCodigo_PerJuridica() ;
					$bean_ctactenumeracion->setcPerJuridica($cPerJuridica) ;
					$bean_ctactenumeracion->setnComTipo($nComTipo);
					$bean_ctactenumeracion->setnSerie($nSerieCod);

					$dataSerie = $objComprobEntrada->Get_Series_cPerJuridica_nComTipo_nSerie($bean_ctactenumeracion) ;

					$numeracionSerie = $dataSerie["cuerpo"][0]["Numero"] ;
					$objResponse->assign("NumeroSerie_", "value",$numeracionSerie);

				return $objResponse;
			}

?>