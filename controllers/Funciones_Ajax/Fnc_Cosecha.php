<?php

	$xajax->registerFunction("Listar_Cosechas");
	$xajax->registerFunction("Filtrar_Cosecha");
	$xajax->registerFunction("Nuevo_Cosecha");
	$xajax->registerFunction("Insertar_Cosecha");
	$xajax->registerFunction("Editar_Cosecha");
	$xajax->registerFunction("Actualizar_Cosecha");
	$xajax->registerFunction("Eliminar_Cosecha");
	$xajax->registerFunction("ConfEliminar_Cosecha");
	$xajax->registerFunction("Rpt_Cosecha_Pdf");


	# LISTAR
		// recibe el formulario Principal
		function Listar_Cosechas($nOriRegistros, $nNumRegMostrar, $nPagRegistro, $nPagAct )
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
									<th  style="width: 25%;">&nbsp; Parcela </th>
									<th  style="width: 25%;">&nbsp; Productos </th>
									<th  style="width: 10%;">&nbsp; Hectareas</th>
									<th  style="width: 10%;">&nbsp; Quintales </th>
									<th  style="width: 10%;">&nbsp; Kg </th>
									<th  style="width: 10%;">&nbsp; % </th>
								</tr>';
					$formulario .='<tr class="vform">
									<td>
						    		    <input type="search" name="" id="" placeholder=" " disabled />
									</td>

									<td>
						    		    <input type="search" name="" id="" placeholder=" " disabled />
									</td>

									<td>
						    		    <input type="search" name="" id="" placeholder=" " disabled />
									</td>

									<td>
						    		    <input type="search" name="" id="" placeholder=" " disabled />
									</td>

									<td>
						    		    <input type="search" name="" id="" placeholder=" " disabled />
									</td>

									<td>
						    		    <input type="search" name="" id="" placeholder=" " disabled />
									</td>

									<td>
						    		    <input type="search" name="" id="" placeholder=" " disabled />
									</td>

								</tr>' ;

					$formulario .=' <tbody id="tbody_Cosecha" class="table table-hover table-border">

								</tbody>
						    </table>
						    </div>';
				    $objResponse->assign("Tab_Cosecha","innerHTML",$formulario);
				    $objResponse->script("xajax_Menus_Botonera('100203');" ) ;
				    $objResponse->script("xajax_Filtrar_Cosecha('".$nOriRegistros."', '".$nNumRegMostrar."', '".$nPagRegistro."', '".$nPagAct."',  xajax.getFormValues(FrmPrincipal) );");
					return $objResponse;
		}

	# FILTRAR
		function Filtrar_Cosecha($nOriRegistros, $nNumRegMostrar, $nPagRegistro, $nPagAct,$frm)
		{
			$objResponse = new xajaxResponse();
			$objPerCosecha   =  new ClsPerCosecha() ;
			$bean_percosecha = new Bean_percosecha();

			# validaciones
				if(empty($frm["rdCodigo"]))
				{
					$cPerCodigo = "-";
				}else{
					$cPerCodigo = $frm["rdCodigo"];
				}

			$bean_percosecha->setnOriRegistros($nOriRegistros) ;
			$bean_percosecha->setnNumRegMostrar($nNumRegMostrar) ;
			$bean_percosecha->setnPagRegistro(0) ; # que no pagine
			$bean_percosecha->setcPerCodigo($cPerCodigo) ;


		    $AdoRs = $objPerCosecha->Get_PerCoseha_by_cPerCodigo($bean_percosecha);
		    // $objResponse->alert( $AdoRs ) ;
	   		//  #Capturar el número de registros
	    	$nNumRegExist = count($AdoRs["cuerpo"]);

	    	 #Filtrar registros deacuerdo al origen de datos y y viene paginados
			$bean_percosecha->setnPagRegistro($nPagRegistro) ; # para que pagine

		    #Filtrar registrar
	    	$data = $objPerCosecha->Get_PerCoseha_by_cPerCodigo($bean_percosecha );

			$formulario= "";
			$Paginacion="&nbsp";
			if (count($data["cuerpo"]) > 0)
			{

				# se recorre el array y se extraer cada uno de los registros
				for ($i = 0; $i < count($data["cuerpo"]); $i++)
          		{
					$formulario.="<tr id='tr".$i."' onclick=\"js_selected_rd_tr(".$i.",'tbody_Cosecha','rdCodigo_Cosecha');\">";
                    $formulario.= 	"<td>";
                    $formulario.=      "  <input class='inputRadio' type='radio'
                    				value='".$data["cuerpo"][$i]["nPerCosCodigo"]."'
                    				name='rdCodigo_Cosecha' id='rdCodigo_Cosecha".$i."'/>";
                    $formulario.=        $data["cuerpo"][$i]["cCosCodigo"];
                    $formulario.=  	"</td>";
				   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cParDescParcela"]."</td>";
				   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cParDescProducto"]."</td>";
				   	$formulario.= 	"<td>&nbsp&nbsp".$data["cuerpo"][$i]["fHectareas"]."</td>";
				   	$formulario.= 	"<td>&nbsp&nbsp".$data["cuerpo"][$i]["fQuintales"]."</td>";
				   	$formulario.= 	"<td>".$data["cuerpo"][$i]["fKilogramos"]."</td>";
				   	$formulario.= 	"<td>".$data["cuerpo"][$i]["fHolgura"]."</td>";
				   	$formulario.="</tr>";
				}
					$objResponse->assign("tbody_Cosecha","innerHTML",$formulario);

				#Paginado
				    $Paginacion = Paginar($nNumRegExist, $nNumRegMostrar,  $nPagAct,  'xajax_Filtrar_Sector', 'xajax.getFormValues(FrmPrincipal)');
				    $objResponse->assign("Cont_Pag_Cosecha_","innerHTML",$Paginacion);
			}else{
			  	$objResponse->assign("tbody_Cosecha","innerHTML",$formulario);
			  	$objResponse->assign("Cont_Pag_Cosecha_","innerHTML",$Paginacion);
			}
			return $objResponse;
		}

	# NUEVO
		function Nuevo_Cosecha($frm)
		{
			$objResponse = new xajaxResponse();
			#Formulario
			$funcion = "Insertar_Cosecha";
			$cPerCodigo =  $frm["rdCodigo"] ;
			$formulario = Frm_Cosecha($funcion,$cPerCodigo);

			# configurando emergente
			$FrmRpta = FrmEmergente("NUEVO Cosecha", $formulario);
			$objResponse->assign("emergente_contenido","innerHTML",$FrmRpta);

			// $objResponse->assign("emergente","style.height","420px");
			$objResponse->script("mostrar_emergente();");

			return $objResponse;
		}

	# INSERTAR
		function Insertar_Cosecha($frmE , $frmP)
		{
			$objResponse = new xajaxResponse();


			$MsjAlter = "";
			$Funcion = "";
			#VALIDACION

				if(empty($frmP['rdCodigo'])){
					$MsjAlter = "Seleccionar Productor";
				}
				if(empty($frmE['Parcela_'])){
					$MsjAlter = "Seleccionar Parcela";
				}
				if(empty($frmE['Producto_'])){
					$MsjAlter = "Seleccionar Productos";
				}
				if(empty($frmE['cParCodCosecha_'])){
					$MsjAlter = "Ingrese Codigo de Cosecha.";
				}
				if(empty($frmE['Hectareas_'])){
					$MsjAlter = "Ingrese Hectareas de Cosecha.";
				}
				if(empty($frmE['Quintales_'])){
					$MsjAlter = "Ingrese Ingrese Kg Estimados ";
				}
				if(empty($frmE['holgura_'])){
					$MsjAlter = "Ingrese lo extra de la cosecha ";
				}

			if($MsjAlter == "")
			{
				# OBJETOS
					$bean_percosecha =  new Bean_percosecha() ;

					$objPercosecha  = new ClsPercosecha();
					$objPeriodo    = new ClsPeriodo();

				# DATOS FRM
					$cPerCodigo  = $frmP['rdCodigo'] ;
					$nParcCodigo = $frmE['Parcela_'] ;
					$nProdCodigo = $frmE['Producto_'] ;
					$cCosCodigo  = $frmE['cParCodCosecha_'] ;
					$Hectareas   = $frmE['Hectareas_'] ;
					$fQuintales  = $frmE['Quintales_'] ; // save  cParDespcricion de parametro
					$fKilogramos = $fQuintales * 52.5 ;
					$fHolgura    = $frmE['holgura_'] ;

					$dataPeriodo = $objPeriodo->Get_Periodo_Activo() ;
					$nPrdCodigo = $dataPeriodo["cuerpo"][0]["nPrdCodigo"] ;

					$bean_percosecha->setcPerCodigo($cPerCodigo) ;
					$bean_percosecha->setnParcCodigo($nParcCodigo) ;
					$bean_percosecha->setnProdCodigo($nProdCodigo) ;
					$bean_percosecha->setnPrdCodigo($nPrdCodigo) ;

					$bean_percosecha->setcCosCodigo($cCosCodigo) ;
					$bean_percosecha->setfHectareas($Hectareas ) ;
					$bean_percosecha->setfQuintales($fQuintales) ;
					$bean_percosecha->setfKilogramos($fKilogramos) ;
					$bean_percosecha->setfHolgura($fHolgura) ;
					$bean_percosecha->setcGlosa("") ;

				# valida que el codigo sector no exista
					$dataVal = $objPercosecha->Validar_PerCosecha($bean_percosecha) ;

			        if(count($dataVal["cuerpo"]) > 0)
			        {
			            $MsjAlter = "Ya tiene una Cosecha registrada para esta parcela con el mismo producto en la campaña actual.";
			        }

				# validacion en BD
				if($MsjAlter=="")
				{
					# REGISTRAR DATA
						try
						{
							# iniciamos la transaccion
					        	$objPercosecha->beginTransaction() ;

					        # REGISTRAR COSECHA
								$dataCos = $objPercosecha->Set_PerCosecha($bean_percosecha);

							# INSERTAMOS LA TRANSACCION
								Insertar_Transaccion(1,"NUEVO COSECHA nPerCosCodigo: ".$dataCos["cuerpo"][0]["nPerCosCodigo"].", cPerCodigo:".$cPerCodigo.", cCosCodigo:".$cCosCodigo ,"") ;

							# si todo a tendido exito
				        		$objPercosecha->commit();
				        		$Funcion = "xajax_Listar_Cosechas( 0,15,1,1 ) ; ocultar_emergente();";
						}catch(Exception $e)
			        	{
			        		# si ha habido algun error
			        		$objPercosecha->rollback();
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
		function Editar_Cosecha($frm)
		{
			$objResponse = new xajaxResponse();

			$formulario = "";
			$nPrdTipo = "";
				if (!empty($frm["rdCodigo_Cosecha"]))
				{
					// $cPerCodigo =  $frm["rdCodigo"];
					$nPerCosCodigo   = $frm["rdCodigo_Cosecha"];


					$objPerCosecha   = new ClsPerCosecha();
					$bean_percosecha = new Bean_percosecha() ;

					$bean_percosecha->setnPerCosCodigo($nPerCosCodigo);

					$data = $objPerCosecha->Buscar_PerCosecha_by_nPerCosCodigo($bean_percosecha) ;

					// $nParcClase    = $data["cuerpo"][0]["nParcClase"];
					// $nProdClase    = $data["cuerpo"][0]["nProdClase"];

					$nPerCosCodigo = $data["cuerpo"][0]["nPerCosCodigo"];
					$cPerCodigo    = $data["cuerpo"][0]["cPerCodigo"];
					$nParcCodigo   = $data["cuerpo"][0]["nParcCodigo"];
					$nProdCodigo   = $data["cuerpo"][0]["nProdCodigo"];
					$nPrdCodigo    = $data["cuerpo"][0]["nPrdCodigo"];
					$cCosCodigo    = $data["cuerpo"][0]["cCosCodigo"];
					$fHectareas    = $data["cuerpo"][0]["fHectareas"];
					$fQuintales    = $data["cuerpo"][0]["fQuintales"];
					$fHolgura      = $data["cuerpo"][0]["fHolgura"];
					// $fKilogramos   = $data["cuerpo"][0]["fKilogramos"];


					$formulario .= Frm_Cosecha("Actualizar_Cosecha", $cPerCodigo, $nPerCosCodigo,  $nParcCodigo, $nProdCodigo,  $cCosCodigo, $fHectareas, $fQuintales, $fHolgura ) ;
				}
				else
				{
					$formulario .="<div class='divContenedor'>";
	    			$formulario .=	"<div class='divFila' style='text-align:center; margin-top:10px;'>";
				    $formulario .= 		"<label style='color:#000000; font-family:Arial; font-size:12px; font-weight:bold;'>¡SELECCIONE UN REGISTRO DE LA LISTA!</label>";
				    $formulario .=	"</div>";
				    $formulario .="</div>";
				}
					$FrmRpta = FrmEmergente("ACTUALIZAR Cosecha", $formulario);
					$objResponse->script("mostrar_emergente();");
					$objResponse->assign("emergente_contenido","innerHTML",$FrmRpta);

			return $objResponse;
		}

	# Actualizar
		function Actualizar_Cosecha($frmE , $frmP)
		{
			$objResponse = new xajaxResponse();


			$MsjAlter = "";
			$Funcion = "";
			#VALIDACION
				if(empty($frmP['rdCodigo'])){
					$MsjAlter = "Seleccionar Productor";
				}
				if(empty($frmE['Parcela_'])){
					$MsjAlter = "Seleccionar Parcela";
				}
				if(empty($frmE['Producto_'])){
					$MsjAlter = "Seleccionar Productos";
				}
				if(empty($frmE['cParCodCosecha_'])){
					$MsjAlter = "Ingrese Codigo de Cosecha.";
				}
				if(empty($frmE['Hectareas_'])){
					$MsjAlter = "Ingrese Hectareas de Cosecha.";
				}
				if(empty($frmE['Quintales_'])){
					$MsjAlter = "Ingrese Ingrese Kg Estimados ";
				}
				if(empty($frmE['holgura_'])){
					$MsjAlter = "Ingrese lo extra de la cosecha ";
				}


			if($MsjAlter == "")
			{
				# OBJETOS

					$objPercosecha   = new ClsPercosecha();
					$bean_percosecha =  new Bean_percosecha() ;

				# DATOS FRM


					$cPerCodigo    = $frmP['rdCodigo'] ;
					$nPerCosCodigo = $frmE["nParCodCosecha_"];
					$nParcCodigo   = $frmE['Parcela_'] ;
					$nProdCodigo   = $frmE['Producto_'] ;
					$cCosCodigo    = $frmE['cParCodCosecha_'] ;
					$Hectareas     = $frmE['Hectareas_'] ;
					$fQuintales    = $frmE['Quintales_'] ; // save  cParDespcricion de parametro
					$fKilogramos   = $fQuintales * 52.5 ;
					$fHolgura      = $frmE['holgura_'] ;

					$bean_percosecha->setnPerCosCodigo($nPerCosCodigo) ;
					$bean_percosecha->setnParcCodigo($nParcCodigo) ;
					$bean_percosecha->setnProdCodigo($nProdCodigo) ;

					$bean_percosecha->setcCosCodigo($cCosCodigo) ;
					$bean_percosecha->setfHectareas($Hectareas ) ;
					$bean_percosecha->setfQuintales($fQuintales) ;
					$bean_percosecha->setfKilogramos($fKilogramos) ;
					$bean_percosecha->setfHolgura($fHolgura) ;

				# valida que el codigo sector no exista
		    	// $data = $objParametro->Validar_Parametro($bean_parametro);

		      /*  if(count($data["cuerpo"]) > 0)
		        {
		            $MsjAlter = "Código se encuentra registrado";
		        }
				*/
				# validacion en BD
				if($MsjAlter=="")
				{
					# REGISTRAR DATA
						try
						{
							# iniciamos la transaccion
					        	$objPercosecha->beginTransaction() ;

					        # ACTUALIZAR
			        			$data = $objPercosecha->Upd_PerCosecha($bean_percosecha);
			        			// $objResponse->alert($data) ;
							# INSERTAMOS LA TRANSACCION
								Insertar_Transaccion(2,"ACTUALIZAR COSECHA nPerCosCodigo: ".$nPerCosCodigo.", cPerCodigo:".$cPerCodigo.", cCosCodigo:".$cCosCodigo ,"") ;

							# si todo a tendido exito
				        		$objPercosecha->commit();
				        		$Funcion = "xajax_Listar_Cosechas( 0,15,1,1 ) ; ocultar_emergente();";
						}catch(Exception $e)
			        	{
			        		# si ha habido algun error
			        		$objPercosecha->rollback();
			        		$MsjAlter =  "Error de registro.".$e->getMessage() ;
			        		// $MsjAlter =  "Error de registro.";
			        	}
				}
			}

			$objResponse->assign("labelMsj","innerHTML",$MsjAlter);
			$objResponse->script($Funcion);
			return $objResponse;
		}

	#ELIMINAR
		function Eliminar_Cosecha($frm)
		{
			$objResponse = new xajaxResponse();

			if(empty($frm["rdCodigo_Cosecha"]))
			{
				$rdCodigo_Cosecha = "";
			}
			else
			{
				$rdCodigo_Cosecha = $frm["rdCodigo_Cosecha"];
			}


			$formulario = FrmEliminar("ConfEliminar_Cosecha",$rdCodigo_Cosecha);

			$FrmRpta = FrmEmergente("ELIMINAR SECTOR", $formulario);
			$objResponse->script("mostrar_emergente();");
			$objResponse->assign("emergente","style.height","130px");
			$objResponse->assign("emergente_contenido","innerHTML",utf8_encode($FrmRpta));

			return $objResponse;
		}

	#CONFIRMAR ELIMINACION
		function ConfEliminar_Cosecha($nPerCosCodigo , $nEstado = 0 )
		{
			$objResponse = new xajaxResponse();

			$MsjAlter = "&nbsp;";
			$Funcion = "";

			$objPercosecha   = new ClsPercosecha();
			$bean_percosecha = new Bean_percosecha() ;

			$bean_percosecha->setnPerCosCodigo($nPerCosCodigo) ;
			$bean_percosecha->setnPerCosEstado($nEstado ) ;


			try
	    	{	# iniciamos la transaccion
	    		$objPercosecha->beginTransaction() ;
    			# Actulizar estado del paramentro  como Sector
				$objPercosecha->Upd_PerCosecha_Estado($bean_percosecha);
				Insertar_Transaccion(3,"ELIMNO COSECHA: nPerCosCodigo: ".$nPerCosCodigo,"") ;

				# si todo a tendido exito
	    		$objPercosecha->commit();

	    		$Funcion = "xajax_Listar_Cosechas(0,15,1,1); ocultar_emergente();";

	    	}catch(Exception $e)
	    	{
	    		# si ha habido algun error
	    		$objPercosecha->rollback();
	    		// $MsjAlter = "Error de registro: ";
	    		$MsjAlter = "Error de registro: ".$e->getMessage();
	    		// $MsjAlter = "Error de registro: ". $e->getMessage() ;
	    	}

			$objResponse->assign("labelMsj","innerHTML",$MsjAlter);
			$objResponse->script($Funcion);
			return $objResponse;
		}

	# FRM PARCELA
		// function Frm_Cosecha($funcion,$cPerCodigo , $nParCodCosecha = 0 , $cParNomCodCosecha = "" , $nCodParcela = 0 , $nCodProducto = 0 , $Hectareas = "" , $Kg = "" )
		function Frm_Cosecha($funcion,$cPerCodigo , $nPerCosCodigo = 0 ,  $nParcCodigo = 0, $nProdCodigo = 0 , $cCosCodigo = "" , $fHectareas ="" , $fQuintales = "", $fHolgura ="")
		{
			$objPerParametro   = new ClsPerParametro() ;
			$objParametro      = new ClsParametro() ;

			$bean_perparametro = new Bean_perparametro() ;
			$bean_parametro    = new Bean_parametro() ;

			$bean_perparametro->setcPerCodigo($cPerCodigo ) ;
			$bean_perparametro->setnParClase(2006) ;

			$data_parcela = $objPerParametro->Get_PerParametro_by_cPer_nPar_Codigo($bean_perparametro ) ;
			$option_parcela = SelectOption($data_parcela, "nParCodigo","cParDescripcion", $nParcCodigo );

			$bean_parametro->setnParClase(2007) ;

			$data_productos = $objParametro->Get_Parametro_By_cParClase($bean_parametro ) ;
			$option_productos = SelectOption($data_productos, "nParCodigo","cParDescripcion", $nProdCodigo );


			$formulario = '
		    	<div class="vform vformContenedor">
		    		<fieldset class="c12">
		    		<input type="hidden" name="nParCodCosecha_" value="'.$nPerCosCodigo.'" />' ;

		        $formulario .=' <fieldset class="c6">
						    		<label for="Parcela_"> Parcela </label>
						    		<select name="Parcela_" id="Parcela_">
						    		'.$option_parcela.'
						    		</select>
						    	</fieldset> ';

				$formulario .=' <fieldset class="c6">
						    		<label for="Producto_"> Producto </label>
						    		<select name="Producto_" id="Producto_">
						    		'.$option_productos.'
						    		</select>
						    	</fieldset> ';

				$formulario .='<fieldset class="c6 ">
	                                <label for="cParCodCosecha_">Codigo</label>
	                                <span class="pre  icon-text"></span>
	                                <input type="text" class="pre " name="cParCodCosecha_" id="cParCodCosecha_" value="'.$cCosCodigo.'" placeholder="INGRESE Codigo Cosecha "  maxlength="15">
	                            </fieldset>';


	            $formulario .='<fieldset class="c6 ">
	                                <label for="Hectareas_">Hectareas </label>
	                                <span class="pre  icon-text"></span>
	                                <input type="text" class="pre " name="Hectareas_" id="Hectareas_" value="'.$fHectareas.'" placeholder="INGRESE Hectareas para el Producto" onfocus="Validar_Decimal(this) ;"  maxlength="4">
	                            </fieldset>';

	            $formulario .='<fieldset class="c6 ">
	                                <label for="Quintales_"> Quintales  </label>
	                                <span class="pre  icon-text"></span>
	                                <input type="text" class="pre " name="Quintales_" id="Quintales_" value="'.$fQuintales.'" placeholder="INGRESE Area Cosecha " onfocus="Validar_Decimal(this) ;" maxlength="4">
	                            </fieldset>';

	            $formulario .='<fieldset class="c6 ">
	                                <label for="holgura_"> % Extra </label>
	                                <span class="pre  icon-text"></span>
	                                <input type="text" class="pre " name="holgura_" id="holgura_" value="'.$fHolgura.'" placeholder="INGRESE holgura " onfocus="Validar_Decimal(this) ;" maxlength="4">
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
		function Rpt_Cosecha_Pdf($frm="")
		{
			$objResponse = new xajaxResponse();
			$objPerCosecha   =  new ClsPerCosecha() ;
			$bean_percosecha = new Bean_percosecha();

			$objPersona   =  new ClsPersona() ;
			$bean_persona = new Bean_persona();

			# validaciones
				if(empty($frm["rdCodigo"]))
				{
					$cPerCodigo = "-";
				}else{
					$cPerCodigo = $frm["rdCodigo"];
				}

			$bean_percosecha->setnOriRegistros(0) ;
			$bean_percosecha->setnNumRegMostrar(0) ;
			$bean_percosecha->setnPagRegistro(0) ; # que no pagine
			$bean_percosecha->setcPerCodigo($cPerCodigo) ;


		    $data = $objPerCosecha->Get_PerCoseha_by_cPerCodigo($bean_percosecha);

		    $bean_persona->setcPerCodigo($cPerCodigo) ;
			$dataPersona = $objPersona->Buscar_Persona_By_cPerCodigo($bean_persona) ;

			$formulario= "";
			if (count($data["cuerpo"]) > 0)
			{

				$formulario .= "<table class='table'>" ;

				$formulario .='
						<tr class="border-bottom">
							<th class="" style="width:10%;"  colspan="8" > Productor </th>
						</tr>
					' ;
				$formulario .='
						<tr class="border-bottom">
							<td class="" style="width:10%;"  colspan="8" > '.$dataPersona["cuerpo"][0]["cPerApellidos"].' '.$dataPersona["cuerpo"][0]["cPerNombre"]. ' </td>
						</tr>
					' ;

				$formulario .='
						<tr class="border-bottom">
							<th  style="width: 8%;"> Num  </th>
							<th  style="width: 10%;"> Codigo  </th>
							<th  style="width: 20%;"> Parcela </th>
							<th  style="width: 20%;"> Productos </th>
							<th  style="width: 12%;"> Hectareas</th>
							<th  style="width: 12%;"> Quintales </th>
							<th  style="width: 10%;"> Kg </th>
							<th  style="width: 10%;"> % </th>
						</tr>
					' ;

				$formulario .= "<tbody>" ;

				for ($i = 0; $i < count($data["cuerpo"]); $i++)
            	{
						$formulario.="<tr>";
		                    $formulario.= 	"<td>".($i + 1 )."</td>";
						   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cCosCodigo"]."</td>";
						   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cParDescParcela"]."</td>";
						   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cParDescProducto"]."</td>";
						   	$formulario.= 	"<td>".$data["cuerpo"][$i]["fHectareas"]."</td>";
						   	$formulario.= 	"<td>".$data["cuerpo"][$i]["fQuintales"]."</td>";
						   	$formulario.= 	"<td>".$data["cuerpo"][$i]["fKilogramos"]."</td>";
						   	$formulario.= 	"<td>".$data["cuerpo"][$i]["fHolgura"]."</td>";
					   	$formulario.="</tr>";
				}
				$formulario .= "</tbody>" ;
				$formulario .= "<tfoot>" ;
				$formulario .= " 	<tr>" ;
				$formulario .= " 	<td  colspan='8' class='border-top'>   </td>" ;
				$formulario .= " 	</tr>" ;

				$formulario .= "</tfoot>" ;

				$formulario .= "</table>" ;
			}

			$HTML ="<html>
						<body>
						<br/>
							<h3 class='rounded text-center mayusc title'> Lista de Cosechas  </h3>
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

