<?php
	#REGISTRO DE FUNCTIONs PARA DAR MANTENIMIENTO A CUALQUIER PARAMETRO
		$xajax->registerFunction("Listar_Parametros");
		$xajax->registerFunction("Filtrar_Parametro");
		$xajax->registerFunction("Nuevo_Parametro");
		$xajax->registerFunction("Insertar_Parametro");
		$xajax->registerFunction("Editar_Parametro");
		$xajax->registerFunction("Actualizar_Parametro");
		$xajax->registerFunction("Eliminar_Parametro");
		$xajax->registerFunction("ConfEliminar_Parametro");
		$xajax->registerFunction("Rpt_Parametro_Pdf");
		$xajax->registerFunction("Configurar_Parametro");

		/**
		 * [Configurar_Parametro FUNCION QUE CARGA LOS DATOS PARA CONFIGURA LA LISTA Y FOMULARIO DEL PARAMETRO ]
		 * @param [type] $nParClase [CLASE DEL PARAMETRO]
		 * @param string $funcion   [FUNCION QUE VA CARGAR ESTO SI ES QUE ACCEDO AL FORMULARIO DESDE OTRO INTERFAZ]
		 */
			// $bean_parametro = new  Bean_parametro() ;
			function Configurar_Parametro($nParClase , $funcion ="")
			{
				$objResponse = new xajaxResponse();

				$bean_parametro = new  Bean_parametro() ;
				// global $bean_parametro ;
				$bean_parametro->setnParClase($nParClase) ;
				# cargamos  el parametro padre nParCodigo: 0 y nParEstado : 0
				$objParametro = new ClsParametro();
				$data = $objParametro->Get_Parametro_Padre_nParClase($bean_parametro );
				// $objResponse->alert($bean_parametro->getnParClase()) ;

				$cParNombre = "";
				if(count($data["cuerpo"])>0)
				{
					$cParNombre=Mayusc($data["cuerpo"][0]["cParNombre"]);
				}

				if(empty($funcion))
				{
					$FuncionCargar = "xajax_Listar_Parametros(0,20,1,1);"  ;
					$objResponse->script($FuncionCargar);
				}
				else
				{
					$FuncionCargar = $funcion ;
				}
				// $objResponse->alert($cParNombre) ;

				@session_start();
				$_SESSION["S_cParNombre"]    =  $cParNombre ;
				$_SESSION["S_nParClase"]     =  $nParClase ;
				$_SESSION["S_Fnc_ListarPar"] =  $FuncionCargar ;

				// $bean_parametro = null;
				return $objResponse ;
			}

		# LISTA PARAMETRO
			function Listar_Parametros($nOriRegistros, $nNumRegMostrar, $nPagRegistro, $nPagAct)
			{

					$objResponse = new xajaxResponse();


			   		$FuncionSearch = 'xajax_Filtrar_Parametro('.$nOriRegistros.', '.$nNumRegMostrar.', '.$nPagRegistro.', '.$nPagAct.',  xajax.getFormValues(FrmPrincipal) );';
					$FuncionEnter = ' if(event.keyCode == 13 ){'.$FuncionSearch.'} ; if( (jq(this).val()).length  == 0){	'.$FuncionSearch.' }';


					$formulario ='';
					$formulario .= ' <div class="ContenedorTable">
							<table style="width:100%;" >
								<tr class="title-table" >
									<td  style="width:20%;">&nbsp; C&oacute;digo</td>
									<td  style="width:30%;">&nbsp;abreviatura </td>
									<td  style="width:50%;">&nbsp;'.$_SESSION["S_cParNombre"].'</td>
								</tr>
						    	<tr class="vform">
									<td>
									    <input  type="search" disabled="disabled" name="" placeholder="" />
									</td>
									<td>
						    		    <input type="search" name="B_cParNombre_" id="B_cParNombre_" placeholder="Buscar por Codigo"
						    		    onkeyup="'.$FuncionEnter.'"
							    		onsearch="'.$FuncionSearch.'" />

									</td>
									<td>
						    		    <input type="search" name="B_cParDescripcion_" id="B_cParDescripcion_" placeholder="Buscar '.$_SESSION["S_cParNombre"].'"
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
				    $objResponse->script("xajax_Filtrar_Parametro('".$nOriRegistros."', '".$nNumRegMostrar."', '".$nPagRegistro."', '".$nPagAct."',  xajax.getFormValues(FrmPrincipal) );");

					return $objResponse;
			}

		# FILTAR PARAMETRO
			function Filtrar_Parametro($nOriRegistros, $nNumRegMostrar, $nPagRegistro, $nPagAct, $frm)
			{
				$objResponse = new xajaxResponse();
				$objParametro = new ClsParametro();

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
				    $bean_parametro = new  Bean_parametro() ;

			    	// $bean_parametro->setnOriRegistros(0) ;
					// $bean_parametro->setnNumRegMostrar(0) ;
					$bean_parametro->setnOriRegistros($nOriRegistros) ;
					$bean_parametro->setnNumRegMostrar($nNumRegMostrar) ;
					$bean_parametro->setnPagRegistro(0) ;//que no pagine
					$bean_parametro->setnParClase($_SESSION["S_nParClase"]) ;
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
	                    $formulario.=      "".substr("0000".$data["cuerpo"][$i]["nParCodigo"],-5)."</label>";
	                    $formulario.=  	"</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cParNombre"]."</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cParDescripcion"]."</td>";
						$formulario.="</tr>";
			        }
			        #$nNumRegExist, $nNumRegMostrarxPag, $nPagAct,  $cNameFunction, $frm , $ncantlink = 10
					$Paginacion= Paginar($nNumRegExist, $nNumRegMostrar,  $nPagAct, 'xajax_Filtrar_Parametro', 'xajax.getFormValues(FrmPrincipal)');

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
			function Nuevo_Parametro()
			{
				$objResponse = new xajaxResponse();
				#Formulario
				$formulario = Frm_Parametro("Insertar_Parametro");
				# configurando emergente
					$FrmRpta = FrmEmergente("NUEVO ".$_SESSION["S_cParNombre"], $formulario);
					$objResponse->assign("emergente_contenido","innerHTML",$FrmRpta);
					// $objResponse->assign("emergente","style.height","140px");
					# MOSTRAR EL EMERGENTE AL FINAL PARA PODER REDIMENSIONAR
					$objResponse->script("mostrar_emergente();");

				return $objResponse;
			}

		#INSERTAR
			function Insertar_Parametro($frm)
			{
				$objResponse = new xajaxResponse();



				$MsjAlter = "";
				$Funcion = "#";

				if(empty($frm["cParNombre_"]))
				{
					$MsjAlter = "Completar abreviatura.";
				}
				elseif(empty($frm["cParDescripcion_"]))
				{
					$MsjAlter = "Completar descripci&oacute;n.";
				}

				if($MsjAlter=="")
				{
						$bean_parametro = new  Bean_parametro() ;
						$objParametro = new ClsParametro();

						$nParClase       = $_SESSION["S_nParClase"] ;
						$cParNombre      = Mayusc($frm["cParNombre_"]);
						$cParDescripcion = Mayusc($frm["cParDescripcion_"]);

					  	$bean_parametro->setnParClase($nParClase ) ;
						$bean_parametro->setcParNombre($cParNombre );
						$bean_parametro->setcParDescripcion($cParDescripcion) ;

				    	$dataValida = $objParametro->Validar_Parametro($bean_parametro);
				        #VALIDAR
					        if(count($dataValida["cuerpo"])>0){
		        				$MsjAlter= ".::YA EXISTE UN REGISTRO IDENTICO::.";
					        }
					        else{
					        	try
					        	{	# iniciamos la transaccion
					        		$objParametro->beginTransaction() ;
					        		$data = $objParametro->Set_Parametro($bean_parametro);
									Insertar_Transaccion(1,"NUEVO PARAMETRO: ".$_SESSION["S_cParNombre"]." - nParCodigo : ".$data["cuerpo"][0]["nParCodigo"] ."- nParClase : ".$nParClase." - cParDescripcion : ".$cParDescripcion,"") ;
									# si todo a tendido exito
					        		$objParametro->commit();

									$Funcion = $_SESSION["S_Fnc_ListarPar"] ." ocultar_emergente();";
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

		# MOSTRAR FRM EDITAR
			function Editar_Parametro($frm)
			{
				$objResponse = new xajaxResponse();

				$formulario = "";
				if (isset($frm["rdCodigo"])) {

					$bean_parametro = new  Bean_parametro() ;
				  	$bean_parametro->setnParClase($_SESSION["S_nParClase"]) ;
					$bean_parametro->setnParCodigo($frm["rdCodigo"]);

					$objParametro = new ClsParametro();
					$data	= $objParametro->Buscar_Parametro($bean_parametro);

					if(count($data["cuerpo"])>0)
					{
						$nnParCodigo     = $data["cuerpo"][0]["nParCodigo"];
						$cParDescripcion = Mayusc($data["cuerpo"][0]["cParDescripcion"]);
						$cParNombre      = Mayusc($data["cuerpo"][0]["cParNombre"]);

						// Llamamo al la Funcion del Formulario Modal Parameto enviadoles los datos
						$formulario .= Frm_Parametro("Actualizar_Parametro",$nnParCodigo,$cParDescripcion,$cParNombre);
					 }
				}
				else{
					# muesta el mensaje de seleccionar registro
				    $formulario = SeleccionarRegistro() ;
				}
				$FrmRpta = FrmEmergente("ACTUALIZAR ".$_SESSION["S_cParNombre"], $formulario);

				$objResponse = new xajaxResponse();
				$objResponse->script("mostrar_emergente();");
				$objResponse->assign("emergente_contenido","innerHTML",$FrmRpta);

				return $objResponse;
			}

		#ACTUALIZAR
			function Actualizar_Parametro($frm)
			{
				$objResponse = new xajaxResponse();

				$MsjAlter = "";
				$Funcion = "";

				if(empty($frm["cParNombre_"])){
					$MsjAlter = "Completar Abreviatura.";
				}
				if(empty($frm["cParDescripcion_"])){
					$MsjAlter = "Completar ".$_SESSION["S_cParNombre"];
				}

				if($MsjAlter=="")
				{
					$nParCodigo 	 = $frm["nParCodigo_"] ;
					$nParClase       = $_SESSION["S_nParClase"] ;
					$cParNombre      = Mayusc($frm["cParNombre_"]);
					$cParDescripcion = Mayusc($frm["cParDescripcion_"]);

					$bean_parametro = new  Bean_parametro() ;
					$bean_parametro->setnParCodigo($nParCodigo);
				  	$bean_parametro->setnParClase($nParClase) ;
					$bean_parametro->setcParNombre($cParNombre);
					$bean_parametro->setcParDescripcion($cParDescripcion) ;

					$objParametro = new ClsParametro();
					try
		        	{	# iniciamos la transaccion
		        		$objParametro->beginTransaction() ;
		        		$objParametro->Upd_Parametro($bean_parametro);
						Insertar_Transaccion(2,"ACTUALIZO PARAMETRO: ".$_SESSION["S_cParNombre"]." - nParCodigo : ".$nParCodigo."- nParClase : ".$nParClase." - cParDescripcion : ".$cParDescripcion,"") ;
						# si todo a tendido exito
		        		$objParametro->commit();

						$Funcion = $_SESSION["S_Fnc_ListarPar"] ." ocultar_emergente();";
		        	}catch(Exception $e)
		        	{
		        		# si ha habido algun error
		        		$objParametro->rollback();
		        		$MsjAlter =  "Error de registro.";
		        	}
				}


				$objResponse->assign("labelMsj","innerHTML",$MsjAlter);
				$objResponse->script($Funcion);
				return $objResponse;
			}

		#MOSTRAR ELIMINAR
			function Eliminar_Parametro($frm)
			{
				$objResponse = new xajaxResponse();

				if(empty($frm["rdCodigo"]))
					$rdCodigo = "";
				else
					$rdCodigo = $frm["rdCodigo"];

				$formulario = FrmEliminar("ConfEliminar_Parametro",$rdCodigo);

				$FrmRpta = FrmEmergente("ELIMINAR ".$_SESSION["S_cParNombre"], $formulario);
				$objResponse->script("mostrar_emergente();");
				$objResponse->assign("emergente_contenido","innerHTML",$FrmRpta);

				return $objResponse;
			}

		#CONFIRMAR ELIMINACION
			function ConfEliminar_Parametro($nParCodigo)
			{
				$objResponse = new xajaxResponse();

				$MsjAlter = "";
				$Funcion = "#";

				$bean_parametro = new  Bean_parametro() ;
			  	$bean_parametro->setnParClase($_SESSION["S_nParClase"]) ;
				$bean_parametro->setnParCodigo($nParCodigo);
				$bean_parametro->setnParEstado(0);

				try
	        	{
					$objParametro = new ClsParametro();
	        		# iniciamos la transaccion
	        		$objParametro->beginTransaction() ;
					$objParametro->Upd_Parametro_Estado($bean_parametro);
					Insertar_Transaccion(3 ,"ELIMINO PARAMETRO: nParCodigo : ".$nParCodigo."- nParClase : ".$_SESSION["S_nParClase"],"") ;

					# si todo a tendido exito
	        		$objParametro->commit();

					$Funcion = $_SESSION["S_Fnc_ListarPar"] ." ocultar_emergente();";
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
			function Frm_Parametro($funcion="",$nParCodigo="",$cParDescripcion="",$cParNombre="")
			{
					$formulario ="";
				    $formulario .='
				    	<div class="vform vformContenedor">
				    		<input type="hidden" name="nParCodigo_" value="'.$nParCodigo.'" />
							<fieldset class="c12" >
								<fieldset class="c5" >
									<label for="cParNombre_"> ABREVIATURA </label>
									 <span class="pre  icon-text"></span>
									<input class="pre" type="text" id="cParNombre_" name="cParNombre_" placeholder ="INGRESE ABREVIATURA"  value="'.$cParNombre.'" maxlength="30">
								</fieldset>
								<fieldset class="c7" >
									<label for="cParDescripcion_">'.$_SESSION["S_cParNombre"].'  </label>
									 <span class="pre  icon-text"></span>
									<input class="pre" type="text" id="cParDescripcion_" name="cParDescripcion_" placeholder ="INGRESE '.$_SESSION["S_cParNombre"].'" value="'.$cParDescripcion.'">
								</fieldset>
							</fieldset>
							'.botonRegistrar($funcion).'
						</div>
				    ';
					return $formulario;
			}

		# REPORTE DE ARTES DEPESCA
			function Rpt_Parametro_Pdf($frm="")
			{
				$bean_parametro = new  Bean_parametro() ;
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

		    	$bean_parametro->setnOriRegistros(0) ;
				$bean_parametro->setnNumRegMostrar(0) ;
				$bean_parametro->setnPagRegistro(0) ;
				$bean_parametro->setnParClase($_SESSION["S_nParClase"]) ;
				$bean_parametro->setcParNombre( $cParNombre) ;
				$bean_parametro->setcParDescripcion($cParDescripcion) ;

				$objParametro = new ClsParametro();
			    $data =$objParametro->Filtrar_Parametro($bean_parametro);

				$objResponse = new xajaxResponse();

				$formulario= "";

				if (count($data["cuerpo"]) > 0)
				{
					$i=1;
					$formulario .= "<table class='table'>" ;
					$formulario .='
							<tr class="border-bottom">
								<th class="" style="width:10%;"> Número</th>
								<th class="" style="width: 30% ;">Abreviatura</th>
								<th class="" style="width: 60%;">'.$_SESSION["S_cParNombre"].'</th>
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
								<h3 class='rounded text-center mayusc title'> Lista de ".$_SESSION["S_cParNombre"]."</h3>
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