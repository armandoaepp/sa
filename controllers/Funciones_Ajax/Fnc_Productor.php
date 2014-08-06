<?php

	$xajax->registerFunction("Listar_Tabs_Productor");
	$xajax->registerFunction("Listar_Productores");
	$xajax->registerFunction("Filtrar_Productor");
	$xajax->registerFunction("Nuevo_Productor");
	$xajax->registerFunction("Insertar_Productor");
	$xajax->registerFunction("Editar_Productor");
	$xajax->registerFunction("Actualizar_Productor");
	$xajax->registerFunction("Eliminar_Productor");
	$xajax->registerFunction("ConfEliminar_Productor");
	$xajax->registerFunction("Rpt_Productor_Pdf");

	# MOSTRAR TABS
		function Listar_Tabs_Productor()
		{

			$objResponse = new xajaxResponse();
			$formulario ='';
			# Start Tabs
			$formulario .='<div class="tabs"  > ' ;

				# Start Tab1
				$formulario .='<div class="tab">
								<input type="radio" id="tab-1" name="tab-group-1"  checked class="tab-radio" onclick="xajax_Menus_Botonera(\'100201\');">
								<label for="tab-1" class="tab-label" >Productor  </label> ' ;
					# Start content
					$formulario .='	<div class="content " >' ;
							# contenedor de productor
							$formulario .='	<div id="Tab_Productor" >
											</div>' ;


						# paginado paginado productor
						$formulario .='<div id="Cont_Num_Personas_" class="c1" ></div>	<div id="tab_pag_productor"  class="c11"  style="position: relative; top: 5px; padding:0 ;">
										</div> ';


					$formulario .='	</div> ';
					# End content
				$formulario .='</div> ' ;
				# End Tab1

				# Start Tab2
				$formulario .='<div class="tab">
								<input type="radio" id="tab-2" name="tab-group-1"  class="tab-radio" onclick="xajax_Listar_Parcelas( xajax.getFormValues(FrmPrincipal) ) ;">
								<label for="tab-2" class="tab-label" >Parcela  </label> ' ;
					# Start content
					$formulario .='	<div class="content " >' ;
									# contenedor de productor
							$formulario .='	<div id="Tab_Parcela" >
											</div>' ;


						# paginado paginado productor
						$formulario .='<div id="Cont_Num_Parcela_" class="c1" ></div>	<div id="tab_pag_productor"  class="c11"  style="position: relative; top: 5px; padding:0 ;">
										</div> ';
					$formulario .='	</div> ';
					# End content
				$formulario .='</div> ' ;
				# End Tab2

				# Start Tab3
				$formulario .='<div class="tab">
								<input type="radio" id="tab-3" name="tab-group-1"  disabled  class="tab-radio">
								<label for="tab-3" class="tab-label"  >Cosecha  </label> ' ;
					# Start content
					$formulario .='	<div class="content " >' ;

					$formulario .='	</div> ';
					# End content
				$formulario .='</div> ' ;
				# End Tab3

			$formulario .='</div> ';
			# End Tabs



			$formulario="<center>".$formulario."</center>";
		    $objResponse->assign("ContenedorPrincipal","innerHTML",$formulario);
		    $objResponse->script("xajax_Listar_Productores(0,15,1,1);");

			return $objResponse;
		}

	# FILTRAR PRODUCTORES
		function Listar_Productores($nOriRegistros, $nNumRegMostrar, $nPagRegistro, $nPagAct)
		{

			$objResponse = new xajaxResponse();

			$objParametro   = new ClsParametro();
			$bean_parametro = new  Bean_parametro() ;
			# Status
				$bean_parametro->setnParClase(2003);
				$dataStatus= $objParametro->Get_Parametro_By_cParClase($bean_parametro) ;
				$OptionStatus = SelectOption($dataStatus, 'nParCodigo', 'cParDescripcion',$Status);

			$formulario ='';
			$formulario .= ' <div class="ContenedorTable" style="width: 103%; left: -20px; position: relative;"> ' ;


				   		$FuncionSearch = 'xajax_Filtrar_Productor('.$nOriRegistros.', '.$nNumRegMostrar.', '.$nPagRegistro.', '.$nPagAct.',  xajax.getFormValues(FrmPrincipal) );';
						$FuncionEnter = ' if(event.keyCode == 13 ){'.$FuncionSearch.'} ; if( (jq(this).val()).length  == 0){	'.$FuncionSearch.' }';

						$formulario .= '<table style="width:100%;" >
											<tr class="title-table" >
												<td  style="width:8%;">&nbsp; DNI</td>
												<td  style="width:15%;">&nbsp; Apellidos</td>
												<td  style="width:15%;">&nbsp; Nombres</td>
												<td  style="width:8%;">&nbsp; Fecha Nac </td>
												<td  style="width:13%;">&nbsp; E-Mail</td>
												<td  style="width:8%;">&nbsp; Teléfono </td>
												<td  style="width:10%;">&nbsp; Status </td>
												<td  style="width:12%;">&nbsp; Sector  </td>
											</tr>
									    	<tr class="vform">
												<td>
												    <input  type="search"  name="s_cPerDocumento_" id="s_cPerDocumento_" placeholder="Buscar por DNI"
												    onkeyup="'.$FuncionEnter.'"
								    				onsearch="'.$FuncionSearch.'" />
												</td>
												<td>
									    		    <input type="search" name="s_cPerApellidos_" id="s_cPerApellidos_" placeholder="Buscar por Productor"
									    		    onkeyup="'.$FuncionEnter.'"
								    				onsearch="'.$FuncionSearch.'" />

												</td>
												<td>
									    		    <input type="search" name="s_cPerNombre_" id="s_cPerNombre_" placeholder="Buscar DNI"
									    		    onkeyup="'.$FuncionEnter.'"
								    				onsearch="'.$FuncionSearch.'" />
												</td>
												<td>
									    		    <input type="search" name="" id="" placeholder="" disabled />
												</td>
												<td>
									    		    <input type="search" name="" id="" placeholder="" disabled />
												</td>
												<td>
									    		    <input type="search" name="" id="" placeholder="" disabled />
												</td>
												<td>
									    			<select name="s_nParStatus_" id="s_nParStatus_" onchange="'.$FuncionSearch.'">
									    				<option value="0">Todos</option>
									    				'.$OptionStatus.'
									    			</select>
												</td>
												<td>
									    		   <input type="search" name="s_cParSector_" id="s_cParSector_" placeholder="Buscar DNI"
									    		    onkeyup="'.$FuncionEnter.'"
								    				onsearch="'.$FuncionSearch.'" />
												</td>
											</tr>
											<tbody id="tbodyData" class="table table-hover table-border">

											</tbody>
									    </table>
									    </div>';



			$formulario="<center>".$formulario."</center>";
		    $objResponse->assign("Tab_Productor","innerHTML",$formulario);
		    $objResponse->script("xajax_Filtrar_Productor('".$nOriRegistros."', '".$nNumRegMostrar."', '".$nPagRegistro."', '".$nPagAct."',  xajax.getFormValues(FrmPrincipal) );");

			return $objResponse;
		}

	# Filtrar Productores
		function Filtrar_Productor($nOriRegistros, $nNumRegMostrar, $nPagRegistro, $nPagAct,$frm)
		{
			$objResponse       = new xajaxResponse();
			$bean_persona      = new Bean_persona();
			$bean_perdocumento = new Bean_perdocumento();
			$bean_perdocumento = new Bean_perdocumento();
			$bean_parametro    = new Bean_parametro();
			$objProductor      =  new ClsProductor() ;

			# validaciones
				if(empty($frm["s_cPerDocumento_"]))
				{
					$cPerDocumento = "-";
				}else{
					$cPerDocumento = $frm["s_cPerDocumento_"];
				}
				if(empty($frm["s_cPerApellidos_"]))
				{
					$cPerApellidos = "-";
				}else{
					$cPerApellidos = $frm["s_cPerApellidos_"];
				}
				if(empty($frm["s_cPerNombre_"]))
				{
					$cPerNombre = "-";
				}else{
					$cPerNombre = $frm["s_cPerNombre"];
				}
				if(empty($frm["s_nParStatus_"]))
				{
					$nParStatus = 0;
				}else{
					$nParStatus = $frm["s_nParStatus_"];
				}
				if(empty($frm["s_cParSector_"]))
				{
					$cParSector = "-";
				}else{
					$cParSector = $frm["s_cParSector_"];
				}

			$bean_persona->setnOriRegistros($nOriRegistros) ;
			$bean_persona->setnNumRegMostrar($nNumRegMostrar) ;
			$bean_persona->setnPagRegistro(0) ; # que no pagine
			$bean_persona->setcPerNombre($cPerNombre) ;
			$bean_persona->setcPerApellidos($cPerApellidos) ;
			$bean_perdocumento->setcPerDocNumero($cPerDocumento) ;

			$bean_parametro->setnParCodigo($nParStatus) ; # codigo de status
			$bean_parametro->setcParDescripcion($cParSector) ; # descripcion del sector

		    $AdoRs = $objProductor->Get_Productores($bean_persona , $bean_perdocumento, $bean_parametro);
		    // $objResponse->alert( $AdoRs ) ;
	   		//  #Capturar el número de registros
	    	$nNumRegExist = count($AdoRs["cuerpo"]);

	    	 #Filtrar registros deacuerdo al origen de datos y y viene paginados
			$bean_persona->setnPagRegistro($nPagRegistro) ; # para que pagine

		    #Filtrar registrar
	    	$data = $objProductor->Get_Productores($bean_persona , $bean_perdocumento, $bean_parametro );


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
	                    					value='".$data["cuerpo"][$i]["cPerCodigo"]. "'
	                    					name='rdCodigo' id='rdCodigo".$i."'/>";
	                    $formulario.=         $data["cuerpo"][$i]["cPerDocNumero"] ;
	                    $formulario.=   "</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cPerApellidos"]."</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cPerNombre"]."</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["dPerNacimiento"]."</td>";
					   	$formulario.= 	"<td class='text-transform-none'>".$data["cuerpo"][$i]["cPerMail"]."</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cPerTelNumero"]."</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cParStatus"]."</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cParSector"]."</td>";
					   	$formulario.="</tr>";

				}
					$objResponse->assign("tbodyData","innerHTML",$formulario);
				#Paginado
				    $Paginacion = Paginar($nNumRegExist, $nNumRegMostrar,  $nPagAct,  'xajax_Filtrar_Productor', 'xajax.getFormValues(FrmPrincipal)');
				    $objResponse->assign("tab_pag_productor","innerHTML",$Paginacion);
				    $objResponse->assign("Cont_Num_Personas_","innerHTML",$nNumRegExist);

			}else{
			  	$objResponse->assign("tbodyData","innerHTML",$formulario);
			  	$objResponse->assign("tab_pag_productor","innerHTML",$Paginacion);
			}
			  $objResponse->assign("ContenedorPaginado","innerHTML","");

			return $objResponse;
		}

	# NUEVO
		function Nuevo_Productor()
		{
			$objResponse = new xajaxResponse();
			#Formulario
			$funcion = "Insertar_Productor";
			$formulario = Form_Productor($funcion);

			# configurando emergente
			$FrmRpta = FrmEmergente("NUEVO PRODUCTOR", $formulario);

			$objResponse->assign("emergente_contenido","innerHTML",$FrmRpta);
			$objResponse->script("Calendar_Combo('FechaNac_');");
			$objResponse->script("Calendar_Load('FechaIncorporacion_');");

			// $objResponse->assign("emergente","style.height","420px");
			$objResponse->script("mostrar_emergente();");

					$selectDependiente ="Provincia-Distrito-Caserio-Sector" ;
					$objResponse->script("xajax_Combo_Provincia(xajax.$('Departamento_').value ,61, '".$selectDependiente."');");

			return $objResponse;
		}

	# INSERTAR
		function Insertar_Productor($frm)
		{
			$objResponse = new xajaxResponse();


			$MsjAlter = "";
			$Funcion = "";
			#VALIDACION
				if(!is_numeric($frm['cPerDocumento_'])){
					if(strlen($frm['cPerDocumento_']) != 8 )
					{
						$MsjAlter = "Ingrese DNI Valido";
					}

				}
				if(empty($frm['cPerApellidoPat_'])){
					$MsjAlter = "Ingrese Los Apellido Paterno.";
				}
				if(empty($frm['cPerApellidoMat_'])){
					$MsjAlter = "Ingrese Los Apellido Materno.";
				}
				if(empty($frm['cPerNombre_'])){
					$MsjAlter = "Ingrese Los Nombres.";
				}
				if(empty($frm['FechaNac_'])){
					$MsjAlter = "Ingrese Fecha Nacimiento.";
				}
				if(!is_numeric($frm['Telefono_'])){
					$MsjAlter = "Ingrese telefono";
				}
				if(!filter_var($frm['Email_'], FILTER_VALIDATE_EMAIL)){
					$MsjAlter = "Ingrese Un E-Mail Válido.";
				}
				if(!is_numeric($frm['Sexo_'])){
					$MsjAlter = "Seleccionar Sexo.";
				}

				if(empty($frm['FechaIncorporacion_'])){
					$MsjAlter = "Ingrese Fecha de Incorporacion.";
				}
				if(!is_numeric($frm['Clasificacion_'])){
					$MsjAlter = "Seleccionar Clasificación.";
				}
				if(empty($frm['Status_']))
				{
					$MsjAlter = "Seleccionar Status.";
				}



			if($MsjAlter == "")
			{
				# OBJETOS
					$bean_persona      =  new Bean_persona() ;
					$bean_perdocumento =  new Bean_perdocumento() ;
					$bean_pertelefono  =  new Bean_pertelefono() ;
					$bean_permail      =  new Bean_permail() ;
					$bean_pernatural   =  new Bean_pernatural() ;
					$bean_perrelacion  =  new Bean_perrelacion() ;
					$bean_perparametro =  new Bean_perparametro() ;
					$bean_perubigeo    =  new Bean_perubigeo() ;

					$objPersona      = new ClsPersona();
					$objPerNatural   = new ClsPerNatural();
					$objPerDocumento = new ClsPerDocumento();
					$objPerTelefono  = new ClsPerTelefono();
					$objPerMail      = new ClsPerMail();
					$objPerRelacion  = new ClsPerRelacion();
					$objPerParametro = new ClsPerParametro();
					$objPerUbigeo    = new ClsPerUbigeo();

				# DATOS FRM
					$cPerDocumento      = $frm['cPerDocumento_'] ;
					$cPerApellidoPat    = Mayusc($frm['cPerApellidoPat_']) ;
					$cPerApellidoMat    = Mayusc($frm['cPerApellidoMat_']) ;
					$cPerNombre         = Mayusc($frm['cPerNombre_']) ;
					$FechaNac           = $frm['FechaNac_'] ;
					$Telefono           = $frm['Telefono_'] ;
					$Email              = $frm['Email_'] ;
					$Sexo               = $frm['Sexo_'] ;
					$FechaIncorporacion = $frm['FechaIncorporacion_'] ;
					$Clasificacion      = $frm['Clasificacion_'] ;
					$Status             = $frm['Status_'] ;

				# VALIDACION DNI
					$bean_perdocumento->setcPerCodigo("-") ;
					$bean_perdocumento->setnPerDocTipo(1) ; # DNI
					$bean_perdocumento->setcPerDocNumero($cPerDocumento) ;

					$dataPerDoc = $objPerDocumento->Validar_PerDocumento($bean_perdocumento) ;
					// $objResponse->alert($dataPerDoc) ;
					// $objResponse->alert(count($dataPerDoc["cuerpo"])) ;
					if(count($dataPerDoc["cuerpo"]) > 0 )
					{
						$MsjAlter = "DNI se encuentra registrado " ;
					}

				# validacion en BD
				if($MsjAlter=="")
				{
					# REGISTRAR DATA
						try
						{
							# iniciamos la transaccion
					        	$objPersona->beginTransaction() ;
							# Registrar Persona
								$bean_persona->setcPerNombre($cPerNombre ) ;
								$bean_persona->setcPerApellidos($cPerApellidoPat. " ". $cPerApellidoMat) ;
								$bean_persona->setdPerNacimiento($FechaNac) ;
								$bean_persona->setnPerTipo(2) ; # Tipo de Persona JURIDICA(1) OR NATURAL(2)
								$bean_persona->setnPerEstado($Clasificacion) ; # Clasificacion viene hacer el estado de la persona
								# RECUPERAMOS EL CODIGO DE LA PERSONA
								$dataPersona = $objPersona->Set_Persona($bean_persona) ;
								$cPerCodigo  =  $dataPersona["cuerpo"][0]["cPerCodigo"] ;
								// $objResponse->alert($cPerCodigo) ;

							# Registrar PerDocumento
								$bean_perdocumento->setcPerCodigo($cPerCodigo) ;
								$bean_perdocumento->setnPerDocTipo(1) ; # DNI
								$bean_perdocumento->setcPerDocNumero($cPerDocumento) ;
								$bean_perdocumento->setdPerDocCaducidad("0000-00-00") ;
								$bean_perdocumento->setnPerDocCategoria(0) ; # NINGUNA

								$objPerDocumento->Set_PerDocumento($bean_perdocumento ) ;

							# Registrar PerNatural
								$bean_pernatural->setcPerCodigo($cPerCodigo) ;
								$bean_pernatural->setcPerNatApePaterno($cPerApellidoPat) ;
								$bean_pernatural->setcPerNatApeMaterno($cPerApellidoMat) ;
								$bean_pernatural->setnPerNatSexo($Sexo) ;
								$bean_pernatural->setnPerNatEstCivil(0) ;

								$objPerNatural->Set_PerNatural($bean_pernatural );

							# Registrar PerRealacion
								$bean_perrelacion->setcPerCodigo($cPerCodigo) ;
								$bean_perrelacion->setcPerJuridica($_SESSION['S_usuario']) ; # con el Codigo e Usuario se sabe a que empresa pertenece
								$bean_perrelacion->setdPerRelacion(Fecha_Actual_BD()) ;
								$bean_perrelacion->setnPerRelTipo(2002) ; # tipo de persona : PRODUCTOR
								$bean_perrelacion->setcPerObservacion("PRODUCTOR") ;
								# registrar productor
								$objPerRelacion ->Set_PerRelacion($bean_perrelacion ) ;

							# Registrar PERMAIL
								$bean_permail->setcPerCodigo($cPerCodigo) ;
								$bean_permail->setcPerMail($Email) ;

								$objPerMail->Set_PerMail($bean_permail ) ;

							# REGISTRAR PERTELEFONO
								$bean_pertelefono->setcPerCodigo($cPerCodigo ) ;
								$bean_pertelefono->setnPerTelTipo(1) ; 	# Telefono general
								$bean_pertelefono->setcPerTelNumero($Telefono)  ;

								$objPerTelefono->Set_PerTelefono($bean_pertelefono ) ;

							# REGISTRAR PERPARAMETROS
								$bean_perparametro->setcPerCodigo($cPerCodigo) ;
								$bean_perparametro->setnParClase(2005) ;
								$bean_perparametro->setnParCodigo(1) ;
								$bean_perparametro->setcPerParValor($FechaIncorporacion) ;
								$bean_perparametro->setcPerParGlosa("FECHA INCORPORACION") ;
								# Fecha Incorporacion
								$dat1 = $objPerParametro->Set_PerParametro($bean_perparametro ) ;

								# Status
								$bean_perparametro->setnParClase(2003) ;
								$bean_perparametro->setnParCodigo($Status) ;
								$bean_perparametro->setcPerParValor("") ;
								$bean_perparametro->setcPerParGlosa("STATUS") ;

								$dat1 .= $objPerParametro->Set_PerParametro($bean_perparametro ) ;

							# REGISTRAR PERUBIGEO -> SECTOR

								if(empty($frm['Sector_']))
								{
									$Sector  = $frm['Caserio_'] ;
								}else
								{
									$Sector  = $frm['Sector_'] ;
								}

								$bean_perubigeo->setcPerCodigo($cPerCodigo) ;
								$bean_perubigeo->setnPerUbiCodigo($Sector) ;
								$bean_perubigeo->setcPerUbiGlosa("SECTOR") ;

								$objPerUbigeo->Set_PerUbigeo($bean_perubigeo) ;

							# INSERTAMOS LA TRANSACCION
								Insertar_Transaccion(1,"NUEVO PERSONA : ".$cPerCodigo." Nombre Caserio ".$cPerApellidoPat. " ". $cPerApellidoMat ,"") ;

							# si todo a tendido exito
				        		$objPersona->commit();
				        		$Funcion = "xajax_Listar_Productores(0,15,1,1); ocultar_emergente();";
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

	# EDITAR
		function Editar_Productor($frm)
		{
			$objResponse = new xajaxResponse();
			#Formulario

			$formulario = "";
				if (!empty($frm["rdCodigo"]))
				{
					// $arr = explode('-', $frm["rdCodigo"]);
					// $nDepCodigo = $arr[0];
					// $nProCodigo = $arr[1];
					// $nDisCodigo = $arr[2];
					// $nCasCodigo = $arr[3];

					$cPerCodigo = $frm["rdCodigo"] ;

					# OBJETOS
						$bean_persona   =  new Bean_persona() ;
						$bean_parametro =  new Bean_parametro() ;

						$objProductor = new ClsProductor();
						$objUbigeo    = new ClsUbigeo();

						$bean_persona->setcPerCodigo($cPerCodigo) ;
						$data = $objProductor->Get_Productor_by_cPerCodigo($bean_persona  ) ;


						$cPerDocumento   =  $data["cuerpo"][0]["cPerDocNumero"];
						$cPerApellidoPat =  $data["cuerpo"][0]["cPerNatApePaterno"];
						$cPerApellidoMat =  $data["cuerpo"][0]["cPerNatApeMaterno"];
						$cPerNombre      =  $data["cuerpo"][0]["cPerNombre"];
						$FechaNac        =  fecha_BD_Barra($data["cuerpo"][0]["dPerNacimiento"]);
						$Telefono        =  $data["cuerpo"][0]["cPerTelNumero"];
						$Email           =  $data["cuerpo"][0]["cPerMail"];
						$Sexo            =  $data["cuerpo"][0]["nPerNatSexo"] ;
						$FechaIncorp     =  $data["cuerpo"][0]["dFechaIncorp"] ;
						$Clasificacion   =  $data["cuerpo"][0]["nPerEstado"] ;
						$Status          =  $data["cuerpo"][0]["nParStatus"] ;
						$nParSector      =  $data["cuerpo"][0]["nParSector"] ;

						$bean_parametro->setnParCodigo($nParSector) ;
						$dataSector = $objUbigeo->Get_Ubigeo_nParCodSector($bean_parametro) ;

						$nCasCodigo      =  $dataSector["cuerpo"][0]["nCasCodigo"] ;
						$nDisCodigo      =  $dataSector["cuerpo"][0]["nDisCodigo"] ;
						$nProCodigo      =  $dataSector["cuerpo"][0]["nProCodigo"] ;
						$nDepCodigo      =  $dataSector["cuerpo"][0]["nDepCodigo"] ;


						$formulario .= Form_Productor("Actualizar_Productor",$cPerCodigo ,
														$cPerDocumento ,
														$cPerApellidoPat,
														$cPerApellidoMat,
														$cPerNombre,
														$FechaNac,
														$Telefono,
														$Email,
														$Sexo,
														$FechaIncorp,
														$Clasificacion,
														$Status,
														$nDepCodigo,
														$nParSector);

					# configurando emergente
					$FrmRpta = FrmEmergente("ACTUALIZAR PRODUCTOR", $formulario);
					$objResponse->script("mostrar_emergente();");
					// $objResponse->assign("emergente","style.height","180px");
					$objResponse->assign("emergente_contenido","innerHTML",$FrmRpta);

					# para hacer los combos recargables
					$selectDependiente ="" ;
					$objResponse->script("xajax_Combo_Provincia(".$nDepCodigo ." ,".$nProCodigo.", '".$selectDependiente."');");
					$objResponse->script("xajax_Combo_Distrito(".$nProCodigo." ,".$nDisCodigo.", '".$selectDependiente."');");
					$objResponse->script("xajax_Combo_Caserio(".$nDisCodigo." ,".$nCasCodigo.", '".$selectDependiente."');");
					$objResponse->script("xajax_Combo_Sector(".$nCasCodigo." ,".$nParSector.", '".$selectDependiente."');");
					$objResponse->script("Calendar_Combo('FechaNac_');");
					$objResponse->script("Calendar_Load('FechaIncorporacion_');");

				}
				else
				{
					$formulario .="<div class='divContenedor'>";
	    			$formulario .=	"<div class='divFila' style='text-align:center; margin-top:10px;'>";
				    $formulario .= 		"<label style='color:#000000; font-family:Arial; font-size:12px; font-weight:bold;'>¡SELECCIONE UN REGISTRO DE LA LISTA!</label>";
				    $formulario .=	"</div>";
				    $formulario .="</div>";

				    $FrmRpta = FrmEmergente("ACTUALIZAR PRODUCTOR", $formulario);
					$objResponse->script("mostrar_emergente();");
					// $objResponse->assign("emergente","style.height","180px");
					$objResponse->assign("emergente_contenido","innerHTML",$FrmRpta);
				}

			return $objResponse;
		}

	#ACTUALIZAR
		function Actualizar_Productor($frm)
		{
			$objResponse = new xajaxResponse();

			$MsjAlter = "";
			$Funcion = "";

			#VALIDACION
				if(!is_numeric($frm['cPerDocumento_'])){
					if(strlen($frm['cPerDocumento_']) != 8 )
					{
						$MsjAlter = "Ingrese DNI Valido";
					}

				}
				if(empty($frm['cPerApellidoPat_'])){
					$MsjAlter = "Ingrese Los Apellido Paterno.";
				}
				if(empty($frm['cPerApellidoMat_'])){
					$MsjAlter = "Ingrese Los Apellido Materno.";
				}
				if(empty($frm['cPerNombre_'])){
					$MsjAlter = "Ingrese Los Nombres.";
				}
				if(empty($frm['FechaNac_'])){
					$MsjAlter = "Ingrese Fecha Nacimiento.";
				}
				if(!is_numeric($frm['Telefono_'])){
					$MsjAlter = "Ingrese telefono";
				}
				if(!filter_var($frm['Email_'], FILTER_VALIDATE_EMAIL)){
					$MsjAlter = "Ingrese Un E-Mail Válido.";
				}
				if(!is_numeric($frm['Sexo_'])){
					$MsjAlter = "Seleccionar Sexo.";
				}

				if(empty($frm['FechaIncorporacion_'])){
					$MsjAlter = "Ingrese Fecha de Incorporacion.";
				}
				if(!is_numeric($frm['Clasificacion_'])){
					$MsjAlter = "Seleccionar Clasificación.";
				}
				if(empty($frm['Status_']))
				{
					$MsjAlter = "Seleccionar Status.";
				}

			if($MsjAlter=="")
			{
				# OBJETOS
					$bean_persona      =  new Bean_persona() ;
					$bean_perdocumento =  new Bean_perdocumento() ;
					$bean_pertelefono  =  new Bean_pertelefono() ;
					$bean_permail      =  new Bean_permail() ;
					$bean_pernatural   =  new Bean_pernatural() ;
					$bean_perrelacion  =  new Bean_perrelacion() ;
					$bean_perparametro =  new Bean_perparametro() ;
					$bean_perubigeo    =  new Bean_perubigeo() ;

					$objPersona      = new ClsPersona();
					$objPerNatural   = new ClsPerNatural();
					$objPerDocumento = new ClsPerDocumento();
					$objPerTelefono  = new ClsPerTelefono();
					$objPerMail      = new ClsPerMail();
					$objPerRelacion  = new ClsPerRelacion();
					$objPerParametro = new ClsPerParametro();
					$objPerUbigeo    = new ClsPerUbigeo();

				# DATOS FRM
					$cPerCodigo         = $frm['cPerCodigo_'] ;
					$cPerDocumento      = $frm['cPerDocumento_'] ;
					$cPerApellidoPat    = Mayusc($frm['cPerApellidoPat_']) ;
					$cPerApellidoMat    = Mayusc($frm['cPerApellidoMat_']) ;
					$cPerNombre         = Mayusc($frm['cPerNombre_']) ;
					$FechaNac           = $frm['FechaNac_'] ;
					$Telefono           = $frm['Telefono_'] ;
					$Email              = $frm['Email_'] ;
					$Sexo               = $frm['Sexo_'] ;
					$FechaIncorporacion = $frm['FechaIncorporacion_'] ;
					$Clasificacion      = $frm['Clasificacion_'] ;
					$Status             = $frm['Status_'] ;
					$Sector             = $frm['Sector_'] ;

					$arr = explode('-', $frm["nParCodStatus_Sector_"]);
					$nParCodStatus = $arr[0];
					$nParCodSector = $arr[1] ;


				# VALIDACION DNI
					$bean_perdocumento->setcPerCodigo($cPerCodigo) ;
					$bean_perdocumento->setcPerDocNumero($cPerDocumento) ;

					$dataPerDoc = $objPerDocumento->Validar_PerDocumento_Upd($bean_perdocumento) ;

					if(count($dataPerDoc["cuerpo"]) > 0 )
					{
						$MsjAlter = "DNI se encuentra registrado " ;
					}

				if($MsjAlter == "")
				{
					# ACTUALIZAR DATA
						try
			        	{
			        		# iniciamos la transaccion
			        			$objPersona->beginTransaction() ;

				        		# Actulizar Persona
									$bean_persona->setcPerCodigo($cPerCodigo ) ;
									$bean_persona->setcPerNombre($cPerNombre ) ;
									$bean_persona->setcPerApellidos($cPerApellidoPat. " ". $cPerApellidoMat) ;
									$bean_persona->setdPerNacimiento($FechaNac) ;
									// $bean_persona->setnPerTipo(2) ; # Tipo de Persona JURIDICA(1) OR NATURAL(2)
									$bean_persona->setnPerEstado($Clasificacion) ; # Clasificacion viene hacer el estado de la persona

									$objPersona->Upd_Persona($bean_persona ) ;

								# Actulizar PerDocumento
									$bean_perdocumento->setcPerCodigo($cPerCodigo) ;
									$bean_perdocumento->setnPerDocTipo(1) ; # DNI
									$bean_perdocumento->setcPerDocNumero($cPerDocumento) ;

									$objPerDocumento->Upd_PerDocumento_by_cPerCodigo($bean_perdocumento ) ;

								# Actulizar PerNatural
									$bean_pernatural->setcPerCodigo($cPerCodigo) ;
									$bean_pernatural->setcPerNatApePaterno($cPerApellidoPat) ;
									$bean_pernatural->setcPerNatApeMaterno($cPerApellidoMat) ;
									$bean_pernatural->setnPerNatSexo($Sexo) ;
									$bean_pernatural->setnPerNatEstCivil(0) ;

									$objPerNatural->Upd_PerNatural($bean_pernatural );

								# Actulizar PERMAIL
									$bean_permail->setcPerCodigo($cPerCodigo) ;
									$bean_permail->setcPerMail($Email) ;
									$bean_permail->setnPerMailItem(1) ;

									$objPerMail->Upd_PerMail($bean_permail ) ;

								# Actulizar PERTELEFONO
									$bean_pertelefono->setcPerCodigo($cPerCodigo ) ;
									$bean_pertelefono->setnPerTelTipo(1) ; 	# Telefono general
									$bean_pertelefono->setcPerTelNumero($Telefono)  ;
									$bean_pertelefono->setnPerTelItem(1) ;
									$bean_pertelefono->setnPerTelTipNew(1) ;

									$objPerTelefono->Upd_PerTelefono($bean_pertelefono ) ;

								# ACTUALIZAR PERPARAMETROS
									$bean_perparametro->setcPerCodigo($cPerCodigo) ;
									$bean_perparametro->setnParClase(2005) ;
									$bean_perparametro->setnParCodigo(1) ;
									$bean_perparametro->setcPerParValor($FechaIncorporacion) ;
									$bean_perparametro->setcPerParGlosa("FECHA INCORPORACION") ;
									$bean_perparametro->setnParCodigoNew(1) ;
									# Fecha Incorporacion
									$objPerParametro->Upd_PerParametro($bean_perparametro ) ;

									# Status
									$bean_perparametro->setnParClase(2003) ;
									$bean_perparametro->setnParCodigo($nParCodStatus) ;
									$bean_perparametro->setcPerParValor("") ;
									$bean_perparametro->setcPerParGlosa("STATUS") ;
									$bean_perparametro->setnParCodigoNew($Status) ;


									$objPerParametro->Upd_PerParametro($bean_perparametro ) ;

									# ACTUALIZAR SECTOR
									$bean_perubigeo->setcPerCodigo($cPerCodigo) ;
									$bean_perubigeo->setnPerUbiCodigo($nParCodSector) ;
									$bean_perubigeo->setcPerUbiGlosa("SECTOR") ;
									$bean_perubigeo->setnPerUbiCodigoNew($Sector) ;

									$dat = $objPerUbigeo->Upd_PerUbigeo($bean_perubigeo) ;
									// $objResponse->alert($dat) ;

								Insertar_Transaccion(2,"ACTUALIZO PRODUCTOR : ".$cPerCodigo." DESCRIPCIÓN  ".$cPerApellidoPat. " ". $cPerApellidoMat,"") ;

							# si todo a tendido exito
				        		$objPersona->commit();
				        		$Funcion = "xajax_Listar_Productores(0,15,1,1); ocultar_emergente();";

			        	}catch(Exception $e)
			        	{
			        		# si ha habido algun error
			        		$objPersona->rollback();
			        		// $MsjAlter = "Error de registro: " .$e->getMessage();
			        		$MsjAlter = "Error de registro: ";
			        	}
		        }
			}


			$objResponse->assign("labelMsj","innerHTML",$MsjAlter);
			$objResponse->script($Funcion);
			return $objResponse;
		}


	#MOSTRAR ELIMINAR
		function Eliminar_Productor($frm)
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


			$formulario = FrmEliminar("ConfEliminar_Productor",$rdCodigo);

			$FrmRpta = FrmEmergente("ELIMINAR PRODUCTOR", $formulario);
			$objResponse->script("mostrar_emergente();");
			$objResponse->assign("emergente","style.height","130px");
			$objResponse->assign("emergente_contenido","innerHTML",utf8_encode($FrmRpta));

			return $objResponse;
		}

	#CONFIRMAR ELIMINACION
		function ConfEliminar_Productor($nPerCodigo , $nEstado = 0 )
		{
			$objResponse = new xajaxResponse();


			$MsjAlter = "&nbsp;";
			$Funcion = "";

			$objPerRelacion   = new ClsPerRelacion();
			$bean_perrelacion = new Bean_perrelacion() ;



			$bean_perrelacion->setcPerCodigo($nPerCodigo) ;
			$bean_perrelacion->setnPerRelTipo(2002 ) ; # PRODUCTOR
			$bean_perrelacion->setcPerJuridica($_SESSION['S_usuario']) ;
			$bean_perrelacion->setnPerRelEstado($nEstado ) ;

			try
	    	{	# iniciamos la transaccion
	    		$objPerRelacion->beginTransaction() ;
    			# Actulizar estado del paramentro  como Sector
				$dat = $objPerRelacion->Upd_PerRelacion_Estado($bean_perrelacion);
				// $objResponse->alert($dat) ;

				Insertar_Transaccion(3,"ELIMNO PRODUCTOR: nPerCodigo : ".$nPerCodigo." - Usuario  :  ".$_SESSION['S_usuario'],"") ;

				# si todo a tendido exito
	    		$objPerRelacion->commit();

	    		$Funcion = "xajax_Listar_Productores(0,15,1,1); ocultar_emergente();";

	    	}catch(Exception $e)
	    	{
	    		# si ha habido algun error
	    		$objPerRelacion->rollback();
	    		$MsjAlter = "Error de registro: ";
	    		// $MsjAlter = "Error de registro: ". $e->getMessage() ;
	    	}

			$objResponse->assign("labelMsj","innerHTML",$MsjAlter);
			$objResponse->script($Funcion);
			return $objResponse;
		}

	# FRM
		function Form_Productor($funcion, $cPerCodigo = 0 , $cPerDocumento = "", $cPerApellidoPat = "", $cPerApellidoMat = "", $cPerNombre = "",
								$FechaNac = "", $Telefono = "", $Email = "", $Sexo = 1 ,$FechaIncorporacion = "" , $Clasificacion = 1 , $Status = 1 , $nDepCodigo = 6 , $nParSector = 0 )
		{
			if(empty($FechaIncorporacion))
			{
				$FechaIncorporacion = Fecha_Actual_Barra() ;
			}

			$objParametro   = new ClsParametro();
			$bean_parametro = new  Bean_parametro() ;

			# SEXO
			$bean_parametro->setnParClase(1002);
			$dataSexo = $objParametro->Get_Parametro_By_cParClase($bean_parametro) ;
			$OptionSexo = SelectOption($dataSexo, 'nParCodigo', 'cParDescripcion',$Sexo);

			# Status
			$bean_parametro->setnParClase(2003);
			$dataStatus= $objParametro->Get_Parametro_By_cParClase($bean_parametro) ;
			$OptionStatus = SelectOption($dataStatus, 'nParCodigo', 'cParDescripcion',$Status);

			# Clasificacion de Productor
			$bean_parametro->setnParClase(2004);
			$dataClasificacion = $objParametro->Get_Parametro_By_cParClase($bean_parametro) ;
			$OptionClasificacion = SelectOption($dataClasificacion, 'nParCodigo', 'cParDescripcion',$Clasificacion);

			# select DEPARTAMENTO
			$objDepartamento = new ClsDepartamento() ;
			$bean_departamento = new Bean_departamento() ;
			$bean_departamento->setnPaiCodigo(1) ;
			$dataOption = $objDepartamento->Get_Departamentos_by_nPaiCodigo($bean_departamento) ;
			$OptionDep = SelectOption($dataOption, "nDepCodigo","cDepDescripcion", $nDepCodigo );


			$selectDependiente ="Provincia-Distrito-Caserio-Sector" ;

		    $formulario = '
		    	<div class="vform vformContenedor">
		    		<fieldset class="c12">
		    		<input type="hidden" name="cPerCodigo_" value="'.$cPerCodigo.'" />
		    		<input type="hidden" name="nParCodStatus_Sector_" value="'.$Status."-".$nParSector.'" /> ' ;
			  // $formulario .= InputTextPre("Codigo","cPerCodigoPer_","Ingrese Codigo ",$cCasDescripcion,"icon-text", "c6 ");
			  // $formulario .= InputTextPost("DNI","cPerDocumento_","Ingrese DNI ",$cCasDescripcion,"icon-search", "c6 ");
			  $formulario .='<fieldset class="c6 ">
	                            <label for="cPerDocumento_">DNI</label>
	                            <span class="pre  icon-text"></span>
	                            <input type="text" class="pre " name="cPerDocumento_" id="cPerDocumento_" value="'.$cPerDocumento.'" placeholder="INGRESE DNI " maxlength="8" onfocus="Validar_Number(this);">
	                        </fieldset>';

			  $formulario .= InputTextPre("Apellido Paterno","cPerApellidoPat_","Ingrese Apellido Paterno ",$cPerApellidoPat,"icon-text", "c6 ");
			  $formulario .= InputTextPre("Apellido Materno","cPerApellidoMat_","Ingrese Apellido Materno ",$cPerApellidoMat,"icon-text", "c6 ");
			  $formulario .= InputTextPre("Nombres","cPerNombre_","Ingrese Codigo ",$cPerNombre,"icon-text", "c6 ");
			  $formulario .= InputTextPre("Fecha Nacimiento","FechaNac_","Ingrese Fecha Nacimiento ",$FechaNac," icon-calendar", "c6 ");
			  // $formulario .= InputTextPre("Teléfono","Telefono_","Ingrese Telefono ",$Telefono," icon-phone", "c6 ");
			  // $formulario .= InputTextPre("Email","Email_","Ingrese Email ",$cCasDescripcion," icon-email", "c6 ");
			   $formulario .='<fieldset class="c6 ">
	                            <label for="Telefono_">Telefono</label>
	                            <span class="pre  icon-text"></span>
	                            <input type="text" class="pre " name="Telefono_" id="Telefono_" value="'.$Telefono.'" placeholder="INGRESE Telefono " maxlength="20" onfocus="Validar_Telefono(this);">
	                        </fieldset>';
			  	$formulario .='<fieldset class="c6 ">
	                                <label for="Email_">Email</label>
	                                <span class="pre  icon-email"></span>
	                                <input type="email" class="pre " name="Email_" id="Email_" value="'.$Email.'" placeholder="INGRESE EMAIL ">
	                            </fieldset>';

			  	$formulario .=' <fieldset class="c6">
						    		<label for="Sexo_">Sexo</label>
						    		<select name="Sexo_" id="Sexo_">
						    		'.$OptionSexo.'
						    		</select>
						    	</fieldset> ';

			 	$formulario .= InputTextPre("Fecha Incorporación","FechaIncorporacion_","Ingrese Fecha Incorporación ",$FechaIncorporacion," icon-calendar", "c6 ");

			 	$formulario .='
								<fieldset class="c6" >
									<label> Clasificación </label>
									<select class="inputs-text" name="Clasificacion_" id="Clasificacion_">
										'.$OptionClasificacion .'
									</select>
								</fieldset> ';
				 $formulario .='<fieldset class="c6" >
									<label>Estatus  </label>
									<select class="inputs-text" name="Status_" id="Status_">
										'.$OptionStatus.'
									</select>
								</fieldset> ' ;

			    $formulario .=' <fieldset class="c6">
						    		<label for="Departamento_">Departamento</label>
						    		<select name="Departamento_" id="Departamento_" onchange="xajax_Combo_Provincia(xajax.$(\'Departamento_\').value ,-1,\''.$selectDependiente.'\');">
						    		'.$OptionDep.'
						    		</select>
						    	</fieldset> ' ;
				$formulario .=' <fieldset class="c6">
						    		<label for="Provincia_">Provincia</label>
						    		<select name="Provincia_" id="Provincia_" onchange="xajax_Combo_Distrito(xajax.$(\'Provincia_\').value, -1, \''.$selectDependiente. '\');">
						    		</select>
						    	</fieldset> ' ;
				$formulario .=' <fieldset class="c6">
						    		<label for="Distrito_" >Distrito</label>
						    		<select name="Distrito_" id="Distrito_"  onchange="xajax_Combo_Caserio(xajax.$(\'Distrito_\').value, -1, \''.$selectDependiente. '\');"  ></select>
						    	</fieldset> ';
				$formulario .=' <fieldset class="c6">
						    		<label for="Caserio_"   >Caserio </label>
						    		<select name="Caserio_" id="Caserio_" onchange="xajax_Combo_Sector(xajax.$(\'Caserio_\').value, -1, \''.$selectDependiente. '\');" ></select>
						    	</fieldset> ';

				$formulario .=' <fieldset class="c6">
						    		<label for="Sector_">Sector </label>
						    		<select name="Sector_" id="Sector_"></select>
						    	</fieldset> ';


			$formulario .=botonRegistrar($funcion) ;
			$formulario .='	</div>';
				return $formulario;
		}

	# REPORTE EN PDF
		function Rpt_Productor_Pdf($frm="")
		{
			$objResponse       = new xajaxResponse();
			$bean_persona      = new Bean_persona();
			$bean_perdocumento = new Bean_perdocumento();
			$bean_perdocumento = new Bean_perdocumento();
			$bean_parametro    = new Bean_parametro();


			$objProductor      =  new ClsProductor() ;
			# validaciones
				if(empty($frm["s_cPerDocumento_"]))
				{
					$cPerDocumento = "-";
				}else{
					$cPerDocumento = $frm["s_cPerDocumento_"];
				}
				if(empty($frm["s_cPerApellidos_"]))
				{
					$cPerApellidos = "-";
				}else{
					$cPerApellidos = $frm["s_cPerApellidos_"];
				}
				if(empty($frm["s_cPerNombre_"]))
				{
					$cPerNombre = "-";
				}else{
					$cPerNombre = $frm["s_cPerNombre"];
				}
				if(empty($frm["s_nParStatus_"]))
				{
					$nParStatus = 0;
				}else{
					$nParStatus = $frm["s_nParStatus_"];
				}
				if(empty($frm["s_cParSector_"]))
				{
					$cParSector = "-";
				}else{
					$cParSector = $frm["s_cParSector_"];
				}




			$bean_persona->setnOriRegistros(0) ;
			$bean_persona->setnNumRegMostrar(0) ;
			$bean_persona->setnPagRegistro(0) ; # que no pagine
			$bean_persona->setcPerNombre($cPerNombre) ;
			$bean_persona->setcPerApellidos($cPerApellidos) ;
			$bean_perdocumento->setcPerDocNumero($cPerDocumento) ;

			$bean_parametro->setnParCodigo($nParStatus) ; # codigo de status
			$bean_parametro->setcParDescripcion($cParSector) ; # descripcion del sector

		    $data = $objProductor->Get_Productores($bean_persona , $bean_perdocumento, $bean_parametro);


			$formulario= "";

			if (count($data["cuerpo"]) > 0)
			{

				$formulario .= "<table class='table'>" ;
				$formulario .='
						<tr class="border-bottom">
							<th class="" style="width:5%;"> Num </th>
							<th style="width:8%;">&nbsp; DNI</th>
							<th style="width:17%;">&nbsp; Apellidos</th>
							<th style="width:18%;">&nbsp; Nombres</th>
							<th style="width:8%;">&nbsp; Fecha Nac </th>
							<th style="width:13%;">&nbsp; E-Mail</th>
							<th style="width:8%;">&nbsp; Teléfono </th>
							<th style="width:10%;">&nbsp; Status </th>
							<th style="width:12%;">&nbsp; Sector  </th>
						</tr>
					' ;

				$formulario .= "<tbody>" ;

				for ($i = 0; $i < count($data["cuerpo"]); $i++)
            	{
						$formulario.="<tr>";
	                    $formulario.= 	"<td>";
	                    $formulario.=         $i + 1 ;
	                    $formulario.=   "</td>";
					    $formulario.= 	"<td>". $data["cuerpo"][$i]["cPerDocNumero"] ."</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cPerApellidos"]."</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cPerNombre"]."</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["dPerNacimiento"]."</td>";
					   	$formulario.= 	"<td class='text-transform-none'>".$data["cuerpo"][$i]["cPerMail"]."</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cPerTelNumero"]."</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cParStatus"]."</td>";
					   	$formulario.= 	"<td>".$data["cuerpo"][$i]["cParSector"]."</td>";
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

					$mpdf = Rpt_Generar_Pdf("A4-L") ;
					$fichero = '../documents/pdf.pdf';
					$mpdf->WriteHTML($HTML);
					$mpdf->Output(  $fichero);
					$objResponse->script('window.open("'.$fichero.'", "_blank");');

		    return $objResponse;
		}

