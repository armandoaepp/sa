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
									<th  style="width: 10%;">&nbsp; Kg </th>
									<th  style="width: 10%;">&nbsp; Quintales </th>
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
				    // $objResponse->script("xajax_Filtrar_Cosecha('".$nOriRegistros."', '".$nNumRegMostrar."', '".$nPagRegistro."', '".$nPagAct."',  xajax.getFormValues(FrmPrincipal) );");
					return $objResponse;
		}

	# FILTRAR
		function Filtrar_Cosecha($nOriRegistros, $nNumRegMostrar, $nPagRegistro, $nPagAct,$frm)
		{
			$objResponse = new xajaxResponse();
			$objCosecha  =  new ClsCosecha() ;

			$bean_parametro    = new Bean_parametro();
			$bean_perparametro = new Bean_perparametro();

			# validaciones
				if(empty($frm["rdCodigo"]))
				{
					$cPerCodigo = "-";
				}else{
					$cPerCodigo = $frm["rdCodigo"];
				}
				if(empty($frm["s_cCodigoCosecha_"]))
				{
					$cCodigoCosecha = "-";
				}else{
					$cCodigoCosecha = $frm["s_cCodigoCosecha_"];
				}
				if(empty($frm["s_cCosecha_"]))
				{
					$cCosecha = "-";
				}else{
					$cCosecha = $frm["s_cCosecha_"];
				}


			$bean_parametro->setnOriRegistros($nOriRegistros) ;
			$bean_parametro->setnNumRegMostrar($nNumRegMostrar) ;
			$bean_parametro->setnPagRegistro(0) ; # que no pagine
			$bean_parametro->setcParNombre($cCodigoCosecha) ;
			$bean_parametro->setcParDescripcion($cCosecha) ;

			$bean_perparametro->setcPerCodigo($cPerCodigo) ;


		    $AdoRs = $objCosecha->Get_Cosechas_by_cPerCodigo($bean_parametro ,$bean_perparametro );
		    // $objResponse->alert( $AdoRs ) ;
	   		//  #Capturar el número de registros
	    	$nNumRegExist = count($AdoRs["cuerpo"]);

	    	 #Filtrar registros deacuerdo al origen de datos y y viene paginados
			$bean_parametro->setnPagRegistro($nPagRegistro) ; # para que pagine

		    #Filtrar registrar
	    	$data = $objCosecha->Get_Cosechas_by_cPerCodigo($bean_parametro ,$bean_perparametro );

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
                    				value='".$data["cuerpo"][$i]["nParCodigo"]."'
                    				name='rdCodigo_Cosecha' id='rdCodigo_Cosecha".$i."'/>";
                    $formulario.=        $data["cuerpo"][$i]["cParNombre"];
                    $formulario.=  	"</td>";
				   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cParDescripcion"]."</td>";
				   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cPerParValor"]."</td>";
				   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cPerParGlosa"]."</td>";
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

			$objResponse->script("Calendar_Load('dFechaIncorCosecha_');");
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
					$bean_perparparametro =  new Bean_perparparametro() ;
					$bean_parametro       =  new Bean_parametro() ;

					$objPerParParametro = new ClsPerParParametro();
					$objParametro       = new ClsParametro();

				# DATOS FRM
					$cPerCodigo     = $frmP['rdCodigo'] ;
					$Parcela        = $frmE['Parcela_'] ;
					$Producto       = $frmE['Producto_'] ;
					$cParCodCosecha = $frmE['cParCodCosecha_'] ;
					$Hectareas      = $frmE['Hectareas_'] ;
					$Quintales      = $frmE['Quintales_'] ; // save  cParDespcricion de parametro
					$holgura        = $frmE['holgura_'] ;



				// $bean_parametro->setcParJerarquia($nCaserio);
				$bean_parametro->setnParClase( 2008 );
				$bean_parametro->setcParNombre($cParCodCosecha);
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
								$bean_parametro->setcParNombre($cParCodCosecha);
								$bean_parametro->setcParDescripcion($Quintales );
								$bean_parametro->setnParClase( 2008 );
			        			$data = $objParametro->Set_Parametro($bean_parametro);

			        			$nParCodigo = $data["cuerpo"][0]["nParCodigo"] ;

							# REGISTRAR PERPARAMETROS
								$bean_perparametro->setcPerCodigo($cPerCodigo) ;
								$bean_perparametro->setnParClase(2006) ;
								$bean_perparametro->setnParCodigo($nParCodigo) ;
								$bean_perparametro->setcPerParValor($nAreaParecela) ;
								$bean_perparametro->setcPerParGlosa($dFechaIncorCosecha) ;



								$bean_perparparametro->setcPerCodigo($cPerCodigo);
								$bean_perparparametro->setnParSrcCodigo($nParCodigo);
								$bean_perparparametro->setnParSrcClase(2008);
								$bean_perparparametro->setnParDstCodigo();
								$bean_perparparametro->setnParDstClase();
								$bean_perparparametro->setcParParValor();
								$bean_perparparametro->setcParParGlosa();
								# Fecha Incorporacion
								$dat1 = $objPerParParametro->Set_PerParParametro($bean_perparparametro) ;

							# INSERTAMOS LA TRANSACCION
								Insertar_Transaccion(1,"NUEVO PARCELA nParCodigo: ".$nParCodigo.", cPerCodigo:".$cPerCodigo.", cParDescCosecha:".$cParDescCosecha ,"") ;

							# si todo a tendido exito
				        		$objPersona->commit();
				        		$Funcion = "xajax_Listar_Cosechas( 0,15,1,1 ) ; ocultar_emergente();";
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
		function Editar_Cosecha($frm)
		{
			$objResponse = new xajaxResponse();

			$formulario = "";
			$nPrdTipo = "";
				if (!empty($frm["rdCodigo_Cosecha"]))
				{
					$nParCodigo =  $frm["rdCodigo_Cosecha"];
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
						$dFechaIncorCosecha = $dataPerPar["cuerpo"][0]["cPerParGlosa"] ;

						$formulario .= Frm_Cosecha("Actualizar_Cosecha", $nParCodigo , $cParNombre , $cParDescripcion , $nAreaParecela , $dFechaIncorCosecha ) ;

					# configurando emergente
					$FrmRpta = FrmEmergente("ACTUALIZAR Cosecha", $formulario);
					$objResponse->script("mostrar_emergente();");

					$objResponse->assign("emergente_contenido","innerHTML",$FrmRpta);
					$objResponse->script("Calendar_Load('dFechaIncorCosecha_');");
				}
				else
				{
					$formulario .="<div class='divContenedor'>";
	    			$formulario .=	"<div class='divFila' style='text-align:center; margin-top:10px;'>";
				    $formulario .= 		"<label style='color:#000000; font-family:Arial; font-size:12px; font-weight:bold;'>¡SELECCIONE UN REGISTRO DE LA LISTA!</label>";
				    $formulario .=	"</div>";
				    $formulario .="</div>";

				    $FrmRpta = FrmEmergente("ACTUALIZAR Cosecha", $formulario);
					$objResponse->script("mostrar_emergente();");
					// $objResponse->assign("emergente","style.height","180px");
					$objResponse->assign("emergente_contenido","innerHTML",$FrmRpta);
				}

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
				if(empty($frmE['nParCodCosecha_'])){
					$MsjAlter = "No Existe Cosecha Seleccionada";
				}
				if(empty($frmE['cParCodCosecha_'])){
					$MsjAlter = "Ingrese Codigo de Cosecha.";
				}
				if(empty($frmE['cParCodCosecha_'])){
					$MsjAlter = "Ingrese Codigo de Cosecha.";
				}
				if(empty($frmE['cParDescCosecha_'])){
					$MsjAlter = "Ingrese Nombre de Cosecha";
				}
				if(empty($frmE['nAreaParecela_'])){
					$MsjAlter = "Ingrese Área de Cosecha.";
				}
				if(empty($frmE['dFechaIncorCosecha_'])){
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
					$nParCodigo         = $frmE['nParCodCosecha_'] ;
					$cParNomCodCosecha  = $frmE['cParCodCosecha_'] ;
					$cParDescCosecha    = Mayusc($frmE['cParDescCosecha_']) ;
					$nAreaParecela      = $frmE['nAreaParecela_'] ;
					$dFechaIncorCosecha = $frmE['dFechaIncorCosecha_'] ;
					// $objResponse->alert($cPerCodigo);

				// $bean_parametro->setcParJerarquia($nCaserio);
				$bean_parametro->setnParClase( 2006 );
				$bean_parametro->setcParNombre($cParNomCodCosecha );
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
								$bean_parametro->setcParNombre($cParNomCodCosecha );
								$bean_parametro->setcParDescripcion($cParDescCosecha );

			        			$data = $objParametro->Upd_Parametro($bean_parametro);

			        			// $nParCodigo = $data["cuerpo"][0]["nParCodigo"] ;

							# REGISTRAR PERPARAMETROS
								$bean_perparametro->setcPerCodigo($cPerCodigo) ;
								$bean_perparametro->setnParClase(2006) ;
								$bean_perparametro->setnParCodigo($nParCodigo) ;
								$bean_perparametro->setcPerParValor($nAreaParecela) ;
								$bean_perparametro->setcPerParGlosa($dFechaIncorCosecha) ;
								# Fecha Incorporacion
								$dat1 = $objPerParametro->Upd_PerParametro($bean_perparametro ) ;

							# INSERTAMOS LA TRANSACCION
								Insertar_Transaccion(2,"ACTUALIZAR PARCELA nParCodigo: ".$nParCodigo.", cPerCodigo:".$cPerCodigo.", cParDescCosecha:".$cParDescCosecha ,"") ;

							# si todo a tendido exito
				        		$objParametro->commit();
				        		$Funcion = "xajax_Listar_Cosechas( 0,15,1,1 ) ; ocultar_emergente();";
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
		function Eliminar_Cosecha($frm)
		{
			$objResponse = new xajaxResponse();

			if(empty($frm["rdCodigo"]))
			{
				$nPerCodigo = "";
			}
			else
			{

				$nPerCodigo = $frm["rdCodigo"];
				$nParCodigo = $frm["rdCodigo_Cosecha"];

			}


			$formulario = FrmEliminar("ConfEliminar_Cosecha",$nPerCodigo."-".$nParCodigo);

			$FrmRpta = FrmEmergente("ELIMINAR SECTOR", $formulario);
			$objResponse->script("mostrar_emergente();");
			$objResponse->assign("emergente","style.height","130px");
			$objResponse->assign("emergente_contenido","innerHTML",utf8_encode($FrmRpta));

			return $objResponse;
		}

	#CONFIRMAR ELIMINACION
		function ConfEliminar_Cosecha($nParCodigo , $nEstado = 0 )
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

	    		$Funcion = "xajax_Listar_Cosechas(0,15,1,1); ocultar_emergente();";

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
		function Frm_Cosecha($funcion,$cPerCodigo , $nParCodCosecha = 0 , $cParNomCodCosecha = "" , $nCodParcela = 0 , $nCodProducto = 0 , $Hectareas = "" , $Kg = "" )
		{
			$objPerParametro   = new ClsPerParametro() ;
			$objParametro      = new ClsParametro() ;

			$bean_perparametro = new Bean_perparametro() ;
			$bean_parametro    = new Bean_parametro() ;

			$bean_perparametro->setcPerCodigo($cPerCodigo ) ;
			$bean_perparametro->setnParClase(2006) ;

			$data_parcela = $objPerParametro->Get_PerParametro_by_cPer_nPar_Codigo($bean_perparametro ) ;
			$option_parcela = SelectOption($data_parcela, "nParCodigo","cParDescripcion", $nCodParcela );

			$bean_parametro->setnParClase(2007) ;

			$data_productos = $objParametro->Get_Parametro_By_cParClase($bean_parametro ) ;
			$option_productos = SelectOption($data_productos, "nParCodigo","cParDescripcion", $nCodProducto );


			$formulario = '
		    	<div class="vform vformContenedor">
		    		<fieldset class="c12">
		    		<input type="hidden" name="nParCodCosecha_" value="'.$nParCodCosecha.'" />' ;

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
	                                <input type="text" class="pre " name="cParCodCosecha_" id="cParCodCosecha_" value="'.$cParNomCodCosecha.'" placeholder="INGRESE Codigo Cosecha "  maxlength="8">
	                            </fieldset>';


	            $formulario .='<fieldset class="c6 ">
	                                <label for="Hectareas_">Hectareas </label>
	                                <span class="pre  icon-text"></span>
	                                <input type="text" class="pre " name="Hectareas_" id="Hectareas_" value="'.$cParDescCosecha.'" placeholder="INGRESE Hectareas para el Producto" onfocus="Validar_Decimal(this) ;"  maxlength="4">
	                            </fieldset>';

	            $formulario .='<fieldset class="c6 ">
	                                <label for="Quintales_"> Quintales  </label>
	                                <span class="pre  icon-text"></span>
	                                <input type="text" class="pre " name="Quintales_" id="Quintales_" value="'.$nAreaParecela.'" placeholder="INGRESE Area Cosecha " onfocus="Validar_Decimal(this) ;" maxlength="4">
	                            </fieldset>';

	            $formulario .='<fieldset class="c6 ">
	                                <label for="holgura_"> % Extra </label>
	                                <span class="pre  icon-text"></span>
	                                <input type="text" class="pre " name="holgura_" id="holgura_" value="" placeholder="INGRESE holgura " onfocus="Validar_Decimal(this) ;" maxlength="4">
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
			$objCosecha  =  new ClsCosecha() ;
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
				if(empty($frm["s_cCodigoCosecha_"]))
				{
					$cCodigoCosecha = "-";
				}else{
					$cCodigoCosecha = $frm["s_cCodigoCosecha_"];
				}
				if(empty($frm["s_cCosecha_"]))
				{
					$cCosecha = "-";
				}else{
					$cCosecha = $frm["s_cCosecha_"];
				}

			# parametro
			$bean_parametro->setnOriRegistros(0) ;
			$bean_parametro->setnNumRegMostrar(0) ;
			$bean_parametro->setnPagRegistro(0) ; # que no pagine
			$bean_parametro->setcParNombre($cCodigoCosecha) ;
			$bean_parametro->setcParDescripcion($cCosecha) ;
			# perparametro
			$bean_perparametro->setcPerCodigo($cPerCodigo) ;

		    $data = $objCosecha->Get_Cosechas_by_cPerCodigo($bean_parametro ,$bean_perparametro );

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
							<th class="" style="width: 20% ;"> Cosecha </th>
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

