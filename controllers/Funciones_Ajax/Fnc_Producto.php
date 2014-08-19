<?php
	#REGISTRO DE FUNCTIONs PARA DAR MANTENIMIENTO A CUALQUIER PARAMETRO
		$xajax->registerFunction("Listar_Productos");
		$xajax->registerFunction("Filtrar_Producto");
		$xajax->registerFunction("Nuevo_Producto");
		$xajax->registerFunction("Insertar_Producto");
		$xajax->registerFunction("Editar_Producto");
		$xajax->registerFunction("Actualizar_Producto");
		$xajax->registerFunction("Eliminar_Producto");
		$xajax->registerFunction("ConfEliminar_Producto");
		$xajax->registerFunction("Rpt_Producto_Pdf");
		$xajax->registerFunction("Configurar_Producto");


		# LISTA PARAMETRO
			function Listar_Productos($nOriRegistros, $nNumRegMostrar, $nPagRegistro, $nPagAct)
			{

					$objResponse = new xajaxResponse();

			   		$FuncionSearch = 'xajax_Filtrar_Producto('.$nOriRegistros.', '.$nNumRegMostrar.', '.$nPagRegistro.', '.$nPagAct.',  xajax.getFormValues(FrmPrincipal) );';
					$FuncionEnter = ' if(event.keyCode == 13 ){'.$FuncionSearch.'} ; if( (jq(this).val()).length  == 0){	'.$FuncionSearch.' }';


					$formulario ='';
					$formulario .= ' <div class="ContenedorTable">
							<table style="width:100%;" >
								<tr class="title-table" >
									<td  style="width:20%;">&nbsp; C&oacute;digo</td>
									<td  style="width:30%;">&nbsp;abreviatura </td>
									<td  style="width:50%;">&nbsp; Productos</td>
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
						    		    <input type="search" name="B_cParDescripcion_" id="B_cParDescripcion_" placeholder="Buscar Producto"
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
				    $objResponse->script("xajax_Filtrar_Producto('".$nOriRegistros."', '".$nNumRegMostrar."', '".$nPagRegistro."', '".$nPagAct."',  xajax.getFormValues(FrmPrincipal) );");

					return $objResponse;
			}

		# FILTAR PARAMETRO
			function Filtrar_Producto($nOriRegistros, $nNumRegMostrar, $nPagRegistro, $nPagAct, $frm)
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
					$Paginacion= Paginar($nNumRegExist, $nNumRegMostrar,  $nPagAct, 'xajax_Filtrar_Producto', 'xajax.getFormValues(FrmPrincipal)');

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
			function Nuevo_Producto()
			{
				$objResponse = new xajaxResponse();
				#Formulario
				$formulario = Frm_Producto("Insertar_Producto");
				# configurando emergente
					$FrmRpta = FrmEmergente("NUEVO PRODUCTO ", $formulario);
					$objResponse->assign("emergente_contenido","innerHTML",$FrmRpta);
					# MOSTRAR EL EMERGENTE AL FINAL PARA PODER REDIMENSIONAR
					$objResponse->script("mostrar_emergente();");

				return $objResponse;
			}

		#INSERTAR
			function Insertar_Producto($frm)
			{
				$objResponse = new xajaxResponse();
				$MsjAlter = "";
				$Funcion = "#";

				# VALIDACIONES
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

					$nParClase       = 2007 ;
					$cParNombre      = Mayusc($frm["cParNombre_"]);
					$cParDescripcion = Mayusc($frm["cParDescripcion_"]);

					$cPerJuridica = Get_cPerCodigo_PerJuridica() ; # clas general -> cParJeraquia

				  	$bean_parametro->setnParClase($nParClase ) ;
				  	$bean_parametro->setcParJerarquia($cPerJuridica) ;
					$bean_parametro->setcParNombre($cParNombre );
					$bean_parametro->setcParDescripcion($cParDescripcion) ;


					$objParametro   = new ClsParametro();
			    	$dataValida = $objParametro->Get_Parametro_by_cPar_Desc_Jeranquia($bean_parametro);
			        #VALIDAR
				        if(count($dataValida["cuerpo"])>0){
	        				$MsjAlter= ".::YA EXISTE UN REGISTRO IDENTICO::.";
				        }
				        else{
				        	try
				        	{
				        		# INSTANCIOAMOS EL OBJECTO INICIAL
					        		$objParametro   = new ClsParametro();
								# LLAMAMOS AL METODO QUE RETORNA LA CONEXION
									$cnx = $objParametro->get_connection() ;
								# INICIAMOS LA TRANSACCION
				        			$objParametro->beginTransaction() ;

				        			$data = $objParametro->Set_Parametro_nParCodigo($bean_parametro);
				        			$nParCodigo = $data["cuerpo"][0]["nParCodigo"] ;

				        			$bean_ctacteservicio = new Bean_ctacteservicio() ;
				        			$objCtaCteServicio	= new ClsCtaCteServicio() ;
				        			$bean_ctacteservicio->setnBieCodigo($nParCodigo);
									$bean_ctacteservicio->setnActCodigo(0);
									$bean_ctacteservicio->setfSerImporte(0);
									$bean_ctacteservicio->setnMonCodigo(1); # soles
									$bean_ctacteservicio->setnSerAfecto(0);
									$bean_ctacteservicio->setnSerTipo(0);
									$bean_ctacteservicio->setnSerModalidad(0);
									$bean_ctacteservicio->setfSerTasa(0);
									$bean_ctacteservicio->setnSerPeriodicidad(0);
									$bean_ctacteservicio->setnUniOrgCodigo(0);
									$bean_ctacteservicio->setnPrdCodigo(0);

									$dataCte = $objCtaCteServicio->Set_CtaCteServicio($bean_ctacteservicio) ;
									$nSerCodigo = $dataCte["cuerpo"][0]["nSerCodigo"];

									Insertar_Transaccion(1,"NUEVO PRODUCTO: nParCodigo : ".$nParCodigo." nSerCodigo -".$nSerCodigo."- nParClase : ".$nParClase." - cParDescripcion : ".$cParDescripcion,"",$cnx) ;
								# si todo a tendido exito
				        		$objParametro->commit();

								$Funcion = " xajax_Listar_Productos(0,20,1,1) ;ocultar_emergente();";
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
			function Editar_Producto($frm)
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
						$formulario .= Frm_Producto("Actualizar_Producto",$nnParCodigo,$cParDescripcion,$cParNombre);
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
			function Actualizar_Producto($frm)
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

								$Funcion =" xajax_Listar_Productos(0,20,1,1) ; ocultar_emergente();";
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
			function Eliminar_Producto($frm)
			{
				$objResponse = new xajaxResponse();

				if(empty($frm["rdCodigo"]))
					$rdCodigo = "";
				else
					$rdCodigo = $frm["rdCodigo"];

				$formulario = FrmEliminar("ConfEliminar_Producto",$rdCodigo);

				$FrmRpta = FrmEmergente("ELIMINAR PRODUCTO", $formulario);
				$objResponse->script("mostrar_emergente();");
				$objResponse->assign("emergente_contenido","innerHTML",$FrmRpta);

				return $objResponse;
			}

		#CONFIRMAR ELIMINACION
			function ConfEliminar_Producto($nParCodigo,$Estado = 0 )
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

					$Funcion = " xajax_Listar_Productos(0,20,1,1) ; ocultar_emergente();";
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
			function Frm_Producto($funcion="",$nParCodigo="",$cParDescripcion="",$cParNombre="")
			{
					$formulario ="";
				    $formulario .='
				    	<div class="vform vformContenedor">
				    		<input type="hidden" name="nParCodigo_" value="'.$nParCodigo.'" />
							<fieldset class="c12" >
								<fieldset class="c5" >
									<label for="cParNombre_"> ABREVIATURA </label>
									 <span class="pre  icon-text"></span>
									<input class="pre" type="text" id="cParNombre_" name="cParNombre_" placeholder ="INGRESE ABREVIATURA"  value="'.$cParNombre.'" maxlength="20">
								</fieldset>
								<fieldset class="c7" >
									<label for="cParDescripcion_"> Número de Serie </label>
									 <span class="pre  icon-text"></span>
									<input class="pre" type="text" id="cParDescripcion_" name="cParDescripcion_" placeholder ="INGRESE NUMERO SERIE " value="'.$cParDescripcion.'" >
								</fieldset>
							</fieldset>
							'.botonRegistrar($funcion).'
						</div>
				    ';
					return $formulario;
			}

		# REPORTE DE ARTES DEPESCA
			function Rpt_Producto_Pdf($frm="")
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
								<th class="" style="width: 60%;"> Productos </th>
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
								<h3 class='rounded text-center mayusc title'> Lista de Productos </h3>
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