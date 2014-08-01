<?php

	$xajax->registerFunction("Nuevo_Productor");
	$xajax->registerFunction("Insertar_Productor");
	$xajax->registerFunction("Listar_Productores");
	$xajax->registerFunction("Editar_Productor");
	$xajax->registerFunction("Eliminar_Productor");
	$xajax->registerFunction("Reporte_Productor");


	function Listar_Productores()
	{

		$objResponse = new xajaxResponse();
		$formulario ='';
		# Start Tabs
		$formulario .='<div class="tabs"  > ' ;

			# Start Tab1
			$formulario .='<div class="tab">
							<input type="radio" id="tab-1" name="tab-group-1"  checked class="tab-radio">
							<label for="tab-1" class="tab-label" >Productor  </label> ' ;
				# Start content
				$formulario .='	<div class="content " >' ;

					$formulario .= ' <div class="ContenedorTable"> ' ;


						   		$FuncionSearch = 'Listar_Productores('.$nOriRegistros.', '.$nNumRegMostrar.', '.$nPagRegistro.', '.$nPagAct.',  xajax.getFormValues(FrmPrincipal) );';
								$FuncionEnter = ' if(event.keyCode == 13 ){'.$FuncionSearch.'} ; if( (jq(this).val()).length  == 0){	'.$FuncionSearch.' }';

					$formulario .= '<table style="width:100%;" >
										<tr class="title-table" >
											<td  style="width:10%;">&nbsp; Código</td>
											<td  style="width:40%;">&nbsp; Productor</td>
											<td  style="width:25%;">&nbsp; DNI</td>
											<td  style="width:25%;">&nbsp; E-Mail</td>
										</tr>
								    	<tr class="vform">
											<td>
											    <input  type="search" disabled="disabled" name="" placeholder="" />
											</td>
											<td>
								    		    <input type="search" name="txtproductor" id="txtproductor" placeholder="Buscar por Productor"
								    		    onkeyup="'.$FuncionEnter.'"
							    				onsearch="'.$FuncionSearch.'" />

											</td>
											<td>
								    		    <input type="search" name="cParDescripcion_" id="cParDescripcion_" placeholder="Buscar DNI"
								    		    onkeyup="'.$FuncionEnter.'"
							    				onsearch="'.$FuncionSearch.'" />
											</td>
											<td>
								    		    <input type="search" name="cParDescripcion_" id="cParDescripcion_" placeholder="Buscar E-Mail"
								    		    onkeyup="'.$FuncionEnter.'"
							    				onsearch="'.$FuncionSearch.'" />
											</td>
										</tr>
										<tbody id="tbodyData" class="table table-hover table-border">

										</tbody>
								    </table>
								    </div>';
					# paginado
					$formulario .='	<div style="position: relative; top: 310px;"> hasdfhakjsd
									</div> ';


				$formulario .='	</div> ';
				# End content
			$formulario .='</div> ' ;
			# End Tab1

			# Start Tab2
			$formulario .='<div class="tab">
							<input type="radio" id="tab-2" name="tab-group-1"  class="tab-radio">
							<label for="tab-2" class="tab-label" >Parcela  </label> ' ;
				# Start content
				$formulario .='	<div class="content " >' ;

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
				    // $objResponse->script("xajax_Filtrar_Caserio('".$nOriRegistros."', '".$nNumRegMostrar."', '".$nPagRegistro."', '".$nPagAct."',  xajax.getFormValues(FrmPrincipal) );");
	    //$objResponse->script("xajax_Filtrar_Parametro('".$nOriRegistros."', '".$nNumRegMostrar."', '".$nPagRegistro."', '".$nPagAct."',  xajax.getFormValues(FrmPrincipal) );");

		return $objResponse;
	}

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
							$bean_perparametro->setnParCodigo(2) ;
							$bean_perparametro->setcPerParValor($Status) ;
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
			        		$Funcion = "xajax_Listar_Productores(0,20,1,1); ocultar_emergente();";
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

	function Form_Productor($funcion, $cPerCodigo = 0 , $cPerDocumento = "", $cPerApellidoPat = "", $cPerApellidoMat = "", $cPerNombre = "",
							$FechaNac = "", $Telefono = "", $Email = "", $Sexo = 1 ,$FechaIncorporacion = "" , $Clasificacion = 1 , $Status = 1 , $nDepCodigo = 6  )
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
	    		<input type="hidden" name="cPerCodigo_" value="" /> ' ;
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
                                <input type="email" class="pre " name="Email_" id="Email_" value="'.$Email_.'" placeholder="INGRESE EMAIL ">
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

