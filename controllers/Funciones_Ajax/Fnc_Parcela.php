<?php

	$xajax->registerFunction("Listar_Parcelas");

	# LISTAR
		// function Listar_Parcelas($nOriRegistros, $nNumRegMostrar, $nPagRegistro, $nPagAct)
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
						    		    <input type="search" name="s_nCodigo_" id="s_nCodigo_" placeholder="Buscar Caserio"
						    		    onkeyup="'.$FuncionEnter.'"
							    		onsearch="'.$FuncionSearch.'" />
									</td>
									<td>
						    		    <input type="search" name="s_cParcela_" id="s_cParcela_" placeholder="Buscar Departamento"
						    		    onkeyup="'.$FuncionEnter.'"
							    		onsearch="'.$FuncionSearch.'" />
									</td>
									<td>
						    		    <input type="search" name="s_cArea_" id="s_cArea_" placeholder="Buscar Provincia"
						    		    onkeyup="'.$FuncionEnter.'"
							    		onsearch="'.$FuncionSearch.'" />
									</td>
									<td>
						    		    <input type="search" name="s_Producto_" id="s_Producto_" placeholder="Buscar Distrito"
						    		    onkeyup="'.$FuncionEnter.'"
							    		onsearch="'.$FuncionSearch.'" />
									</td>



								</tr>

								<tbody id="tbodyData" class="table table-hover table-border">

								</tbody>
						    </table>
						    </div>';
				    $objResponse->assign("Tab_Parcela","innerHTML",$formulario);
				    // $objResponse->script("xajax_Filtrar_Caserio('".$nOriRegistros."', '".$nNumRegMostrar."', '".$nPagRegistro."', '".$nPagAct."',  xajax.getFormValues(FrmPrincipal) );");
					return $objResponse;
		}