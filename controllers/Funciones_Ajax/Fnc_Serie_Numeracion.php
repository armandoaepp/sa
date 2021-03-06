<?php

	# ASIGNAR SERIES A COMPROBANTES
		$xajax->registerFunction("Listar_Series_Numeracion");
		$xajax->registerFunction("Filtrar_Serie_Numeracion");
		$xajax->registerFunction("Nuevo_Serie_Numeracion");
		$xajax->registerFunction("Insertar_Serie_Numeracion");
		$xajax->registerFunction("Editar_Serie_Numeracion");
		$xajax->registerFunction("Actualizar_Serie_Numeracion");
		$xajax->registerFunction("Eliminar_Serie_Numeracion");
		$xajax->registerFunction("ConfEliminar_Serie_Numeracion");
		$xajax->registerFunction("Cerrar_Serie_Numeracion");
		$xajax->registerFunction("ConfCerrar_Serie_Numeracion");
		$xajax->registerFunction("Rpt_Serie_Numeracion_Pdf");

	# LISTAR
		function Listar_Series_Numeracion($nOriRegistros, $nNumRegMostrar, $nPagRegistro, $nPagAct)
		{
		    	$objResponse = new xajaxResponse();

				$objParametro   = new ClsParametro();
				$bean_parametro = new  Bean_parametro() ;
				$objSerieNumeracion = new  ClsSerieNumeracion() ;

				# PUNTO DE EMISION
					$bean_parametro->setnParClase(1007 );
					$dataPuntos= $objParametro->Get_Parametro_By_cParClase($bean_parametro) ;
					$optionPE = SelectOption($dataPuntos, 'nParCodigo', 'cParDescripcion',-1);
				#  TIPOS DE COMPROBANTES DE PAGO
					$bean_parametro->setnParClase(1008 );
					$dataComprobante= $objParametro->Get_Parametro_By_cParClase($bean_parametro) ;
					$optionComprobante = SelectOption($dataComprobante, 'nParCodigo', 'cParDescripcion',-1);

				#  SERIES
					$cPerJuridica = Get_cPerCodigo_PerJuridica() ;
					$bean_parametro->setcParJerarquia($cPerJuridica) ;
					$bean_parametro->setnParClase(1009 );
					// $dataSerie = $objParametro->Get_Parametro_By_cParClase($bean_parametro) ;
					$dataSerie = $objSerieNumeracion->Get_Parametro_by_cPerJuridica($bean_parametro) ;
					$optionSerie = SelectOption($dataSerie , 'nParCodigo', 'cParDescripcion',-1);

		   		$FuncionSearch = 'xajax_Filtrar_Serie_Numeracion('.$nOriRegistros.', '.$nNumRegMostrar.', '.$nPagRegistro.', '.$nPagAct.',  xajax.getFormValues(FrmPrincipal) );';
				// $FuncionEnter = ' if(event.keyCode == 13 ){'.$FuncionSearch.'} ; if( (jq(this).val()).length  == 0){	'.$FuncionSearch.' }';

				$formulario ='';
				$formulario .= '<div class="ContenedorTable">

						<table style="width:100%;">
							<tr class="title-table text-left" >
								<th  style="width: 10%;">&nbsp; Num. </th>
								<th  style="width: 25%;">&nbsp; Punto de Emisión  </th>
								<th  style="width: 25%;">&nbsp; Comprobante  </th>
								<th  style="width: 25%;">&nbsp; Serie </th>
								<th  style="width: 20%;">&nbsp; Numeración </th>
							</tr>
					    	<tr class="vform">
					    		<td>
					    		    <input type="search" name="" id="" placeholder="" disabled />
								</td>

								<td>
						    		<select name="B_nParSrcPuntoEmision_" id="B_nParSrcPuntoEmision_" onchange="'.$FuncionSearch.'">
					    				<option value="0">Todos</option>
					    				'.$optionPE.'
					    			</select>
								</td>

								<td>
					    		   <select name="B_nParDstComprobante_" id="B_nParDstComprobante_" onchange="'.$FuncionSearch.'">
					    				<option value="0">Todos</option>
					    				'.$optionComprobante.'
					    			</select>
								</td>
								<td>
					    		   <select name="B_nParObjSerie_" id="B_nParObjSerie_" onchange="'.$FuncionSearch.'">
					    				<option value="0">Todos</option>
					    				'.$optionSerie.'
					    			</select>
								</td>
								<td>
					    		    <input type="search" name="" id="" placeholder="" disabled />
								</td>

							</tr>

							<tbody id="tbodyData" class="table table-hover table-border">

							</tbody>
					    </table>
					    </div>';

			    $objResponse->assign("ContenedorPrincipal","innerHTML",$formulario);
			    $objResponse->script("xajax_Filtrar_Serie_Numeracion('".$nOriRegistros."', '".$nNumRegMostrar."', '".$nPagRegistro."', '".$nPagAct."',  xajax.getFormValues(FrmPrincipal) );");
				return $objResponse;
		}

	#FILTRAR LOS REGISTROS DE BD
		function Filtrar_Serie_Numeracion($nOriRegistros, $nNumRegMostrar, $nPagRegistro, $nPagAct,$frm)
		{
			$objResponse = new xajaxResponse();

			$objCtaCteNumeracion = new ClsSerieNumeracion();

			$bean_parparext        = new Bean_parparext();
			$bean_ctactenumeracion = new Bean_ctactenumeracion();

			# validaciones
				if(empty($frm["B_nParSrcPuntoEmision_"]))
				{
					$nParSrcPuntoEmision = 0;
				}else{
					$nParSrcPuntoEmision = $frm["B_nParSrcPuntoEmision_"];
				}
				if(empty($frm["B_nParDstComprobante_"]))
				{
					$nParDstComprobante = 0;
				}else{
					$nParDstComprobante = $frm["B_nParDstComprobante_"];
				}
				if(empty($frm["B_nParObjSerie_"]))
				{
					$nParObjSerie = 0;
				}else{
					$nParObjSerie = $frm["B_nParObjSerie_"];
				}
			$bean_ctactenumeracion->setnOriRegistros($nOriRegistros) ;
			$bean_ctactenumeracion->setnNumRegMostrar($nNumRegMostrar) ;
			$bean_ctactenumeracion->setnPagRegistro(0) ; # que no pagine
			$bean_parparext->setnParSrcCodigo($nParSrcPuntoEmision);
			$bean_parparext->setnParSrcClase(1007);
			$bean_parparext->setnParDstCodigo($nParDstComprobante);
			$bean_parparext->setnParDstClase(1008);
			$bean_parparext->setnObjCodigo($nParObjSerie);
			$bean_parparext->setnObjTipo(1009);

			$cPerJuridica = Get_cPerCodigo_PerJuridica() ;
			$bean_ctactenumeracion->setcPerJuridica($cPerJuridica) ;


		    $AdoRs = $objCtaCteNumeracion->Filtrar_SerieNumeracion($bean_ctactenumeracion,$bean_parparext);

		    // $objResponse->alert(  $AdoRs ) ;
	   		//  #Capturar el número de registros
	    	$nNumRegExist = count($AdoRs["cuerpo"]);

	    	 #Filtrar registros deacuerdo al origen de datos y y viene paginados
			$bean_ctactenumeracion->setnPagRegistro($nPagRegistro) ; # para que pagine

		    #Filtrar registrar
	    	$data = $objCtaCteNumeracion->Filtrar_SerieNumeracion($bean_ctactenumeracion,$bean_parparext );


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
                    				value='".$data["cuerpo"][$i]["nParSrcCodigo"]."-".$data["cuerpo"][$i]["nParDstCodigo"]."-".$data["cuerpo"][$i]["nParObjCodigo"]."'
                    				name='rdCodigo' id='rdCodigo".$i."'/>";
                    $formulario.=      substr("00000".($i+1),-5);
                    $formulario.=  	"</td>";
				   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cParSrcDescripcion"]."</td>";
				   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cParDstDescripcion"]."</td>";
				   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cParObjDescripcion"]."</td>";
				   	$formulario.= 	"<td>".$data["cuerpo"][$i]["Numero"]."</td>";
				   	$formulario.="</tr>";
				}
					$objResponse->assign("tbodyData","innerHTML",$formulario);
				#Paginado
				     $Paginacion = Paginar($nNumRegExist, $nNumRegMostrar,  $nPagAct,  'xajax_Filtrar_Serie_Numeracion', 'xajax.getFormValues(FrmPrincipal)');
				    $objResponse->assign("ContenedorPaginado","innerHTML",$Paginacion);
			}else{
			  	$objResponse->assign("tbodyData","innerHTML",$formulario);
			  	$objResponse->assign("ContenedorPaginado","innerHTML",$Paginacion);
			}

			return $objResponse;
		}
	# NUEVO
		function Nuevo_Serie_Numeracion()
		{
			$objResponse = new xajaxResponse();
			#Formulario
			// LLAMAR A LA FUNCION QUE CREA EL FORMULARIO
			$formulario =  Frm_Serie_Numeracion("Insertar_Serie_Numeracion");
			# configurando emergente
				$FrmRpta = FrmEmergente("NUEVA NUMERACIÓN DE SERIE", $formulario);
				$objResponse->script("mostrar_emergente();");
				$objResponse->assign("emergente_contenido","innerHTML",$FrmRpta);
			return $objResponse;
		}
	# INSERTAR
		function Insertar_Serie_Numeracion($frm)
		{
			$objResponse = new xajaxResponse();

			$MsjAlter = "";
			$Funcion = "";

			# VALIDACION
				if(empty($frm["nPuntoEmision_"]))
				{
					$MsjAlter = "Seleccionar Punto de Emisión ";
				}
				elseif(empty($frm["nComprobante_"]))
				{
					$MsjAlter = "Seleccionar Comprobante de Pago ";
				}
				elseif(empty($frm["nSerie_"]))
				{
					$MsjAlter = "Seleccionar Numero de Serie";
				}
				elseif(empty($frm["nNumeracionSerie_"]))
				{
					$MsjAlter = "Numeración: Ingrese Numero de Serie en la que se va iniciar ";
				}

			if($MsjAlter=="")
			{
				# Datos FRM
					// $nParCodigo       = $frm["nParCodigo_"] ;
					$nPuntoEmision    = $frm["nPuntoEmision_"] ;
					$nComprobante     = $frm["nComprobante_"] ;
					$nSerie           = $frm["nSerie_"] ;
					$nNumeracionSerie = $frm["nNumeracionSerie_"] ;
					# EXTRAER EL CODIGO PERJURIDICA
					$cPerJuridica = Get_cPerCodigo_PerJuridica() ;

				# OBJECTOS
					$bean_parparext        =  new Bean_parparext() ;
					$bean_ctactenumeracion =  new Bean_ctactenumeracion() ;

					$bean_parparext->setnParSrcCodigo($nPuntoEmision);
					$bean_parparext->setnParSrcClase(1007);
					$bean_parparext->setnParDstCodigo($nComprobante);
					$bean_parparext->setnParDstClase(1008);
					$bean_parparext->setnObjCodigo($nSerie);
					$bean_parparext->setnObjTipo(1009);
					$bean_parparext->setcParParExtValor(1); # cuando se registra en estado activo
					$bean_parparext->setcParParExtGlosa($nNumeracionSerie); # PE-COMPROBANTE-SERIE-Nro");

					$bean_ctactenumeracion->setcPerJuridica($cPerJuridica);
					$bean_ctactenumeracion->setnComTipo($nComprobante);
					$bean_ctactenumeracion->setnSerie($nSerie);
					$bean_ctactenumeracion->setNumero($nNumeracionSerie);

			        $objParParExt        = new ClsParParExt() ;

					$data = $objParParExt->Validar_ParParExt($bean_parparext) ;

					if(count($data["cuerpo"]) > 0)
					{
						$MsjAlter = "Ya existe asignada una serie para el comprobante seleccinado para el punto de emisión." ;
					}

					if($MsjAlter=="")
					{
						# Registro datos
			        		try
				        	{
				        		# INSTANCIOAMOS EL OBJECTO INICIAL
				        			$objParParExt        = new ClsParParExt() ;
								# LLAMAMOS AL METODO QUE RETORNA LA CONEXION
									$cnx = $objParParExt->get_connection() ;
								# enviamos la conexion a las clases con la que se va a trabajar transacciones
									$objCtaCteNumeracion = new ClsCtaCteNumeracion($cnx) ;
								# INICIAMOS LA TRANSACCION
				        			$objParParExt->beginTransaction() ;

				        		# registramos cta Numeracion
									$data = $objCtaCteNumeracion->Set_CtaCteNumeracion($bean_ctactenumeracion)  ;

				        		# REgistrar PARPAREXT RELACIONAMOS EL PE-COMPROBANTE-SERIE-NUMERACION CON LA QUE SE REGISTRA POR PRIMERA VES
				        			$objParParExt->Set_ParParExt($bean_parparext) ;

				        		# registramos la transaccion que hizo el usuario
									Insertar_Transaccion(1,"NUEVO ASIGINACIÓN DE SERIE A COMPROBANTE: cPerJuridica : ".$nPuntoEmision.", nComprobante:".$nComprobante.", nSerie:".$nSerie.", nNumeracionSerie:".$nNumeracionSerie,"",$cnx) ; # si todo a tendido exito

								# si todo a tendido exito
					        		$objParParExt->commit();

				        		$Funcion = "xajax_Listar_Series_Numeracion(0,20,1,1); ocultar_emergente();";

				        	}catch(Exception $e)
				        	{
				        		# si ha habido algun error
									$objParParExt->rollback();
				        			// $MsjAlter =  "Error de registro.".$e->getMessage() ;
				        		$MsjAlter =  "Error de registro.";
				        	}
					}
			}
			$objResponse->assign("labelMsj","innerHTML",$MsjAlter);
			$objResponse->script($Funcion);
			return $objResponse;
		}

	# EDITAR
		function Editar_Serie_Numeracion($frm)
		{
			$objResponse = new xajaxResponse();
			#Formulario

			$formulario = "";
			$nPrdTipo = "";
					if (!empty($frm["rdCodigo"]))
					{
						$arr = explode('-', $frm["rdCodigo"]);
						$nParSrcCodigo = $arr[0]; # punto de emision
						$nParDstCodigo = $arr[1]; # comprobante
						$nParObjCodigo = $arr[2]; # serie

						$bean_parparext        =  new Bean_parparext() ;
						$bean_ctactenumeracion =  new Bean_ctactenumeracion() ;

						# EXTRAER EL CODIGO PERJURIDICA
						$cPerJuridica = Get_cPerCodigo_PerJuridica() ;

						$bean_ctactenumeracion->setcPerJuridica($cPerJuridica);
						$bean_ctactenumeracion->setnComTipo($nParDstCodigo);
						$bean_ctactenumeracion->setnSerie($nParObjCodigo);

						$objCtaCteNumeracion = new ClsCtaCteNumeracion() ;

						$dataCtaCte = $objCtaCteNumeracion->Validar_CtaCteNumeracion($bean_ctactenumeracion) ;
						// $objResponse->alert( count($dataCtaCte["cuerpo"])) ;
						$Numero = $dataCtaCte["cuerpo"][0]["Numero"] ;

							$formulario .= Frm_Serie_Numeracion("Actualizar_Serie_Numeracion", $nParSrcCodigo, $nParDstCodigo, $nParObjCodigo , $Numero);

						# configurando emergente
						$FrmRpta = FrmEmergente("ACTUALIZAR SECTOR", $formulario);
						$objResponse->script("mostrar_emergente();");
						// $objResponse->assign("emergente","style.height","180px");
						$objResponse->assign("emergente_contenido","innerHTML",$FrmRpta);
					}
					else
					{
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
		function Actualizar_Serie_Numeracion($frm)
		{
			$objResponse = new xajaxResponse();

			$MsjAlter = "";
			$Funcion = "";

			# VALIDACION
				/*if(empty($frm["nPuntoEmision_"]))
				{
					$MsjAlter = "Seleccionar Punto de Emisión ";
				}
				elseif(empty($frm["nComprobante_"]))
				{
					$MsjAlter = "Seleccionar Comprobante de Pago ";
				}
				elseif(empty($frm["nSerie_"]))
				{
					$MsjAlter = "Seleccionar Numero de Serie";
				}*/
				if(empty($frm["nNumeracionSerie_"]))
				{
					$MsjAlter = "Numeración: Ingrese Numero de Serie en la que se va iniciar ";
				}


			if($MsjAlter==""){

			# Datos FRM

					$arr = explode('-', $frm["nParCodigo_"]);
					$nPuntoEmision = $arr[0]; # punto de emision
					$nComprobante = $arr[1]; # comprobante
					$nSerie = $arr[2]; # serie

					// $nParCodigo       = $frm["nParCodigo_"] ;
					// $nPuntoEmision    = $frm["nPuntoEmision_"] ;
					// $nComprobante     = $frm["nComprobante_"] ;
					// $nSerie           = $frm["nSerie_"] ;

					$nNumeracionSerie = $frm["nNumeracionSerie_"] ;
					# EXTRAER EL CODIGO PERJURIDICA
					$cPerJuridica = Get_cPerCodigo_PerJuridica() ;

				# OBJECTOS
					$bean_parparext        =  new Bean_parparext() ;
					$bean_ctactenumeracion =  new Bean_ctactenumeracion() ;



					$bean_ctactenumeracion->setcPerJuridica($cPerJuridica);
					$bean_ctactenumeracion->setnComTipo($nComprobante);
					$bean_ctactenumeracion->setnSerie($nSerie);
					$bean_ctactenumeracion->setNumero($nNumeracionSerie);



					$objCtaCteNumeracion = new ClsCtaCteNumeracion() ;

					$dataCtaCte = $objCtaCteNumeracion->Validar_CtaCteNumeracion($bean_ctactenumeracion) ;
					$numero_bd = (int) $dataCtaCte["cuerpo"][0]["Numero"] ;
					$numero_txt = (int) $nNumeracionSerie ;

					if($numero_txt < $numero_bd )
					{
		            	$MsjAlter = "La numeracion minima debe ser ". $dataCtaCte["cuerpo"][0]["Numero"];
					}

					if($MsjAlter == "")
					{
				   		#	Registro datos de Serie_Numeracion
		        		try
			        	{

			        		# INSTANCIOAMOS EL OBJECTO INICIAL
				        		$objCtaCteNumeracion = new ClsCtaCteNumeracion() ;
							# LLAMAMOS AL METODO QUE RETORNA LA CONEXION
								$cnx = $objCtaCteNumeracion->get_connection() ;
							# INICIAMOS LA TRANSACCION
			        			$objCtaCteNumeracion->beginTransaction() ;

			        		# REGISTRAR EL Serie_Numeracion COMO PARAMETRO
			        		$data = $objCtaCteNumeracion->Upd_CtaCteNumeracion_Numero($bean_ctactenumeracion);
							Insertar_Transaccion(2,"ACTUALIZO Numeracion :cPerJuridica: ".$cPerJuridica." , nComprobante: ".$nComprobante." ,  nSerie: ". $nSerie.", nNumeracionSerie: ".$nNumeracionSerie,"",$cnx) ;
							# si todo a tendido exito
			        		$objCtaCteNumeracion->commit();
			        		$Funcion = "xajax_Listar_Series_Numeracion(0,20,1,1); ocultar_emergente();";

			        	}catch(Exception $e)
			        	{
			        		# si ha habido algun error
			        		$objCtaCteNumeracion->rollback();
			        		$MsjAlter =  "Error de registro.";
			        	}
			        }

			}


			$objResponse->assign("labelMsj","innerHTML",$MsjAlter);
			$objResponse->script($Funcion);
			return $objResponse;
		}

	#MOSTRAR ELIMINAR
		function Eliminar_Serie_Numeracion($frm)
		{
			$objResponse = new xajaxResponse();

			if(empty($frm["rdCodigo"]))
			{
				$rdCodigo = "";
			}
			else
			{
				$rdCodigo = $frm["rdCodigo"];
			}


			$formulario = FrmEliminar("ConfEliminar_Serie_Numeracion",$rdCodigo);

			$FrmRpta = FrmEmergente("ELIMINAR Serie Numeración", $formulario);
			$objResponse->script("mostrar_emergente();");
			$objResponse->assign("emergente","style.height","130px");
			$objResponse->assign("emergente_contenido","innerHTML",utf8_encode($FrmRpta));

			return $objResponse;
		}

	#CONFIRMAR ELIMINACION
		function ConfEliminar_Serie_Numeracion($nParCodigo , $nEstado = 0 )
		{
			$objResponse = new xajaxResponse();

			$MsjAlter = "&nbsp;";
			$Funcion = "";

			$arr = explode('-',$nParCodigo);
			$nParSrcCodigo = $arr[0]; # punto de emision
			$nParDstCodigo = $arr[1]; # comprobante
			$nParObjCodigo = $arr[2]; # serie

			$bean_parparext        =  new Bean_parparext() ;

			$bean_parparext->setnParSrcCodigo($nParSrcCodigo);
			$bean_parparext->setnParSrcClase(1007);
			$bean_parparext->setnParDstCodigo($nParDstCodigo);
			$bean_parparext->setnParDstClase(1008);
			$bean_parparext->setnObjCodigo($nParObjCodigo);
			$bean_parparext->setnObjTipo(1009);
			$bean_parparext->setcParParExtValor(0); # cuando se registra en estado activo

			try
	    	{
    			# INSTANCIOAMOS EL OBJECTO INICIAL
        			$objParParExt        = new ClsParParExt() ;
				# LLAMAMOS AL METODO QUE RETORNA LA CONEXION
					$cnx = $objParParExt->get_connection() ;
				# INICIAMOS LA TRANSACCION
        			$objParParExt->beginTransaction() ;

				$data = $objParParExt->Upd_ParParExt_cParParExtValor($bean_parparext) ;


				Insertar_Transaccion(3,"ELIMNO SERIE NUMERACIÓN: nComprobante:".$nParSrcCodigo.", nSerie:".$nParDstCodigo.", nParObjCodigo:".$nParObjCodigo,"",$cnx) ;

				# si todo a tendido exito
	    		$objParParExt->commit();

	    		$Funcion = "xajax_Listar_Series_Numeracion(0,20,1,1); ocultar_emergente();";

	    	}catch(Exception $e)
	    	{
	    		# si ha habido algun error
	    		$objParParExt->rollback();
	    		$MsjAlter = "Error de registro: ";
	    		// $MsjAlter = "Error de registro: ". $e->getMessage() ;
	    	}

			$objResponse->assign("labelMsj","innerHTML",$MsjAlter);
			$objResponse->script($Funcion);
			return $objResponse;
		}

	#FRM NUEVO
		function Frm_Serie_Numeracion($funcion="", $nPuntoEmision = -1, $nComprobante = -1, $nSerie = -1, $nNumeracionSerie = '00000001' )
		{
			$objDepartamento = new ClsDepartamento() ;

			$objParametro   = new ClsParametro();
			$bean_parametro = new  Bean_parametro() ;
			# PUNTO DE EMISION
				$bean_parametro->setnParClase(1007 );
				$dataPuntos= $objParametro->Get_Parametro_By_cParClase($bean_parametro) ;
				$optionPE = SelectOption($dataPuntos, 'nParCodigo', 'cParDescripcion',$nPuntoEmision);
			#  TIPOS DE COMPROBANTES DE PAGO
				$bean_parametro->setnParClase(1008 );
				$dataComprobante= $objParametro->Get_Parametro_By_cParClase($bean_parametro) ;
				$optionComprobante = SelectOption($dataComprobante, 'nParCodigo', 'cParDescripcion',$nComprobante);

			#  SERIES
				$bean_parametro->setnParClase(1009 );
				$dataSerie = $objParametro->Get_Parametro_By_cParClase($bean_parametro) ;
				$optionSerie = SelectOption($dataSerie , 'nParCodigo', 'cParDescripcion',$nSerie);

			# para disabled select > 1 en editar
				// $Numero = (int) $nNumeracionSerie ;
				$disabled = "" ;
				$reiniciarEn = "Empezar en" ;
				if($nSerie > 0 )
				{
					$disabled    =  "disabled" ;
					$reiniciarEn = "Reiniciar en" ;
				}

				$formulario = "";
			    $formulario .='
			    	<div class="vform vformContenedor">
			    		<fieldset class="c12">
				    		<input type="hidden" name="nParCodigo_" value="'.$nPuntoEmision.'-'.$nComprobante.'-'.$nSerie.'" /> <fieldset class="c6">
					    		<label for="nPuntoEmision_">Caja(Punto Emisión)</label>
					    		<select name="nPuntoEmision_" id="nPuntoEmision_" '.$disabled.' >
					    		'.$optionPE.'
					    		</select>
					    	</fieldset>
					    	<fieldset class="c6">
					    		<label for="nComprobante_">Comprobante</label>
					    		<select name="nComprobante_" id="nComprobante_" '.$disabled.' >
					    		'.$optionComprobante.'
					    		</select>
					    	</fieldset>

					    	<fieldset class="c6">
					    		<label for="nSerie_">Serie</label>
					    		<select name="nSerie_" id="nSerie_" '.$disabled.' >
					    		'.$optionSerie.'
					    		</select>
					    	</fieldset>

					    	<fieldset class="c6">
									<label for="nNumeracionSerie_">NUMERACIÓN('.$reiniciarEn.') </label>
									 <span class="pre  icon-text"></span>
									<input class="pre" type="text" id="nNumeracionSerie_" name="nNumeracionSerie_" placeholder="INGRESE NÚMERO DE SERIE" value="'.$nNumeracionSerie.'" onfocus="Validar_Number(this);" maxlength="8">
								</fieldset>

						</fieldset>
						'.botonRegistrar($funcion).'
					</div>
			    ';
				return $formulario;
		}

	# REPORTE EN PDF
		function Rpt_Serie_Numeracion_Pdf($frm="")
		{
			$objResponse       = new xajaxResponse();
			$objCtaCteNumeracion = new ClsSerieNumeracion();

			$bean_parparext        = new Bean_parparext();
			$bean_ctactenumeracion = new Bean_ctactenumeracion();

			# validaciones
				if(empty($frm["B_nParSrcPuntoEmision_"]))
				{
					$nParSrcPuntoEmision = 0;
				}else{
					$nParSrcPuntoEmision = $frm["B_nParSrcPuntoEmision_"];
				}
				if(empty($frm["B_nParDstComprobante_"]))
				{
					$nParDstComprobante = 0;
				}else{
					$nParDstComprobante = $frm["B_nParDstComprobante_"];
				}
				if(empty($frm["B_nParObjSerie_"]))
				{
					$nParObjSerie = 0;
				}else{
					$nParObjSerie = $frm["B_nParObjSerie_"];
				}
			$bean_ctactenumeracion->setnOriRegistros(0) ;
			$bean_ctactenumeracion->setnNumRegMostrar(0) ;
			$bean_ctactenumeracion->setnPagRegistro(0) ; # que no pagine
			$bean_parparext->setnParSrcCodigo($nParSrcPuntoEmision);
			$bean_parparext->setnParSrcClase(1007);
			$bean_parparext->setnParDstCodigo($nParDstComprobante);
			$bean_parparext->setnParDstClase(1008);
			$bean_parparext->setnObjCodigo($nParObjSerie);
			$bean_parparext->setnObjTipo(1009);

			$cPerJuridica = Get_cPerCodigo_PerJuridica() ;
			$bean_ctactenumeracion->setcPerJuridica($cPerJuridica) ;


		    $data = $objCtaCteNumeracion->Filtrar_SerieNumeracion($bean_ctactenumeracion,$bean_parparext);


			$formulario= "";

			if (count($data["cuerpo"]) > 0)
			{

				$formulario .= "<table class='table'>" ;
				$formulario .='
						<tr class="border-bottom">
							<th  style="width: 10%;"> Num. </th>
								<th  style="width: 25%;"> Punto de Emisión  </th>
								<th  style="width: 25%;"> Comprobante  </th>
								<th  style="width: 25%;"> Serie </th>
								<th  style="width: 20%;"> Numeración </th>
						</tr>
					' ;

				$formulario .= "<tbody>" ;

				for ($i = 0; $i < count($data["cuerpo"]); $i++)
            	{
						$formulario.="<tr>";
	                    $formulario.= 	"<td>";
	                    $formulario.=         $i + 1 ;
	                    $formulario.=   "</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cParSrcDescripcion"]."</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cParDstDescripcion"]."</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cParObjDescripcion"]."</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["Numero"]."</td>";
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
							<h3 class='rounded text-center mayusc title'> Lista de Series_Numeracion </h3>
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